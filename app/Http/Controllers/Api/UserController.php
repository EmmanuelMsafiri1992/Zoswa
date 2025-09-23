<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Certificate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Only admins can view all users
        if (!$request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $users = User::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    public function show(User $user)
    {
        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        // Only admins or the user themselves can update
        if (!$request->user()->isAdmin() && $request->user()->id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'role' => 'sometimes|in:admin,instructor,student,client',
            'phone' => 'sometimes|string|max:20',
            'bio' => 'sometimes|string|max:1000',
            'is_active' => 'sometimes|boolean',
        ]);

        $user->update($request->only([
            'name', 'email', 'role', 'phone', 'bio', 'is_active'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully',
            'data' => $user
        ]);
    }

    public function destroy(Request $request, User $user)
    {
        // Only admins can delete users
        if (!$request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        // Don't allow deleting the last admin
        if ($user->role === 'admin' && User::where('role', 'admin')->count() <= 1) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete the last admin user'
            ], 400);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully'
        ]);
    }

    public function getStudentSubscriptions(Request $request, $studentId)
    {
        // Only admins can view student data
        if (!$request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $subscriptions = Subscription::with(['course'])
            ->where('user_id', $studentId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $subscriptions
        ]);
    }

    public function getStudentCertificates(Request $request, $studentId)
    {
        // Only admins can view student data
        if (!$request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $certificates = Certificate::with(['course'])
            ->where('user_id', $studentId)
            ->orderBy('issued_date', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $certificates
        ]);
    }

    public function generateCertificateForStudent(Request $request)
    {
        // Only admins can generate certificates for students
        if (!$request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $request->validate([
            'student_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'final_score' => 'nullable|numeric|min:0|max:100',
            'completion_percentage' => 'required|integer|min:0|max:100',
        ]);

        $student = User::findOrFail($request->student_id);
        $course = \App\Models\Course::findOrFail($request->course_id);

        // Check if student has subscription to this course
        $subscription = Subscription::where('user_id', $student->id)
            ->where('course_id', $course->id)
            ->where('status', 'active')
            ->first();

        if (!$subscription) {
            return response()->json([
                'success' => false,
                'message' => 'Student is not subscribed to this course'
            ], 400);
        }

        // Check if certificate already exists
        $existingCertificate = Certificate::where('user_id', $student->id)
            ->where('course_id', $course->id)
            ->first();

        if ($existingCertificate) {
            return response()->json([
                'success' => false,
                'message' => 'Certificate already exists for this student and course'
            ], 409);
        }

        $certificate = Certificate::create([
            'user_id' => $student->id,
            'course_id' => $course->id,
            'title' => "Certificate of Completion - {$course->title}",
            'description' => "This certifies that {$student->name} has successfully completed the course {$course->title}",
            'issued_date' => now(),
            'completion_date' => now(),
            'completion_percentage' => $request->completion_percentage,
            'final_score' => $request->final_score ?? 95.0,
            'status' => 'active',
            'skills_acquired' => $course->technologies ?? [],
            'expires_at' => now()->addYears(2),
        ]);

        $certificate->load(['course', 'user']);

        return response()->json([
            'success' => true,
            'message' => 'Certificate generated successfully',
            'data' => $certificate
        ], 201);
    }
}
