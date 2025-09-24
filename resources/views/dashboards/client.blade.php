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
        .nav-link {
            position: relative;
            z-index: 10;
            display: block !important;
            text-decoration: none !important;
            pointer-events: auto !important;
        }
        .nav-link:hover {
            text-decoration: none !important;
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
                <nav class="space-y-2" id="sidebar-nav">
                    <a href="#overview" onclick="scrollToSection('overview'); return false;"
                       class="nav-link flex items-center space-x-3 p-3 rounded-lg bg-white/10 text-white transition-all duration-200 cursor-pointer"
                       data-section="overview">
                        <i class="fas fa-chart-bar"></i>
                        <span>My Requests</span>
                    </a>
                    <a href="#support-progress" onclick="scrollToSection('support-progress'); return false;"
                       class="nav-link flex items-center space-x-3 p-3 rounded-lg text-green-200 hover:bg-white/10 hover:text-white transition-all duration-200 cursor-pointer"
                       data-section="support-progress">
                        <i class="fas fa-tasks"></i>
                        <span>Progress Tracking</span>
                    </a>
                    <a href="#payment-details" onclick="scrollToSection('payment-details'); return false;"
                       class="nav-link flex items-center space-x-3 p-3 rounded-lg text-green-200 hover:bg-white/10 hover:text-white transition-all duration-200 cursor-pointer"
                       data-section="payment-details">
                        <i class="fas fa-credit-card"></i>
                        <span>Payment Details</span>
                    </a>
                    <a href="#submit-request" onclick="scrollToSection('submit-request'); return false;"
                       class="nav-link flex items-center space-x-3 p-3 rounded-lg text-green-200 hover:bg-white/10 hover:text-white transition-all duration-200 cursor-pointer"
                       data-section="submit-request">
                        <i class="fas fa-plus-circle"></i>
                        <span>New Request</span>
                    </a>
                </nav>

                <!-- Debug Test Button -->
                <div class="mt-4 p-3 bg-white/5 rounded-lg text-center">
                    <button onclick="debugSections()" class="text-xs bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded mb-1">
                        Debug Sections
                    </button>
                    <button onclick="scrollToSection('overview')" class="text-xs bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                        Test Scroll
                    </button>
                    <p class="text-xs text-green-200 mt-1">Debug tools</p>
                </div>

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
                        <button onclick="openNewRequestModal()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">
                            <i class="fas fa-plus mr-1"></i>New Request
                        </button>
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

                <!-- Payment Details Section -->
                <div id="payment-details" class="mt-8 bg-white rounded-lg shadow">
                    <div class="p-6 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">Payment Details & Policy</h3>
                    </div>
                    <div class="p-6">
                        <!-- Payment Policy Card -->
                        <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-lg p-6 mb-6">
                            <div class="flex items-start space-x-4">
                                <div class="p-3 bg-yellow-500 rounded-full">
                                    <i class="fas fa-shield-alt text-2xl text-white"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold text-yellow-900 mb-3">🛡️ Payment Protection Policy</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-yellow-800">
                                        <div>
                                            <h5 class="font-semibold mb-2">✅ Before Payment:</h5>
                                            <ul class="text-sm space-y-1">
                                                <li>• Complete solution demonstration</li>
                                                <li>• Video call review required</li>
                                                <li>• Full testing and approval</li>
                                                <li>• Written confirmation needed</li>
                                            </ul>
                                        </div>
                                        <div>
                                            <h5 class="font-semibold mb-2">⚠️ After Payment:</h5>
                                            <ul class="text-sm space-y-1">
                                                <li>• All sales are final</li>
                                                <li>• No refunds available</li>
                                                <li>• Support continues as agreed</li>
                                                <li>• Receipt provided via email</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Methods -->
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Accepted Payment Methods</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="flex items-center space-x-3 p-4 border border-gray-200 rounded-lg">
                                    <div class="p-2 bg-blue-100 rounded-lg">
                                        <i class="fab fa-paypal text-2xl text-blue-600"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-gray-900">PayPal</h5>
                                        <p class="text-sm text-gray-600">Secure online payments</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-3 p-4 border border-gray-200 rounded-lg">
                                    <div class="p-2 bg-green-100 rounded-lg">
                                        <i class="fas fa-credit-card text-2xl text-green-600"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-gray-900">Credit/Debit Card</h5>
                                        <p class="text-sm text-gray-600">Visa, MasterCard, Amex</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-3 p-4 border border-gray-200 rounded-lg">
                                    <div class="p-2 bg-purple-100 rounded-lg">
                                        <i class="fas fa-university text-2xl text-purple-600"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-gray-900">Bank Transfer</h5>
                                        <p class="text-sm text-gray-600">Direct wire transfer</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment History -->
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Payment History</h4>
                            <div class="bg-gray-50 rounded-lg p-6 text-center">
                                <div class="text-4xl text-gray-400 mb-2">💳</div>
                                <p class="text-gray-600">No payment history yet</p>
                                <p class="text-sm text-gray-500 mt-1">Payments will appear here after completion</p>
                            </div>
                        </div>

                        <!-- Contact for Payment Issues -->
                        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-info-circle text-blue-600 text-lg mt-1"></i>
                                <div>
                                    <h5 class="font-semibold text-blue-900">Need Payment Support?</h5>
                                    <p class="text-blue-800 text-sm">
                                        If you have questions about payments or need assistance, please contact our support team.
                                        We're here to help ensure a smooth payment process.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit New Request Section -->
                <div id="submit-request" class="mt-8 bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Submit New Support Request</h3>
                    <div class="text-center py-8">
                        <div class="text-6xl mb-4">🚀</div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">Need Help with a New Project?</h4>
                        <p class="text-gray-600 mb-4">Submit a new support request and get expert assistance for your development needs.</p>
                        <button onclick="openNewRequestModal()" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition">
                            <i class="fas fa-plus mr-2"></i>Submit New Request
                        </button>
                        <p class="text-xs text-gray-500 mt-2">
                            Having trouble? Try:
                            <button onclick="alert('Button works!'); if(typeof openNewRequestModal === 'function') { openNewRequestModal(); } else { alert('Function not found!'); }" class="text-blue-600 underline">Debug Button</button>
                        </p>
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
        let apiToken = null;

        // Get API token for authenticated requests
        async function getApiToken() {
            if (apiToken) return apiToken;

            try {
                const response = await fetch('/auth/api-token', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                const data = await response.json();
                if (data.success) {
                    apiToken = data.data.access_token;
                    return apiToken;
                }
            } catch (error) {
                console.error('Failed to get API token:', error);
            }
            return null;
        }

        // View progress details
        async function viewProgress(requestId) {
            try {
                const token = await getApiToken();
                if (!token) {
                    showNotification('Authentication failed. Please refresh the page.', 'error');
                    return;
                }

                const response = await fetch(`/api/support-requests/${requestId}`, {
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}`,
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
        async function scheduleReview(requestId) {
            const reviewModal = document.createElement('div');
            reviewModal.className = 'fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4';
            reviewModal.innerHTML = `
                <div class="bg-white rounded-lg shadow-xl max-w-md w-full p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Schedule Solution Review</h3>
                    <p class="text-gray-600 mb-4">Please choose your preferred meeting time for solution review:</p>

                    <form id="reviewForm" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Preferred Date</label>
                            <input type="date" id="reviewDate" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                   min="${new Date(Date.now() + 24*60*60*1000).toISOString().split('T')[0]}" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Preferred Time</label>
                            <select id="reviewTime" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                                <option value="">Select time</option>
                                <option value="09:00">9:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="14:00">2:00 PM</option>
                                <option value="15:00">3:00 PM</option>
                                <option value="16:00">4:00 PM</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Meeting Platform</label>
                            <select id="platform" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                                <option value="">Select platform</option>
                                <option value="zoom">Zoom</option>
                                <option value="teams">Microsoft Teams</option>
                                <option value="meet">Google Meet</option>
                                <option value="skype">Skype</option>
                            </select>
                        </div>

                        <div class="flex space-x-3 mt-6">
                            <button type="submit" class="flex-1 bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg transition">
                                Schedule Review
                            </button>
                            <button type="button" onclick="this.closest('.fixed').remove()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 rounded-lg transition">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            `;

            document.body.appendChild(reviewModal);

            document.getElementById('reviewForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const date = document.getElementById('reviewDate').value;
                const time = document.getElementById('reviewTime').value;
                const platform = document.getElementById('platform').value;

                showNotification(`Review scheduled for ${date} at ${time} via ${platform}. You will receive confirmation shortly.`, 'success');
                reviewModal.remove();
            });
        }

        // Process payment
        async function processPayment(requestId) {
            if (!confirm('⚠️ IMPORTANT: Have you reviewed and approved the solution via video call/meeting?\n\nPayment is non-refundable after confirmation. Please ensure you are satisfied with the solution before proceeding.')) {
                return;
            }

            const paymentModal = document.createElement('div');
            paymentModal.className = 'fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4';
            paymentModal.innerHTML = `
                <div class="bg-white rounded-lg shadow-xl max-w-md w-full p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">💳 Process Payment</h3>
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-4">
                        <div class="flex">
                            <div class="text-yellow-600 mr-3">⚠️</div>
                            <div class="text-yellow-800 text-sm">
                                <strong>Payment Policy:</strong><br>
                                • Payment is only due after solution approval<br>
                                • All payments are final after confirmation<br>
                                • Ensure you've reviewed the complete solution
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
                            <select id="paymentMethod" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                                <option value="">Select payment method</option>
                                <option value="paypal">PayPal</option>
                                <option value="stripe">Credit/Debit Card</option>
                                <option value="bank">Bank Transfer</option>
                            </select>
                        </div>

                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="confirmPayment" class="rounded border-gray-300">
                            <label for="confirmPayment" class="text-sm text-gray-700">
                                I confirm that I have reviewed and approved the solution via video call
                            </label>
                        </div>

                        <div class="flex space-x-3 mt-6">
                            <button onclick="initiatePayment(${requestId})" id="proceedPayment"
                                    class="flex-1 bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg transition" disabled>
                                Proceed to Payment
                            </button>
                            <button type="button" onclick="this.closest('.fixed').remove()"
                                    class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 rounded-lg transition">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            `;

            document.body.appendChild(paymentModal);

            // Enable proceed button only when confirmation checkbox is checked
            document.getElementById('confirmPayment').addEventListener('change', function() {
                document.getElementById('proceedPayment').disabled = !this.checked;
            });
        }

        // Initiate payment process
        async function initiatePayment(requestId) {
            const paymentMethod = document.getElementById('paymentMethod').value;
            if (!paymentMethod) {
                showNotification('Please select a payment method', 'error');
                return;
            }

            showNotification(`Redirecting to ${paymentMethod} for payment processing...`, 'info');

            // Close modal
            document.querySelector('.fixed').remove();

            // In a real implementation, this would redirect to payment processor
            setTimeout(() => {
                showNotification('Payment processing initiated. You will receive confirmation via email.', 'success');
            }, 2000);
        }

        // Open new support request modal
        async function openNewRequestModal() {
            console.log('openNewRequestModal called'); // Debug log
            try {
                const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4';
            modal.innerHTML = `
                <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-screen overflow-y-auto">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold text-gray-900">Submit New Support Request</h3>
                            <button onclick="this.closest('.fixed').remove()" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times text-xl"></i>
                            </button>
                        </div>

                        <form id="newRequestForm" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Your Name *</label>
                                    <input type="text" id="requestName" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                                    <input type="email" id="requestEmail" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                                    <input type="tel" id="requestPhone" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Country *</label>
                                    <select id="requestCountry" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                                        <option value="">Select Country</option>
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Netherlands">Netherlands</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Project Title *</label>
                                <input type="text" id="projectTitle" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                       placeholder="Brief description of your project" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Project Description *</label>
                                <textarea id="projectDescription" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                          placeholder="Detailed description of what you need help with..." required></textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Project Type *</label>
                                    <select id="projectType" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                                        <option value="">Select Type</option>
                                        <option value="web_development">Web Development</option>
                                        <option value="mobile_app">Mobile App</option>
                                        <option value="desktop_app">Desktop App</option>
                                        <option value="api_development">API Development</option>
                                        <option value="database_design">Database Design</option>
                                        <option value="bug_fixing">Bug Fixing</option>
                                        <option value="code_review">Code Review</option>
                                        <option value="consulting">Consulting</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Urgency *</label>
                                    <select id="urgency" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                                        <option value="">Select Urgency</option>
                                        <option value="low">Low - Can wait</option>
                                        <option value="medium">Medium - Normal priority</option>
                                        <option value="high">High - Important</option>
                                        <option value="urgent">Urgent - ASAP</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Expected Timeframe *</label>
                                    <input type="text" id="timeframe" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                           placeholder="e.g., 2-3 weeks" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Project Duration *</label>
                                    <input type="text" id="duration" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                           placeholder="e.g., 1 month" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Budget Min ($)</label>
                                    <input type="number" id="budgetMin" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                           placeholder="0" min="0">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Budget Max ($)</label>
                                    <input type="number" id="budgetMax" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                           placeholder="0" min="0">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Technical Requirements</label>
                                <textarea id="techRequirements" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                          placeholder="Specific technologies, frameworks, or requirements..."></textarea>
                            </div>

                            <div class="flex space-x-3 mt-6">
                                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg transition">
                                    <i class="fas fa-paper-plane mr-1"></i>Submit Request
                                </button>
                                <button type="button" onclick="this.closest('.fixed').remove()"
                                        class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 rounded-lg transition">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            `;

            document.body.appendChild(modal);

            // Pre-fill user data if available
            const user = {!! auth()->user() ? json_encode(auth()->user()->only(['name', 'email'])) : 'null' !!};
            if (user) {
                document.getElementById('requestName').value = user.name || '';
                document.getElementById('requestEmail').value = user.email || '';
            }

            // Handle form submission
            document.getElementById('newRequestForm').addEventListener('submit', async function(e) {
                e.preventDefault();
                await submitNewRequest();
            });

            } catch (error) {
                console.error('Error opening new request modal:', error);
                showNotification('Error opening request form. Please try again.', 'error');
            }
        }

        // Submit new support request
        async function submitNewRequest() {
            const form = document.getElementById('newRequestForm');
            const formData = new FormData();

            // Collect form data
            const fields = {
                name: 'requestName',
                email: 'requestEmail',
                phone: 'requestPhone',
                country: 'requestCountry',
                project_title: 'projectTitle',
                project_description: 'projectDescription',
                project_type: 'projectType',
                urgency: 'urgency',
                expected_timeframe: 'timeframe',
                project_duration: 'duration',
                budget_min: 'budgetMin',
                budget_max: 'budgetMax',
                technical_requirements: 'techRequirements'
            };

            for (const [key, fieldId] of Object.entries(fields)) {
                const value = document.getElementById(fieldId).value;
                if (value) {
                    formData.append(key, value);
                }
            }

            try {
                const response = await fetch('/api/support-requests', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    showNotification('Support request submitted successfully! We will review it and get back to you soon.', 'success');
                    document.querySelector('.fixed').remove();

                    // Refresh page to show new request
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    let errorMessage = 'Failed to submit request. ';
                    if (data.errors) {
                        const errors = Object.values(data.errors).flat();
                        errorMessage += errors.join(', ');
                    } else {
                        errorMessage += data.message || 'Please try again.';
                    }
                    showNotification(errorMessage, 'error');
                }
            } catch (error) {
                console.error('Error submitting request:', error);
                showNotification('Network error. Please check your connection and try again.', 'error');
            }
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

        // Close modal when clicking outside
        document.addEventListener('click', function(e) {
            const modal = document.getElementById('progressModal');
            if (e.target === modal) {
                closeModal();
            }
        });

        // Navigation functionality
        function initializeNavigation() {
            console.log('Initializing navigation...');
            const navLinks = document.querySelectorAll('.nav-link');
            const sections = document.querySelectorAll('#overview, #support-progress, #payment-details, #submit-request');

            console.log('Found nav links:', navLinks.length);
            console.log('Found sections:', sections.length);

            // Smooth scroll functionality
            navLinks.forEach((link, index) => {
                console.log(`Attaching click handler to link ${index}:`, link.getAttribute('data-section'));
                link.addEventListener('click', function(e) {
                    console.log('Navigation link clicked:', this.getAttribute('data-section'));
                    e.preventDefault();
                    const targetId = this.getAttribute('data-section');
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        // Find the main content scrollable container
                        const mainContent = document.querySelector('.flex-1.overflow-y-auto');

                        if (mainContent) {
                            // Calculate position relative to the scrollable container
                            const containerRect = mainContent.getBoundingClientRect();
                            const elementRect = targetElement.getBoundingClientRect();
                            const relativeTop = elementRect.top - containerRect.top + mainContent.scrollTop;

                            // Scroll within the container
                            mainContent.scrollTo({
                                top: relativeTop - 20, // Small offset for better visibility
                                behavior: 'smooth'
                            });
                        } else {
                            // Fallback to window scrolling
                            const headerHeight = 80;
                            const elementPosition = targetElement.offsetTop - headerHeight;

                            window.scrollTo({
                                top: elementPosition,
                                behavior: 'smooth'
                            });
                        }

                        // Update active navigation state
                        updateActiveNavigation(targetId);
                    }
                });
            });

            // Update active navigation on scroll
            const mainContent = document.querySelector('.flex-1.overflow-y-auto');
            const scrollContainer = mainContent || window;

            scrollContainer.addEventListener('scroll', function() {
                let currentSection = '';
                const scrollPosition = mainContent ? mainContent.scrollTop + 100 : window.scrollY + 100;

                sections.forEach(section => {
                    const sectionTop = mainContent ?
                        section.offsetTop - mainContent.offsetTop :
                        section.offsetTop;
                    const sectionHeight = section.offsetHeight;

                    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                        currentSection = section.id;
                    }
                });

                if (currentSection) {
                    updateActiveNavigation(currentSection);
                }
            });
        }

        // Update active navigation state
        function updateActiveNavigation(activeSection) {
            const navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(link => {
                const section = link.getAttribute('data-section');
                if (section === activeSection) {
                    // Active state
                    link.classList.remove('text-green-200', 'hover:text-white');
                    link.classList.add('bg-white/10', 'text-white');
                } else {
                    // Inactive state
                    link.classList.remove('bg-white/10', 'text-white');
                    link.classList.add('text-green-200', 'hover:text-white');
                }
            });
        }

        // Initialize navigation when page loads
        document.addEventListener('DOMContentLoaded', function() {
            initializeNavigation();
        });

        // Also initialize after any dynamic content loading
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initializeNavigation);
        } else {
            initializeNavigation();
        }

        // Simple scroll function for inline onclick handlers
        function scrollToSection(sectionId) {
            console.log('Scrolling to section:', sectionId);
            const targetElement = document.getElementById(sectionId);

            if (targetElement) {
                // Find the main content scrollable container
                const mainContent = document.querySelector('.flex-1.overflow-y-auto');

                if (mainContent) {
                    // Calculate position relative to the scrollable container
                    const containerRect = mainContent.getBoundingClientRect();
                    const elementRect = targetElement.getBoundingClientRect();
                    const relativeTop = elementRect.top - containerRect.top + mainContent.scrollTop;

                    // Scroll within the container
                    mainContent.scrollTo({
                        top: relativeTop - 20, // Small offset for better visibility
                        behavior: 'smooth'
                    });
                } else {
                    // Fallback to window scrolling
                    const headerHeight = 80;
                    const elementPosition = targetElement.offsetTop - headerHeight;

                    window.scrollTo({
                        top: elementPosition,
                        behavior: 'smooth'
                    });
                }

                // Update active navigation state
                updateActiveNavigation(sectionId);

                console.log('Scrolled to:', sectionId);
            } else {
                console.error('Section not found:', sectionId);
            }
        }

        // Debug function to check sections
        function debugSections() {
            const sections = ['overview', 'support-progress', 'payment-details', 'submit-request'];
            const mainContent = document.querySelector('.flex-1.overflow-y-auto');
            let debugInfo = 'Section Debug Info:\n\n';

            debugInfo += `Main content container found: ${mainContent ? 'YES' : 'NO'}\n`;
            if (mainContent) {
                debugInfo += `Container scroll position: ${mainContent.scrollTop}\n`;
            }
            debugInfo += `\n`;

            sections.forEach(sectionId => {
                const element = document.getElementById(sectionId);
                if (element) {
                    debugInfo += `✅ ${sectionId}: Found at position ${element.offsetTop}\n`;
                } else {
                    debugInfo += `❌ ${sectionId}: NOT FOUND\n`;
                }
            });

            debugInfo += `\nScrollToSection function exists: ${typeof scrollToSection === 'function' ? 'YES' : 'NO'}`;
            alert(debugInfo);
        }

        // Make functions globally available
        window.openNewRequestModal = openNewRequestModal;
        window.scheduleReview = scheduleReview;
        window.processPayment = processPayment;
        window.viewProgress = viewProgress;
        window.scrollToSection = scrollToSection;
        window.debugSections = debugSections;
    </script>
</body>
</html>