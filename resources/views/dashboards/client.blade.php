<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoswa - Client Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-gradient {
            background: linear-gradient(180deg, #10b981 0%, #059669 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .payment-policy {
            background: linear-gradient(135deg, #fef3c7 0%, #f59e0b 100%);
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
                        <h1 class="text-xl font-bold">Zoswa Client</h1>
                        <p class="text-sm text-green-200">Support Portal</p>
                    </div>
                </div>

                <!-- Client Profile -->
                <div class="bg-white/10 rounded-lg p-3 mb-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-briefcase text-white"></i>
                        </div>
                        <div>
                            <p class="font-semibold">{{ $user->name }}</p>
                            <p class="text-xs text-green-200">Client Account</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="space-y-2">
                    <a href="#overview" class="flex items-center space-x-3 p-3 rounded-lg bg-white/10 text-white">
                        <i class="fas fa-chart-bar"></i>
                        <span>My Requests</span>
                    </a>
                    <a href="#support-progress" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-tasks"></i>
                        <span>Progress Tracking</span>
                    </a>
                    <a href="#payment-details" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-credit-card"></i>
                        <span>Payment Details</span>
                    </a>
                    <a href="#submit-request" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-plus-circle"></i>
                        <span>New Request</span>
                    </a>
                </nav>

                <!-- Payment Policy Notice -->
                <div class="mt-6 bg-white/10 rounded-lg p-3">
                    <div class="text-xs text-green-200">
                        <p class="font-semibold mb-1">💡 Payment Policy</p>
                        <p>Payment is due ONLY after solution review via video call and your confirmation. No refunds after payment approval.</p>
                    </div>
                </div>

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
                    <h2 class="text-2xl font-bold text-gray-900">Client Support Portal</h2>
                    <div class="flex items-center space-x-4">
                        <div class="text-sm text-gray-500">
                            {{ now()->format('M d, Y - H:i') }}
                        </div>
                        <a href="#submit-request" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">
                            <i class="fas fa-plus mr-1"></i>New Request
                        </a>
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
                            <div class="p-3 rounded-full bg-orange-100 text-orange-600">
                                <i class="fas fa-cog text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">In Progress</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $stats['in_progress_requests'] }}</p>
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
                </div>

                <!-- Payment Policy Banner -->
                <div class="payment-policy rounded-lg p-6 mb-6">
                    <div class="flex items-start space-x-4">
                        <div class="p-3 bg-white/20 rounded-full">
                            <i class="fas fa-shield-alt text-2xl text-yellow-800"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-yellow-900 mb-2">🛡️ Payment Protection Policy</h3>
                            <div class="text-yellow-800 space-y-1">
                                <p><strong>✅ Payment ONLY after solution verification:</strong> You pay only after reviewing the complete solution via video call or live meeting.</p>
                                <p><strong>✅ Satisfaction guarantee:</strong> Payment is due only when you confirm the solution meets your requirements.</p>
                                <p><strong>⚠️ No refunds after confirmation:</strong> Once you approve payment after solution review, all sales are final.</p>
                                <p><strong>📞 Required review process:</strong> All solutions must be demonstrated and approved via video/live meeting before payment.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Support Requests Table -->
                <div id="support-progress" class="bg-white rounded-lg shadow">
                    <div class="p-6 border-b">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900">My Support Requests</h3>
                            <div class="flex space-x-2">
                                <button onclick="refreshRequests()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">
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
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Project</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Progress</th>
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
                                    <td class="px-6 py-4">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ Str::limit($request->project_title, 40) }}</div>
                                            <div class="text-sm text-gray-500">Created: {{ $request->created_at->format('M d, Y') }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ ucfirst(str_replace('_', ' ', $request->project_type)) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                                            @if($request->status === 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($request->status === 'in_review') bg-blue-100 text-blue-800
                                            @elseif($request->status === 'assigned') bg-purple-100 text-purple-800
                                            @elseif($request->status === 'in_progress') bg-orange-100 text-orange-800
                                            @elseif($request->status === 'completed') bg-green-100 text-green-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="h-2 rounded-full
                                                @if($request->status === 'pending') bg-yellow-500 w-1/12
                                                @elseif($request->status === 'in_review') bg-blue-500 w-2/12
                                                @elseif($request->status === 'assigned') bg-purple-500 w-4/12
                                                @elseif($request->status === 'in_progress') bg-orange-500 w-8/12
                                                @elseif($request->status === 'completed') bg-green-500 w-full
                                                @else bg-gray-500 w-0
                                                @endif"></div>
                                        </div>
                                        <div class="text-xs text-gray-500 mt-1">
                                            @if($request->status === 'pending') 5%
                                            @elseif($request->status === 'in_review') 15%
                                            @elseif($request->status === 'assigned') 35%
                                            @elseif($request->status === 'in_progress') 70%
                                            @elseif($request->status === 'completed') 100%
                                            @else 0%
                                            @endif
                                        </div>
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
                                        <button onclick="viewProgress({{ $request->id }})"
                                                class="text-blue-600 hover:text-blue-900 transition">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        @if($request->status === 'completed')
                                        <button onclick="scheduleReview({{ $request->id }})"
                                                class="text-green-600 hover:text-green-900 transition">
                                            <i class="fas fa-video"></i>
                                        </button>
                                        <button onclick="processPayment({{ $request->id }})"
                                                class="text-purple-600 hover:text-purple-900 transition">
                                            <i class="fas fa-credit-card"></i>
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Submit New Request Section -->
                <div id="submit-request" class="mt-8 bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Submit New Support Request</h3>
                    <div class="text-center py-8">
                        <div class="text-6xl mb-4">🚀</div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">Need Help with a New Project?</h4>
                        <p class="text-gray-600 mb-4">Submit a new support request and get expert assistance for your development needs.</p>
                        <a href="/" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition inline-block">
                            <i class="fas fa-plus mr-2"></i>Submit New Request
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Details Modal -->
    <div id="progressModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-4xl w-full max-h-screen overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-900">Request Progress Details</h3>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div id="progressDetails">
                    <!-- Progress details will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // View progress details
        async function viewProgress(requestId) {
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
                    document.getElementById('progressDetails').innerHTML = `
                        <div class="space-y-6">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-900 mb-2">Project Overview</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                    <div><strong>Title:</strong> ${request.project_title}</div>
                                    <div><strong>Type:</strong> ${request.project_type.replace('_', ' ')}</div>
                                    <div><strong>Urgency:</strong> ${request.urgency}</div>
                                    <div><strong>Timeline:</strong> ${request.expected_timeframe}</div>
                                </div>
                            </div>

                            <div class="bg-blue-50 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-900 mb-2">Current Status</h4>
                                <div class="flex items-center space-x-4">
                                    <span class="px-3 py-1 text-sm font-semibold rounded-full
                                        ${getStatusColor(request.status)}">
                                        ${request.status.replace('_', ' ').toUpperCase()}
                                    </span>
                                    <div class="flex-1 bg-gray-200 rounded-full h-3">
                                        <div class="h-3 rounded-full ${getProgressColor(request.status)}"
                                             style="width: ${getProgressWidth(request.status)}%"></div>
                                    </div>
                                    <span class="text-sm text-gray-600">${getProgressWidth(request.status)}%</span>
                                </div>
                            </div>

                            ${request.admin_notes ? `
                            <div class="bg-green-50 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-900 mb-2">Admin Response</h4>
                                <p class="text-sm text-gray-700 whitespace-pre-wrap">${request.admin_notes}</p>
                            </div>
                            ` : ''}

                            ${request.status === 'completed' ? `
                            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                <h4 class="font-semibold text-yellow-800 mb-2">🎉 Solution Ready for Review!</h4>
                                <p class="text-yellow-700 text-sm mb-3">Your solution is complete and ready for review. Please schedule a video call to review the solution before payment.</p>
                                <div class="flex space-x-3">
                                    <button onclick="scheduleReview(${request.id})"
                                            class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg text-sm transition">
                                        <i class="fas fa-video mr-1"></i>Schedule Review
                                    </button>
                                    <button onclick="processPayment(${request.id})"
                                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm transition"
                                            title="Only after solution review and approval">
                                        <i class="fas fa-credit-card mr-1"></i>Process Payment
                                    </button>
                                </div>
                            </div>
                            ` : ''}

                            <div class="bg-gray-50 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-900 mb-2">Timeline</h4>
                                <div class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <span>Request Submitted</span>
                                        <span class="text-gray-600">${new Date(request.created_at).toLocaleDateString()}</span>
                                    </div>
                                    ${request.responded_at ? `
                                    <div class="flex justify-between">
                                        <span>Admin Response</span>
                                        <span class="text-gray-600">${new Date(request.responded_at).toLocaleDateString()}</span>
                                    </div>
                                    ` : ''}
                                    <div class="flex justify-between">
                                        <span>Last Updated</span>
                                        <span class="text-gray-600">${new Date(request.updated_at).toLocaleDateString()}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    document.getElementById('progressModal').classList.remove('hidden');
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('Error loading progress details', 'error');
            }
        }

        // Schedule review meeting
        function scheduleReview(requestId) {
            showNotification('Review scheduling feature coming soon! Please contact us directly.', 'info');
        }

        // Process payment
        function processPayment(requestId) {
            if (!confirm('Have you reviewed and approved the solution via video call/meeting? Payment is non-refundable after confirmation.')) {
                return;
            }
            showNotification('Payment processing feature coming soon! Please contact us directly.', 'info');
        }

        // Helper functions for status display
        function getStatusColor(status) {
            const colors = {
                'pending': 'bg-yellow-100 text-yellow-800',
                'in_review': 'bg-blue-100 text-blue-800',
                'assigned': 'bg-purple-100 text-purple-800',
                'in_progress': 'bg-orange-100 text-orange-800',
                'completed': 'bg-green-100 text-green-800',
                'cancelled': 'bg-gray-100 text-gray-800'
            };
            return colors[status] || 'bg-gray-100 text-gray-800';
        }

        function getProgressColor(status) {
            const colors = {
                'pending': 'bg-yellow-500',
                'in_review': 'bg-blue-500',
                'assigned': 'bg-purple-500',
                'in_progress': 'bg-orange-500',
                'completed': 'bg-green-500',
                'cancelled': 'bg-gray-500'
            };
            return colors[status] || 'bg-gray-500';
        }

        function getProgressWidth(status) {
            const widths = {
                'pending': 5,
                'in_review': 15,
                'assigned': 35,
                'in_progress': 70,
                'completed': 100,
                'cancelled': 0
            };
            return widths[status] || 0;
        }

        // Close modal
        function closeModal() {
            document.getElementById('progressModal').classList.add('hidden');
        }

        // Refresh requests
        function refreshRequests() {
            location.reload();
        }

        // Show notification
        function showNotification(message, type) {
            const notification = document.createElement('div');
            const colors = {
                'success': 'bg-green-500 text-white',
                'error': 'bg-red-500 text-white',
                'info': 'bg-blue-500 text-white'
            };
            notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg z-50 ${colors[type] || colors.info}`;
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.remove();
            }, 4000);
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
            const modal = document.getElementById('progressModal');
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>
</body>
</html>