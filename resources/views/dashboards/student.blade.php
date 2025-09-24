<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoswa - Student Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-gradient {
            background: linear-gradient(180deg, #0ea5e9 0%, #0284c7 100%);
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
                    <div class="text-2xl">🎓</div>
                    <div>
                        <h1 class="text-xl font-bold">Zoswa Student</h1>
                        <p class="text-sm text-sky-200">Learning Hub</p>
                    </div>
                </div>

                <!-- Student Profile -->
                <div class="bg-white/10 rounded-lg p-3 mb-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-sky-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-graduate text-white"></i>
                        </div>
                        <div>
                            <p class="font-semibold">{{ $user->name }}</p>
                            <p class="text-xs text-sky-200">Student</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="space-y-2">
                    <a href="#overview" class="flex items-center space-x-3 p-3 rounded-lg bg-white/10 text-white">
                        <i class="fas fa-chart-bar"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#my-courses" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-book"></i>
                        <span>My Courses</span>
                    </a>
                    <a href="#progress" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-chart-line"></i>
                        <span>Progress</span>
                    </a>
                    <a href="#certificates" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-certificate"></i>
                        <span>Certificates</span>
                    </a>
                    <a href="#marketplace" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-store"></i>
                        <span>Marketplace</span>
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
                    <h2 class="text-2xl font-bold text-gray-900">Student Learning Portal</h2>
                    <div class="flex items-center space-x-4">
                        <div class="text-sm text-gray-500">
                            {{ now()->format('M d, Y - H:i') }}
                        </div>
                        <a href="/courses" class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded-lg transition">
                            <i class="fas fa-book mr-1"></i>Browse Courses
                        </a>
                    </div>
                </div>
            </div>

            <!-- Welcome Banner -->
            <div id="overview" class="p-6">
                <div class="bg-gradient-to-r from-sky-400 to-blue-600 rounded-lg p-6 text-white mb-6">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold mb-2">Welcome back, {{ $user->name }}! 🎉</h3>
                            <p class="text-sky-100">Continue your learning journey and unlock new opportunities.</p>
                        </div>
                        <div class="text-6xl opacity-20">
                            🚀
                        </div>
                    </div>
                </div>

                <!-- Learning Stats -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow card-hover p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-sky-100 text-sky-600">
                                <i class="fas fa-book text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Enrolled Courses</p>
                                <p class="text-2xl font-bold text-gray-900">3</p>
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
                                <p class="text-2xl font-bold text-gray-900">1</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow card-hover p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                <i class="fas fa-clock text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">In Progress</p>
                                <p class="text-2xl font-bold text-gray-900">2</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow card-hover p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                <i class="fas fa-certificate text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Certificates</p>
                                <p class="text-2xl font-bold text-gray-900">1</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- My Courses Section -->
                <div id="my-courses" class="bg-white rounded-lg shadow mb-6">
                    <div class="p-6 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">My Courses</h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Course Card 1 -->
                            <div class="border rounded-lg p-4 hover:shadow-md transition">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Completed</span>
                                    <i class="fas fa-star text-yellow-500"></i>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-2">Web Development Fundamentals</h4>
                                <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                                    <div class="bg-green-500 h-2 rounded-full w-full"></div>
                                </div>
                                <div class="flex justify-between text-sm text-gray-600">
                                    <span>100% Complete</span>
                                    <span>Certificate Available</span>
                                </div>
                                <button class="mt-3 w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg transition text-sm">
                                    <i class="fas fa-certificate mr-1"></i>Get Certificate
                                </button>
                            </div>

                            <!-- Course Card 2 -->
                            <div class="border rounded-lg p-4 hover:shadow-md transition">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">In Progress</span>
                                    <i class="fas fa-play-circle text-blue-500"></i>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-2">Advanced JavaScript</h4>
                                <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                                    <div class="bg-blue-500 h-2 rounded-full w-3/4"></div>
                                </div>
                                <div class="flex justify-between text-sm text-gray-600">
                                    <span>75% Complete</span>
                                    <span>3 lessons left</span>
                                </div>
                                <button class="mt-3 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition text-sm">
                                    <i class="fas fa-play mr-1"></i>Continue Learning
                                </button>
                            </div>

                            <!-- Course Card 3 -->
                            <div class="border rounded-lg p-4 hover:shadow-md transition">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded-full">In Progress</span>
                                    <i class="fas fa-play-circle text-orange-500"></i>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-2">React Development</h4>
                                <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                                    <div class="bg-orange-500 h-2 rounded-full w-1/3"></div>
                                </div>
                                <div class="flex justify-between text-sm text-gray-600">
                                    <span>30% Complete</span>
                                    <span>8 lessons left</span>
                                </div>
                                <button class="mt-3 w-full bg-orange-600 hover:bg-orange-700 text-white py-2 rounded-lg transition text-sm">
                                    <i class="fas fa-play mr-1"></i>Continue Learning
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Learning Progress -->
                <div id="progress" class="bg-white rounded-lg shadow mb-6">
                    <div class="p-6 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">Learning Progress</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-check text-white text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">HTML & CSS Basics</p>
                                        <p class="text-sm text-gray-500">Completed on March 15, 2025</p>
                                    </div>
                                </div>
                                <span class="text-green-600 font-semibold">100%</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-play text-white text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">JavaScript Fundamentals</p>
                                        <p class="text-sm text-gray-500">Last activity: 2 days ago</p>
                                    </div>
                                </div>
                                <span class="text-blue-600 font-semibold">75%</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-play text-white text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">React Components</p>
                                        <p class="text-sm text-gray-500">Started 1 week ago</p>
                                    </div>
                                </div>
                                <span class="text-orange-600 font-semibold">30%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommended Courses -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">Recommended for You</h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="border rounded-lg p-4 hover:shadow-md transition">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">Recommended</span>
                                    <span class="text-sm text-gray-500">$49</span>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-2">Node.js Backend Development</h4>
                                <p class="text-sm text-gray-600 mb-3">Build scalable server-side applications with Node.js and Express.</p>
                                <button class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg transition text-sm">
                                    <i class="fas fa-plus mr-1"></i>Enroll Now
                                </button>
                            </div>

                            <div class="border rounded-lg p-4 hover:shadow-md transition">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">New</span>
                                    <span class="text-sm text-gray-500">$39</span>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-2">Database Design & SQL</h4>
                                <p class="text-sm text-gray-600 mb-3">Master database concepts and SQL for web applications.</p>
                                <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg transition text-sm">
                                    <i class="fas fa-plus mr-1"></i>Enroll Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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