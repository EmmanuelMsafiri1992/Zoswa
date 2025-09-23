<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $certificates = Certificate::with(['course', 'user'])
            ->where('user_id', $request->user()->id)
            ->orderBy('issued_date', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $certificates
        ]);
    }

    public function show(Certificate $certificate)
    {
        $certificate->load(['course', 'user']);

        return response()->json([
            'success' => true,
            'data' => $certificate
        ]);
    }

    public function generate(Request $request, Course $course)
    {
        $user = $request->user();

        // Check if user has subscription to this course
        $subscription = Subscription::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->where('status', 'active')
            ->first();

        if (!$subscription) {
            return response()->json([
                'success' => false,
                'message' => 'You must be subscribed to this course to generate a certificate'
            ], 403);
        }

        // Check if certificate already exists
        $existingCertificate = Certificate::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->first();

        if ($existingCertificate) {
            return response()->json([
                'success' => false,
                'message' => 'Certificate already exists for this course'
            ], 409);
        }

        // For now, we'll auto-generate with 100% completion
        // In a real system, you'd check actual course completion
        $certificate = Certificate::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'title' => "Certificate of Completion - {$course->title}",
            'description' => "This certifies that {$user->name} has successfully completed the course {$course->title}",
            'issued_date' => Carbon::now(),
            'completion_date' => Carbon::now(),
            'completion_percentage' => 100,
            'final_score' => 95.0, // Mock score
            'status' => 'active',
            'skills_acquired' => $course->technologies ?? [],
            'expires_at' => Carbon::now()->addYears(2), // 2 year validity
        ]);

        $certificate->load(['course', 'user']);

        return response()->json([
            'success' => true,
            'message' => 'Certificate generated successfully',
            'data' => $certificate
        ], 201);
    }

    public function verify($verificationCode)
    {
        $certificate = Certificate::where('verification_code', $verificationCode)
            ->with(['course', 'user'])
            ->first();

        if (!$certificate) {
            return response()->json([
                'success' => false,
                'message' => 'Certificate not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'certificate' => $certificate,
                'is_valid' => $certificate->isActive(),
                'verification_date' => Carbon::now(),
            ]
        ]);
    }

    public function download(Certificate $certificate)
    {
        // Check if user owns this certificate or is admin
        if ($certificate->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        // Return certificate data for PDF generation on frontend
        $certificate->load(['course', 'user']);

        return response()->json([
            'success' => true,
            'data' => [
                'certificate' => $certificate,
                'download_url' => route('certificates.pdf', $certificate->id)
            ]
        ]);
    }

    public function revoke(Request $request, Certificate $certificate)
    {
        // Only admins can revoke certificates
        if (!$request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $certificate->update(['status' => 'revoked']);

        return response()->json([
            'success' => true,
            'message' => 'Certificate revoked successfully'
        ]);
    }
}
