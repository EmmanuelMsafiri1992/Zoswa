<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportRequest;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Check if user is authenticated
        $user = $request->user();

        if (!$user) {
            return redirect('/login');
        }

        // Role-based dashboard redirection
        switch ($user->role) {
            case 'admin':
                return $this->adminDashboard($user);
            case 'client':
                return $this->clientDashboard($user);
            case 'instructor':
            case 'teacher':
                return $this->teacherDashboard($user);
            case 'student':
                return $this->studentDashboard($user);
            default:
                return redirect('/login');
        }
    }

    private function adminDashboard($user)
    {
        $supportRequests = SupportRequest::with(['assignedTo'])
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total_requests' => SupportRequest::count(),
            'pending_requests' => SupportRequest::where('status', 'pending')->count(),
            'in_progress_requests' => SupportRequest::where('status', 'in_progress')->count(),
            'completed_requests' => SupportRequest::where('status', 'completed')->count(),
            'urgent_requests' => SupportRequest::where('urgency', 'urgent')->count(),
            'total_users' => User::count(),
            'active_clients' => User::where('role', 'client')->where('is_active', true)->count(),
        ];

        return view('dashboards.admin', compact('user', 'supportRequests', 'stats'));
    }

    private function clientDashboard($user)
    {
        // Get client's support requests
        $supportRequests = SupportRequest::where('email', $user->email)
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total_requests' => $supportRequests->count(),
            'pending_requests' => $supportRequests->where('status', 'pending')->count(),
            'in_progress_requests' => $supportRequests->where('status', 'in_progress')->count(),
            'completed_requests' => $supportRequests->where('status', 'completed')->count(),
        ];

        return view('dashboards.client', compact('user', 'supportRequests', 'stats'));
    }

    private function teacherDashboard($user)
    {
        // Teachers can see assigned support requests and course management
        $assignedRequests = SupportRequest::where('assigned_to', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'assigned_requests' => $assignedRequests->count(),
            'pending_assignments' => $assignedRequests->where('status', 'assigned')->count(),
            'in_progress_assignments' => $assignedRequests->where('status', 'in_progress')->count(),
            'completed_assignments' => $assignedRequests->where('status', 'completed')->count(),
        ];

        return view('dashboards.teacher', compact('user', 'assignedRequests', 'stats'));
    }

    private function studentDashboard($user)
    {
        // Students see learning dashboard with courses and progress
        return view('dashboards.student', compact('user'));
    }
}