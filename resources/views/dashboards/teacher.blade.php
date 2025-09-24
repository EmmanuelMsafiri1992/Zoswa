<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoswa - Teacher Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-gradient {
            background: linear-gradient(180deg, #7c3aed 0%, #5b21b6 100%);
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
                    <div class="text-2xl">📚</div>
                    <div>
                        <h1 class="text-xl font-bold">Zoswa Teacher</h1>
                        <p class="text-sm text-purple-200">Instructor Portal</p>
                    </div>
                </div>

                <!-- Teacher Profile -->
                <div class="bg-white/10 rounded-lg p-3 mb-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-chalkboard-teacher text-white"></i>
                        </div>
                        <div>
                            <p class="font-semibold">{{ $user->name }}</p>
                            <p class="text-xs text-purple-200">Instructor</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="space-y-2">
                    <a href="#overview" class="flex items-center space-x-3 p-3 rounded-lg bg-white/10 text-white">
                        <i class="fas fa-chart-bar"></i>
                        <span>Overview</span>
                    </a>
                    <a href="#assigned-requests" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-tasks"></i>
                        <span>Assigned Projects</span>
                        @if($stats['pending_assignments'] > 0)
                            <span class="bg-yellow-500 text-white text-xs px-2 py-1 rounded-full">{{ $stats['pending_assignments'] }}</span>
                        @endif
                    </a>
                    <a href="#courses" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-book"></i>
                        <span>My Courses</span>
                    </a>
                    <a href="#students" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-user-graduate"></i>
                        <span>Students</span>
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
                    <h2 class="text-2xl font-bold text-gray-900">Teacher Dashboard</h2>
                    <div class="flex items-center space-x-4">
                        <div class="text-sm text-gray-500">
                            {{ now()->format('M d, Y - H:i') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div id="overview" class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow card-hover p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                <i class="fas fa-tasks text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Assigned Projects</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['assigned_requests'] }}</p>
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
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['pending_assignments'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow card-hover p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-cog text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">In Progress</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['in_progress_assignments'] }}</p>
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
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['completed_assignments'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Assigned Requests Table -->
                <div id="assigned-requests" class="bg-white rounded-lg shadow">
                    <div class="p-6 border-b">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900">My Assigned Projects</h3>
                            <button onclick="refreshAssignments()" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition">
                                <i class="fas fa-sync-alt mr-1"></i>Refresh
                            </button>
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
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Budget</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($assignedRequests as $request)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        #{{ $request->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $request->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $request->email }}</div>
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
                                        <select onchange="updateProjectStatus({{ $request->id }}, this.value)"
                                                class="text-sm border border-gray-300 rounded-md px-2 py-1
                                                @if($request->status === 'assigned') text-purple-600
                                                @elseif($request->status === 'in_progress') text-blue-600
                                                @elseif($request->status === 'completed') text-green-600
                                                @else text-gray-600
                                                @endif">
                                            <option value="assigned" {{ $request->status === 'assigned' ? 'selected' : '' }}>Assigned</option>
                                            <option value="in_progress" {{ $request->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="completed" {{ $request->status === 'completed' ? 'selected' : '' }}>Completed</option>
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
                                        <button onclick="viewProject({{ $request->id }})"
                                                class="text-blue-600 hover:text-blue-900 transition">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="updateProgress({{ $request->id }})"
                                                class="text-green-600 hover:text-green-900 transition">
                                            <i class="fas fa-edit"></i>
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

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        async function updateProjectStatus(requestId, status) {
            try {
                const response = await fetch(`/api/support-requests/${requestId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ status: status })
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

        function viewProject(requestId) {
            // Implementation for viewing project details
            showNotification('Project details modal coming soon', 'info');
        }

        function updateProgress(requestId) {
            // Implementation for updating project progress
            showNotification('Progress update modal coming soon', 'info');
        }

        function refreshAssignments() {
            location.reload();
        }

        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg z-50 ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' :
                'bg-blue-500 text-white'
            }`;
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        async function logout() {
            try {
                const response = await fetch('/auth/logout', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                const data = await response.json();
                window.location.href = data.redirect_url || '/';
            } catch (error) {
                console.error('Logout error:', error);
                window.location.href = '/';
            }
        }
    </script>
</body>
</html>