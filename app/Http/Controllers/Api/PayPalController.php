<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaymentSetting;
use App\Models\Course;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PayPalController extends Controller
{
    private function getPayPalAccessToken()
    {
        $paypalSettings = PaymentSetting::getActiveProvider('paypal');

        if (!$paypalSettings) {
            throw new \Exception('PayPal settings not configured');
        }

        $response = Http::withBasicAuth($paypalSettings->client_id, $paypalSettings->client_secret)
            ->asForm()
            ->post($paypalSettings->api_url . '/v1/oauth2/token', [
                'grant_type' => 'client_credentials'
            ]);

        if ($response->successful()) {
            return $response->json()['access_token'];
        }

        throw new \Exception('Failed to get PayPal access token');
    }

    public function createOrder(Request $request)
    {
        try {
            $request->validate([
                'course_id' => 'required|exists:courses,id'
            ]);

            $course = Course::findOrFail($request->course_id);
            $user = $request->user();

            // Check if user is already subscribed
            $existingSubscription = $user->subscriptions()
                ->where('course_id', $course->id)
                ->where('status', 'active')
                ->first();

            if ($existingSubscription) {
                return response()->json([
                    'success' => false,
                    'message' => 'You are already subscribed to this course'
                ], 400);
            }

            $paypalSettings = PaymentSetting::getActiveProvider('paypal');

            if (!$paypalSettings) {
                return response()->json([
                    'success' => false,
                    'message' => 'PayPal payment is not available'
                ], 400);
            }

            $accessToken = $this->getPayPalAccessToken();

            $orderData = [
                'intent' => 'CAPTURE',
                'purchase_units' => [
                    [
                        'reference_id' => 'course_' . $course->id . '_user_' . $user->id,
                        'amount' => [
                            'currency_code' => 'USD',
                            'value' => $course->price
                        ],
                        'description' => $course->title
                    ]
                ],
                'application_context' => [
                    'brand_name' => 'Zoswa Learning Platform',
                    'landing_page' => 'BILLING',
                    'user_action' => 'PAY_NOW',
                    'return_url' => url('/api/paypal/capture'),
                    'cancel_url' => url('/dashboard')
                ]
            ];

            $response = Http::withToken($accessToken)
                ->post($paypalSettings->api_url . '/v2/checkout/orders', $orderData);

            if ($response->successful()) {
                $order = $response->json();

                return response()->json([
                    'success' => true,
                    'order_id' => $order['id'],
                    'approval_url' => collect($order['links'])->firstWhere('rel', 'approve')['href']
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to create PayPal order'
            ], 400);

        } catch (\Exception $e) {
            Log::error('PayPal order creation failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Payment processing failed'
            ], 500);
        }
    }

    public function captureOrder(Request $request)
    {
        try {
            $request->validate([
                'order_id' => 'required|string'
            ]);

            $paypalSettings = PaymentSetting::getActiveProvider('paypal');
            $accessToken = $this->getPayPalAccessToken();

            $response = Http::withToken($accessToken)
                ->post($paypalSettings->api_url . '/v2/checkout/orders/' . $request->order_id . '/capture');

            if ($response->successful()) {
                $captureData = $response->json();

                if ($captureData['status'] === 'COMPLETED') {
                    // Extract course and user info from purchase unit reference
                    $referenceId = $captureData['purchase_units'][0]['reference_id'];
                    preg_match('/course_(\d+)_user_(\d+)/', $referenceId, $matches);

                    if (count($matches) === 3) {
                        $courseId = $matches[1];
                        $userId = $matches[2];

                        $course = Course::find($courseId);
                        $paymentId = $captureData['purchase_units'][0]['payments']['captures'][0]['id'];

                        // Create subscription
                        $subscription = Subscription::create([
                            'user_id' => $userId,
                            'course_id' => $courseId,
                            'project_count' => 50,
                            'duration_days' => 365,
                            'amount_paid' => $course->price,
                            'paypal_transaction_id' => $paymentId,
                            'status' => 'active',
                            'starts_at' => now(),
                            'expires_at' => now()->addYear(),
                            'auto_renewal' => false,
                            'metadata' => [
                                'payment_method' => 'paypal',
                                'payment_gateway' => 'paypal',
                                'course_title' => $course->title,
                                'paypal_order_id' => $request->order_id,
                                'capture_data' => $captureData
                            ]
                        ]);

                        return response()->json([
                            'success' => true,
                            'message' => 'Payment successful! You are now subscribed.',
                            'subscription' => $subscription->load('course')
                        ]);
                    }
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'Payment capture failed'
            ], 400);

        } catch (\Exception $e) {
            Log::error('PayPal capture failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Payment processing failed'
            ], 500);
        }
    }

    public function getSettings()
    {
        $user = request()->user();

        if (!$user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $settings = PaymentSetting::where('provider', 'paypal')->first();

        return response()->json([
            'success' => true,
            'data' => $settings ? [
                'id' => $settings->id,
                'sandbox_mode' => $settings->sandbox_mode,
                'is_active' => $settings->is_active,
                'client_id' => $settings->client_id ? '****' . substr($settings->client_id, -4) : null,
                'has_client_secret' => !empty($settings->client_secret),
            ] : null
        ]);
    }

    public function updateSettings(Request $request)
    {
        $user = $request->user();

        if (!$user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $request->validate([
            'client_id' => 'required|string',
            'client_secret' => 'required|string',
            'sandbox_mode' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $settings = PaymentSetting::where('provider', 'paypal')->first();

        if ($settings) {
            $settings->update([
                'client_id' => $request->client_id,
                'client_secret' => $request->client_secret,
                'sandbox_mode' => $request->sandbox_mode ?? true,
                'is_active' => $request->is_active ?? false,
            ]);
        } else {
            $settings = PaymentSetting::create([
                'provider' => 'paypal',
                'client_id' => $request->client_id,
                'client_secret' => $request->client_secret,
                'sandbox_mode' => $request->sandbox_mode ?? true,
                'is_active' => $request->is_active ?? false,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'PayPal settings updated successfully'
        ]);
    }
}
