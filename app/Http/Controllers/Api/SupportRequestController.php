<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SupportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SupportRequestController extends Controller
{
    public function index(Request $request)
    {
        // Only admins can view all support requests
        if (!$request->user() || !$request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $supportRequests = SupportRequest::with(['assignedTo'])
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $supportRequests
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|min:8|max:20|regex:/^[+]?[0-9\s\-\(\)]{8,20}$/',
            'country' => 'required|string|in:Australia,Austria,Belgium,Canada,Denmark,Finland,Germany,Ireland,Italy,Netherlands,New Zealand,Norway,Portugal,Spain,Sweden,Switzerland,United Kingdom,United States',
            'project_title' => 'required|string|min:10|max:255',
            'project_description' => 'required|string|min:50|max:2000',
            'project_type' => 'required|in:web_development,mobile_app,desktop_app,api_development,database_design,cloud_support_aws,cloud_support_azure,robotics,bug_fixing,code_review,consulting,other',
            'urgency' => 'required|in:low,medium,high,urgent',
            'expected_timeframe' => 'required|string|max:100',
            'project_duration' => 'required|string|max:100',
            'budget_min' => 'nullable|numeric|min:0',
            'budget_max' => 'nullable|numeric|min:0|gte:budget_min',
            'technical_requirements' => 'nullable|string|max:1000',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,txt|max:10240', // 10MB max
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $attachmentPaths = [];

        // Handle file uploads
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('support-requests', 'public');
                $attachmentPaths[] = $path;
            }
        }

        $supportRequest = SupportRequest::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'project_title' => $request->project_title,
            'project_description' => $request->project_description,
            'project_type' => $request->project_type,
            'urgency' => $request->urgency,
            'expected_timeframe' => $request->expected_timeframe,
            'project_duration' => $request->project_duration,
            'budget_min' => $request->budget_min,
            'budget_max' => $request->budget_max,
            'technical_requirements' => $request->technical_requirements,
            'attachments' => $attachmentPaths,
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Support request submitted successfully',
            'data' => $supportRequest
        ], 201);
    }

    public function show(Request $request, SupportRequest $supportRequest)
    {
        // Only admins can view individual support requests
        if (!$request->user() || !$request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $supportRequest->load(['assignedTo']);

        return response()->json([
            'success' => true,
            'data' => $supportRequest
        ]);
    }

    public function update(Request $request, SupportRequest $supportRequest)
    {
        // Only admins can update support requests
        if (!$request->user() || !$request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'sometimes|in:pending,in_review,assigned,in_progress,completed,cancelled',
            'assigned_to' => 'sometimes|nullable|exists:users,id',
            'admin_notes' => 'sometimes|nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $updateData = $request->only(['status', 'assigned_to', 'admin_notes']);

        // Set responded_at timestamp when status changes from pending
        if (isset($updateData['status']) && $supportRequest->status === 'pending' && $updateData['status'] !== 'pending') {
            $updateData['responded_at'] = now();
        }

        $supportRequest->update($updateData);

        return response()->json([
            'success' => true,
            'message' => 'Support request updated successfully',
            'data' => $supportRequest->load(['assignedTo'])
        ]);
    }

    public function destroy(Request $request, SupportRequest $supportRequest)
    {
        // Only admins can delete support requests
        if (!$request->user() || !$request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        // Delete associated files
        if ($supportRequest->attachments) {
            foreach ($supportRequest->attachments as $attachment) {
                Storage::disk('public')->delete($attachment);
            }
        }

        $supportRequest->delete();

        return response()->json([
            'success' => true,
            'message' => 'Support request deleted successfully'
        ]);
    }

    public function getStats(Request $request)
    {
        // Only admins can view stats
        if (!$request->user() || !$request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $stats = [
            'total' => SupportRequest::count(),
            'pending' => SupportRequest::where('status', 'pending')->count(),
            'in_review' => SupportRequest::where('status', 'in_review')->count(),
            'assigned' => SupportRequest::where('status', 'assigned')->count(),
            'in_progress' => SupportRequest::where('status', 'in_progress')->count(),
            'completed' => SupportRequest::where('status', 'completed')->count(),
            'cancelled' => SupportRequest::where('status', 'cancelled')->count(),
            'urgent' => SupportRequest::where('urgency', 'urgent')->count(),
            'this_week' => SupportRequest::where('created_at', '>=', now()->startOfWeek())->count(),
        ];

        return response()->json([
            'success' => true,
            'data' => $stats
        ]);
    }

    public function getSupportedCountries()
    {
        // List of countries where we provide services
        $countries = [
            'Australia',
            'Austria',
            'Belgium',
            'Canada',
            'Denmark',
            'Finland',
            'Germany',
            'Ireland',
            'Italy',
            'Netherlands',
            'New Zealand',
            'Norway',
            'Portugal',
            'Spain',
            'Sweden',
            'Switzerland',
            'United Kingdom',
            'United States'
        ];

        return response()->json([
            'success' => true,
            'data' => $countries
        ]);
    }
}
