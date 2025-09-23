<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoswa - Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-gradient {
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 sidebar-gradient text-white">
            <div class="p-4">
                <div class="flex items-center space-x-2 mb-8">
                    <div class="text-2xl">🚀</div>
                    <div>
                        <h1 class="text-xl font-bold">Zoswa Admin</h1>
                        <p class="text-sm text-gray-300">Control Panel</p>
                    </div>
                </div>

                <!-- Admin Profile -->
                <div class="bg-white/10 rounded-lg p-3 mb-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-crown text-white"></i>
                        </div>
                        <div>
                            <p class="font-semibold">{{ $user->name }}</p>
                            <p class="text-xs text-gray-300">Administrator</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="space-y-2">
                    <a href="#overview" class="flex items-center space-x-3 p-3 rounded-lg bg-white/10 text-white">
                        <i class="fas fa-chart-bar"></i>
                        <span>Overview</span>
                    </a>
                    <a href="#support-requests" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-headset"></i>
                        <span>Support Requests</span>
                        @if($stats['pending_requests'] > 0)
                            <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ $stats['pending_requests'] }}</span>
                        @endif
                    </a>
                    <a href="#users" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                    <a href="#reports" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-file-alt"></i>
                        <span>Reports</span>
                    </a>
                </nav>

                <!-- Logout -->
                <div class="absolute bottom-4 left-4 right-4">
                    <div class="flex space-x-2">
                        <a href="/" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-center transition">
                            <i class="fas fa-home mr-1"></i>Home
                        </a>
                        <button onclick="logout()" class="flex-1 bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg transition">
                            <i class="fas fa-sign-out-alt mr-1"></i>Logout
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto">
            <!-- Header -->
            <div class="bg-white shadow-sm border-b p-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-900">Admin Dashboard</h2>
                    <div class="flex items-center space-x-4">
                        <div class="text-sm text-gray-500">
                            {{ now()->format('M d, Y - H:i') }}
                        </div>
                        <div class="relative">
                            @if($stats['urgent_requests'] > 0)
                                <div class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-semibold animate-pulse">
                                    {{ $stats['urgent_requests'] }} Urgent
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div id="overview" class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow card-hover p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-headset text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Requests</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['total_requests'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow card-hover p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                <i class="fas fa-clock text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Pending</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['pending_requests'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow card-hover p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <i class="fas fa-check-circle text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Completed</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['completed_requests'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow card-hover p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Active Clients</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['active_clients'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Support Requests Table -->
                <div id="support-requests" class="bg-white rounded-lg shadow">
                    <div class="p-6 border-b">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900">Support Requests</h3>
                            <div class="flex space-x-2">
                                <button onclick="refreshRequests()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                                    <i class="fas fa-sync-alt mr-1"></i>Refresh
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Client</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Project</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Urgency</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Budget</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($supportRequests as $request)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        #{{ $request->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $request->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $request->email }}</div>
                                            <div class="text-sm text-gray-500">{{ $request->country }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ Str::limit($request->project_title, 40) }}</div>
                                            <div class="text-sm text-gray-500">{{ $request->expected_timeframe }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ ucfirst(str_replace('_', ' ', $request->project_type)) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                                            @if($request->urgency === 'urgent') bg-red-100 text-red-800
                                            @elseif($request->urgency === 'high') bg-orange-100 text-orange-800
                                            @elseif($request->urgency === 'medium') bg-yellow-100 text-yellow-800
                                            @else bg-green-100 text-green-800
                                            @endif">
                                            {{ ucfirst($request->urgency) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <select onchange="updateStatus({{ $request->id }}, this.value)"
                                                class="text-sm border border-gray-300 rounded-md px-2 py-1
                                                @if($request->status === 'pending') text-yellow-600
                                                @elseif($request->status === 'in_progress') text-blue-600
                                                @elseif($request->status === 'completed') text-green-600
                                                @else text-gray-600
                                                @endif">
                                            <option value="pending" {{ $request->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="in_review" {{ $request->status === 'in_review' ? 'selected' : '' }}>In Review</option>
                                            <option value="assigned" {{ $request->status === 'assigned' ? 'selected' : '' }}>Assigned</option>
                                            <option value="in_progress" {{ $request->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="completed" {{ $request->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="cancelled" {{ $request->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if($request->budget_min && $request->budget_max)
                                            ${{ number_format($request->budget_min) }} - ${{ number_format($request->budget_max) }}
                                        @elseif($request->budget_min)
                                            ${{ number_format($request->budget_min) }}+
                                        @else
                                            <span class="text-gray-400">Not specified</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                        <button onclick="viewRequest({{ $request->id }})"
                                                class="text-blue-600 hover:text-blue-900 transition">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="respondToRequest({{ $request->id }})"
                                                class="text-green-600 hover:text-green-900 transition">
                                            <i class="fas fa-reply"></i>
                                        </button>
                                        <button onclick="deleteRequest({{ $request->id }})"
                                                class="text-red-600 hover:text-red-900 transition">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Request Details Modal -->
    <div id="requestModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-4xl w-full max-h-screen overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-900">Support Request Details</h3>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div id="requestDetails">
                    <!-- Request details will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Update request status
        async function updateStatus(requestId, status) {
            try {
                const response = await fetch(`/api/support-requests/${requestId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        status: status
                    })
                });

                const data = await response.json();
                if (data.success) {
                    showNotification('Status updated successfully', 'success');
                } else {
                    showNotification('Failed to update status', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('Error updating status', 'error');
            }
        }

        // View request details
        async function viewRequest(requestId) {
            try {
                const response = await fetch(`/api/support-requests/${requestId}`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                const data = await response.json();
                if (data.success) {
                    const request = data.data;
                    document.getElementById('requestDetails').innerHTML = `
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">Client Information</h4>
                                <div class="space-y-2 text-sm">
                                    <p><strong>Name:</strong> ${request.name}</p>
                                    <p><strong>Email:</strong> ${request.email}</p>
                                    <p><strong>Phone:</strong> ${request.phone}</p>
                                    <p><strong>Country:</strong> ${request.country}</p>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-2">Project Details</h4>
                                <div class="space-y-2 text-sm">
                                    <p><strong>Type:</strong> ${request.project_type.replace('_', ' ')}</p>
                                    <p><strong>Urgency:</strong> ${request.urgency}</p>
                                    <p><strong>Timeline:</strong> ${request.expected_timeframe}</p>
                                    <p><strong>Duration:</strong> ${request.project_duration}</p>
                                    <p><strong>Budget:</strong> $${request.budget_min || 'N/A'} - $${request.budget_max || 'N/A'}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <h4 class="font-semibold text-gray-900 mb-2">Project Title</h4>
                            <p class="text-sm text-gray-700">${request.project_title}</p>
                        </div>
                        <div class="mt-6">
                            <h4 class="font-semibold text-gray-900 mb-2">Description</h4>
                            <p class="text-sm text-gray-700 whitespace-pre-wrap">${request.project_description}</p>
                        </div>
                        ${request.technical_requirements ? `
                        <div class="mt-6">
                            <h4 class="font-semibold text-gray-900 mb-2">Technical Requirements</h4>
                            <p class="text-sm text-gray-700">${request.technical_requirements}</p>
                        </div>
                        ` : ''}
                        <div class="mt-6 pt-4 border-t">
                            <h4 class="font-semibold text-gray-900 mb-2">Admin Response</h4>
                            <textarea id="adminResponse" rows="4" class="w-full border border-gray-300 rounded-lg p-3"
                                placeholder="Type your response to the client..."></textarea>
                            <div class="mt-3 flex space-x-3">
                                <button onclick="sendResponse(${request.id})"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                                    <i class="fas fa-paper-plane mr-1"></i>Send Response
                                </button>
                                <button onclick="markCompleted(${request.id})"
                                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">
                                    <i class="fas fa-check mr-1"></i>Mark Completed
                                </button>
                            </div>
                        </div>
                    `;
                    document.getElementById('requestModal').classList.remove('hidden');
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('Error loading request details', 'error');
            }
        }

        // Send response to client
        async function sendResponse(requestId) {
            const response = document.getElementById('adminResponse').value;
            if (!response.trim()) {
                showNotification('Please enter a response', 'error');
                return;
            }

            try {
                const res = await fetch(`/api/support-requests/${requestId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        admin_notes: response,
                        status: 'in_progress'
                    })
                });

                const data = await res.json();
                if (data.success) {
                    showNotification('Response sent successfully', 'success');
                    closeModal();
                    refreshRequests();
                } else {
                    showNotification('Failed to send response', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('Error sending response', 'error');
            }
        }

        // Close modal
        function closeModal() {
            document.getElementById('requestModal').classList.add('hidden');
        }

        // Refresh requests
        function refreshRequests() {
            location.reload();
        }

        // Delete request
        async function deleteRequest(requestId) {
            if (!confirm('Are you sure you want to delete this request?')) {
                return;
            }

            try {
                const response = await fetch(`/api/support-requests/${requestId}`, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                const data = await response.json();
                if (data.success) {
                    showNotification('Request deleted successfully', 'success');
                    refreshRequests();
                } else {
                    showNotification('Failed to delete request', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('Error deleting request', 'error');
            }
        }

        // Show notification
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg z-50 ${
                type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
            }`;
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        // Logout function
        async function logout() {
            try {
                await fetch('/api/auth/logout', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                localStorage.removeItem('token');
                localStorage.removeItem('user');
                window.location.href = '/';
            } catch (error) {
                console.error('Logout error:', error);
                window.location.href = '/';
            }
        }

        // Close modal when clicking outside
        document.addEventListener('click', function(e) {
            const modal = document.getElementById('requestModal');
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>
</body>
</html>