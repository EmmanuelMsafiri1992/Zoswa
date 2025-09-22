<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $subscriptions = $request->user()
            ->subscriptions()
            ->with('course')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $subscriptions
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'payment_method' => 'required|string',
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

        // Create subscription
        $subscription = Subscription::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'project_count' => 50, // Allow 50 projects
            'duration_days' => 365, // 1 year
            'amount_paid' => $course->price,
            'paypal_transaction_id' => 'DEMO_' . time() . '_' . rand(1000, 9999),
            'status' => 'active', // In real app, this would be 'pending' until payment is confirmed
            'starts_at' => now(),
            'expires_at' => now()->addYear(), // 1 year access
            'auto_renewal' => false,
            'metadata' => [
                'payment_method' => $request->payment_method,
                'payment_gateway' => 'demo',
                'course_title' => $course->title,
                'user_email' => $user->email,
            ]
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Successfully subscribed to course!',
            'data' => $subscription->load('course')
        ], 201);
    }

    public function show(Subscription $subscription)
    {
        // Check if user owns this subscription
        if ($subscription->user_id !== request()->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'data' => $subscription->load('course')
        ]);
    }

    public function destroy(Subscription $subscription)
    {
        // Check if user owns this subscription
        if ($subscription->user_id !== request()->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $subscription->update(['status' => 'cancelled']);

        return response()->json([
            'success' => true,
            'message' => 'Subscription cancelled successfully'
        ]);
    }

    public function checkSubscription(Request $request, Course $course)
    {
        $user = $request->user();

        $subscription = $user->subscriptions()
            ->where('course_id', $course->id)
            ->where('status', 'active')
            ->first();

        return response()->json([
            'success' => true,
            'subscribed' => (bool) $subscription,
            'subscription' => $subscription
        ]);
    }
}
