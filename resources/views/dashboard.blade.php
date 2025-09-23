<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoswa - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .sidebar-gradient {
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        }
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
        }
        .pulse-animation {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        .notification-item {
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .notification-item:hover {
            background-color: rgba(0, 0, 0, 0.05);
            transform: translateX(2px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-64 sidebar-gradient shadow-2xl" id="sidebar">
        <div class="flex flex-col h-full">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 px-4 border-b border-slate-600">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-lg"></i>
                    </div>
                    <h1 class="text-xl font-bold text-white">Zoswa</h1>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="#" onclick="showSection('dashboard')" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-slate-700 hover:text-white transition-all duration-200 group">
                    <i class="fas fa-home w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" onclick="showSection('courses')" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-slate-700 hover:text-white transition-all duration-200 group">
                    <i class="fas fa-book w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                    <span>Courses</span>
                </a>
                <a href="#" onclick="showSection('analytics')" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-slate-700 hover:text-white transition-all duration-200 group admin-only">
                    <i class="fas fa-chart-line w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                    <span>Analytics</span>
                </a>
                <a href="#" onclick="showSection('users')" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-slate-700 hover:text-white transition-all duration-200 group admin-only">
                    <i class="fas fa-users w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                    <span>Users</span>
                </a>
                <a href="#" onclick="showSection('support-requests')" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-slate-700 hover:text-white transition-all duration-200 group admin-only">
                    <i class="fas fa-headset w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                    <span>Support Requests</span>
                </a>
                <a href="#" onclick="showSection('marketplace')" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-slate-700 hover:text-white transition-all duration-200 group">
                    <i class="fas fa-briefcase w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                    <span>Marketplace</span>
                </a>
                <a href="#" onclick="showSection('labs')" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-slate-700 hover:text-white transition-all duration-200 group">
                    <i class="fas fa-code w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                    <span>Code Labs</span>
                </a>
                <a href="#" onclick="showSection('certificates')" class="nav-item flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-slate-700 hover:text-white transition-all duration-200 group">
                    <i class="fas fa-certificate w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                    <span>Certificates</span>
                </a>
            </nav>

            <!-- User Profile -->
            <div class="px-4 py-4 border-t border-slate-600">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center">
                        <span id="user-avatar" class="text-white font-semibold text-sm"></span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p id="user-name" class="text-sm font-medium text-white truncate"></p>
                        <p id="user-role" class="text-xs text-gray-400 truncate"></p>
                    </div>
                    <button onclick="logout()" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="ml-64">
        <!-- Top Header -->
        <header class="glass-effect sticky top-0 z-40 border-b border-white/20">
            <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900" id="page-title">Dashboard</h1>
                        <p class="text-gray-600 mt-1" id="page-subtitle">Welcome back! Here's what's happening today.</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Search -->
                        <div class="relative">
                            <input type="text" placeholder="Search..." class="w-64 pl-10 pr-4 py-2 bg-white/80 border border-white/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <!-- Notifications -->
                        <button onclick="showNotificationsModal()" class="relative p-2 text-gray-600 hover:text-gray-900 transition-colors">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="p-6">
            <!-- Dashboard Section -->
            <div id="dashboard-section" class="content-section">
                <!-- Admin Stats Grid -->
                <div id="admin-dashboard" class="admin-only">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Total Users Card -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg card-hover border border-white/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Users</p>
                                <p class="text-3xl font-bold text-gray-900" id="total-users">6</p>
                                <p class="text-sm text-green-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>+12% from last month
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-users text-white text-lg"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Active Courses Card -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg card-hover border border-white/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Active Courses</p>
                                <p class="text-3xl font-bold text-gray-900" id="total-courses">5</p>
                                <p class="text-sm text-green-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>+3 new courses
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-book text-white text-lg"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue Card -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg card-hover border border-white/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Monthly Revenue</p>
                                <p class="text-3xl font-bold text-gray-900">$12,450</p>
                                <p class="text-sm text-green-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>+8.2% growth
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-dollar-sign text-white text-lg"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Completion Rate -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg card-hover border border-white/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Completion Rate</p>
                                <p class="text-3xl font-bold text-gray-900">87%</p>
                                <p class="text-sm text-green-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>+4% improvement
                                </p>
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-chart-line text-white text-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <!-- Revenue Chart -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-900">Revenue Overview</h3>
                            <select class="text-sm border border-gray-200 rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Last 7 days</option>
                                <option>Last 30 days</option>
                                <option>Last 90 days</option>
                            </select>
                        </div>
                        <div class="h-64 flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl">
                            <div class="text-center">
                                <i class="fas fa-chart-area text-4xl text-blue-500 mb-3"></i>
                                <p class="text-gray-600">Revenue chart will be displayed here</p>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">Recent Activity</h3>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3 p-3 rounded-xl bg-blue-50">
                                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user-plus text-white text-xs"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">New user registered</p>
                                    <p class="text-xs text-gray-500">Alice Johnson joined as a student</p>
                                </div>
                                <span class="text-xs text-gray-400">2 min ago</span>
                            </div>
                            <div class="flex items-center space-x-3 p-3 rounded-xl bg-green-50">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-white text-xs"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">Course completed</p>
                                    <p class="text-xs text-gray-500">Mike completed Web Development Bootcamp</p>
                                </div>
                                <span class="text-xs text-gray-400">15 min ago</span>
                            </div>
                            <div class="flex items-center space-x-3 p-3 rounded-xl bg-purple-50">
                                <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-dollar-sign text-white text-xs"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">Payment received</p>
                                    <p class="text-xs text-gray-500">$299 for Advanced ML Course</p>
                                </div>
                                <span class="text-xs text-gray-400">1 hour ago</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Quick Actions</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <button onclick="openCourseModal()" class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:from-blue-600 hover:to-blue-700 transition-all duration-200 transform hover:scale-105">
                            <i class="fas fa-plus text-2xl mb-2"></i>
                            <span class="text-sm font-medium">Add Course</span>
                        </button>
                        <button onclick="openAddUserModal()" class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-green-500 to-green-600 text-white hover:from-green-600 hover:to-green-700 transition-all duration-200 transform hover:scale-105">
                            <i class="fas fa-user-plus text-2xl mb-2"></i>
                            <span class="text-sm font-medium">Add User</span>
                        </button>
                        <button onclick="showReportsModal()" class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-purple-500 to-purple-600 text-white hover:from-purple-600 hover:to-purple-700 transition-all duration-200 transform hover:scale-105">
                            <i class="fas fa-chart-bar text-2xl mb-2"></i>
                            <span class="text-sm font-medium">View Reports</span>
                        </button>
                        <button onclick="showSettingsModal()" class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-orange-500 to-orange-600 text-white hover:from-orange-600 hover:to-orange-700 transition-all duration-200 transform hover:scale-105">
                            <i class="fas fa-cog text-2xl mb-2"></i>
                            <span class="text-sm font-medium">Settings</span>
                        </button>
                    </div>
                </div>
                </div>

                <!-- Student Dashboard -->
                <div id="student-dashboard" class="student-only hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <!-- My Progress Card -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg card-hover border border-white/20">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">My Courses</p>
                                    <p class="text-3xl font-bold text-gray-900" id="student-courses">0</p>
                                    <p class="text-sm text-blue-600 mt-1">
                                        <i class="fas fa-play mr-1"></i>Continue Learning
                                    </p>
                                </div>
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-white text-lg"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Progress Card -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg card-hover border border-white/20">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Overall Progress</p>
                                    <p class="text-3xl font-bold text-gray-900" id="student-progress">0%</p>
                                    <p class="text-sm text-green-600 mt-1">
                                        <i class="fas fa-arrow-up mr-1"></i>Keep it up!
                                    </p>
                                </div>
                                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-chart-line text-white text-lg"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Certificates Card -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg card-hover border border-white/20">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Certificates</p>
                                    <p class="text-3xl font-bold text-gray-900" id="student-certificates">0</p>
                                    <p class="text-sm text-yellow-600 mt-1">
                                        <i class="fas fa-trophy mr-1"></i>Earned
                                    </p>
                                </div>
                                <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-certificate text-white text-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions for Students -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">Quick Actions</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <button onclick="showSection('courses')" class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:from-blue-600 hover:to-blue-700 transition-all duration-200 transform hover:scale-105">
                                <i class="fas fa-book text-2xl mb-2"></i>
                                <span class="text-sm font-medium">Browse Courses</span>
                            </button>
                            <button onclick="showMyProgress()" class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-green-500 to-green-600 text-white hover:from-green-600 hover:to-green-700 transition-all duration-200 transform hover:scale-105">
                                <i class="fas fa-chart-line text-2xl mb-2"></i>
                                <span class="text-sm font-medium">My Progress</span>
                            </button>
                            <button onclick="showSection('certificates')" class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-yellow-500 to-yellow-600 text-white hover:from-yellow-600 hover:to-yellow-700 transition-all duration-200 transform hover:scale-105">
                                <i class="fas fa-certificate text-2xl mb-2"></i>
                                <span class="text-sm font-medium">Certificates</span>
                            </button>
                            <button onclick="toggleTutorBotFromDashboard()" class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-purple-500 to-purple-600 text-white hover:from-purple-600 hover:to-purple-700 transition-all duration-200 transform hover:scale-105">
                                <i class="fas fa-robot text-2xl mb-2"></i>
                                <span class="text-sm font-medium">AI Tutor</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Instructor Dashboard -->
                <div id="instructor-dashboard" class="instructor-only hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <!-- My Courses Card -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg card-hover border border-white/20">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">My Courses</p>
                                    <p class="text-3xl font-bold text-gray-900" id="instructor-courses">0</p>
                                    <p class="text-sm text-blue-600 mt-1">
                                        <i class="fas fa-plus mr-1"></i>Create New
                                    </p>
                                </div>
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-chalkboard-teacher text-white text-lg"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Students Card -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg card-hover border border-white/20">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">My Students</p>
                                    <p class="text-3xl font-bold text-gray-900" id="instructor-students">0</p>
                                    <p class="text-sm text-green-600 mt-1">
                                        <i class="fas fa-arrow-up mr-1"></i>+5% this month
                                    </p>
                                </div>
                                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-user-graduate text-white text-lg"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Revenue Card -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg card-hover border border-white/20">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Revenue</p>
                                    <p class="text-3xl font-bold text-gray-900" id="instructor-revenue">$0</p>
                                    <p class="text-sm text-purple-600 mt-1">
                                        <i class="fas fa-dollar-sign mr-1"></i>This month
                                    </p>
                                </div>
                                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-chart-pie text-white text-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions for Instructors -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">Quick Actions</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <button onclick="openCourseModal()" class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:from-blue-600 hover:to-blue-700 transition-all duration-200 transform hover:scale-105">
                                <i class="fas fa-plus text-2xl mb-2"></i>
                                <span class="text-sm font-medium">Create Course</span>
                            </button>
                            <button onclick="showSection('courses')" class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-green-500 to-green-600 text-white hover:from-green-600 hover:to-green-700 transition-all duration-200 transform hover:scale-105">
                                <i class="fas fa-book text-2xl mb-2"></i>
                                <span class="text-sm font-medium">My Courses</span>
                            </button>
                            <button onclick="openCodeLabModal()" class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-purple-500 to-purple-600 text-white hover:from-purple-600 hover:to-purple-700 transition-all duration-200 transform hover:scale-105">
                                <i class="fas fa-code text-2xl mb-2"></i>
                                <span class="text-sm font-medium">Create Lab</span>
                            </button>
                            <button onclick="showSection('analytics')" class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-orange-500 to-orange-600 text-white hover:from-orange-600 hover:to-orange-700 transition-all duration-200 transform hover:scale-105">
                                <i class="fas fa-chart-bar text-2xl mb-2"></i>
                                <span class="text-sm font-medium">Analytics</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Courses Section -->
            <div id="courses-section" class="content-section hidden">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Course Management</h3>
                        <div class="flex items-center space-x-4">
                            <select id="category-filter" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="filterCourses()">
                                <option value="">All Categories</option>
                                <option value="web_development">Web Development</option>
                                <option value="data_analysis">Data Analysis</option>
                                <option value="ai_ml">AI & Machine Learning</option>
                            </select>
                            <select id="difficulty-filter" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="filterCourses()">
                                <option value="">All Levels</option>
                                <option value="beginner">Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advanced">Advanced</option>
                            </select>
                            <button onclick="openCourseModal()" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200">
                                <i class="fas fa-plus mr-2"></i>Add Course
                            </button>
                        </div>
                    </div>

                    <!-- Search and Stats -->
                    <div class="mb-6 flex items-center justify-between">
                        <div class="relative">
                            <input type="text" id="course-search" placeholder="Search courses..."
                                   class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   onkeyup="searchCourses()">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <div class="text-sm text-gray-600">
                            <span id="courses-count">0</span> courses total
                        </div>
                    </div>

                    <div id="courses-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="text-center text-gray-500 col-span-full py-8">
                            <i class="fas fa-spinner fa-spin text-2xl mb-3"></i>
                            <p>Loading courses...</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Modal -->
            <div id="course-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl p-6 max-w-2xl w-full max-h-screen overflow-y-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h3 id="modal-title" class="text-xl font-bold text-gray-900">Add New Course</h3>
                        <button onclick="closeCourseModal()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <form id="course-form" onsubmit="saveCourse(event)">
                        <input type="hidden" id="course-id" value="">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Course Title</label>
                                <input type="text" id="course-title" required
                                       class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                <select id="course-category" required
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Category</option>
                                    <option value="web_development">Web Development</option>
                                    <option value="data_analysis">Data Analysis</option>
                                    <option value="ai_ml">AI & Machine Learning</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Difficulty</label>
                                <select id="course-difficulty" required
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Level</option>
                                    <option value="beginner">Beginner</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="advanced">Advanced</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Price ($)</label>
                                <input type="number" id="course-price" step="0.01" min="0" required
                                       class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Est. Hours</label>
                                <input type="number" id="course-hours" min="1" required
                                       class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea id="course-description" rows="4" required
                                      class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      placeholder="Describe what students will learn in this course..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Technologies (comma-separated)</label>
                            <input type="text" id="course-technologies"
                                   placeholder="React, JavaScript, Node.js, MongoDB"
                                   class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" id="course-active" class="mr-2">
                                <span class="text-sm text-gray-700">Course is active and visible to students</span>
                            </label>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeCourseModal()"
                                    class="px-4 py-2 text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700">
                                <i class="fas fa-save mr-2"></i>Save Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Confirmation Modal -->
            <div id="delete-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl p-6 max-w-md w-full">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-trash text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Delete Course</h3>
                        <p class="text-gray-600 mb-6">Are you sure you want to delete this course? This action cannot be undone.</p>
                        <div class="flex justify-center space-x-3">
                            <button onclick="closeDeleteModal()"
                                    class="px-4 py-2 text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50">
                                Cancel
                            </button>
                            <button onclick="confirmDeleteCourse()"
                                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                Delete Course
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Analytics Section -->
            <div id="analytics-section" class="content-section hidden">
                <!-- Overview Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 card-hover">
                        <div class="flex items-center">
                            <div class="p-3 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Users</p>
                                <p id="total-users" class="text-2xl font-bold text-gray-900">-</p>
                                <p class="text-sm text-green-600">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span id="users-growth">-</span>% from last month
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 card-hover">
                        <div class="flex items-center">
                            <div class="p-3 bg-gradient-to-r from-green-500 to-green-600 rounded-lg">
                                <i class="fas fa-book text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Courses</p>
                                <p id="total-courses" class="text-2xl font-bold text-gray-900">-</p>
                                <p class="text-sm text-blue-600">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    <span id="active-courses">-</span> active
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 card-hover">
                        <div class="flex items-center">
                            <div class="p-3 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg">
                                <i class="fas fa-dollar-sign text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                                <p id="total-revenue" class="text-2xl font-bold text-gray-900">$-</p>
                                <p class="text-sm text-green-600">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span id="revenue-growth">-</span>% from last month
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 card-hover">
                        <div class="flex items-center">
                            <div class="p-3 bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg">
                                <i class="fas fa-graduation-cap text-white text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Enrollments</p>
                                <p id="total-enrollments" class="text-2xl font-bold text-gray-900">-</p>
                                <p class="text-sm text-purple-600">
                                    <i class="fas fa-calendar mr-1"></i>
                                    <span id="monthly-enrollments">-</span> this month
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <!-- User Growth Chart -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-900">User Growth</h3>
                            <select id="user-growth-period" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="updateUserGrowthChart()">
                                <option value="7">Last 7 days</option>
                                <option value="30" selected>Last 30 days</option>
                                <option value="90">Last 3 months</option>
                            </select>
                        </div>
                        <div class="h-64 flex items-center justify-center">
                            <canvas id="user-growth-chart" width="400" height="200"></canvas>
                        </div>
                    </div>

                    <!-- Course Categories Chart -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">Course Distribution</h3>
                        <div class="h-64 flex items-center justify-center">
                            <canvas id="course-categories-chart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Revenue and Popular Courses -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                    <!-- Revenue Chart -->
                    <div class="lg:col-span-2 bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-900">Revenue Overview</h3>
                            <select id="revenue-period" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="updateRevenueChart()">
                                <option value="30">Last 30 days</option>
                                <option value="90" selected>Last 3 months</option>
                                <option value="365">Last year</option>
                            </select>
                        </div>
                        <div class="h-64">
                            <canvas id="revenue-chart" width="600" height="200"></canvas>
                        </div>
                    </div>

                    <!-- Popular Courses -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">Popular Courses</h3>
                        <div id="popular-courses-list" class="space-y-4">
                            <div class="animate-pulse">
                                <div class="h-4 bg-gray-200 rounded w-3/4 mb-2"></div>
                                <div class="h-3 bg-gray-200 rounded w-1/2"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Recent Users -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">Recent Users</h3>
                        <div id="recent-users-list" class="space-y-4">
                            <div class="animate-pulse">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
                                    <div class="flex-1">
                                        <div class="h-4 bg-gray-200 rounded w-1/2 mb-1"></div>
                                        <div class="h-3 bg-gray-200 rounded w-1/3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Health -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">System Health</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600">Database</span>
                                <span class="flex items-center text-green-600">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    <span class="text-sm">Healthy</span>
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600">API Response</span>
                                <span class="flex items-center text-green-600">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    <span class="text-sm" id="api-response-time">~0.2s</span>
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600">Storage</span>
                                <span class="flex items-center text-blue-600">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    <span class="text-sm">85% used</span>
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600">Last Backup</span>
                                <span class="flex items-center text-green-600">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    <span class="text-sm">2 hours ago</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users Management Section -->
            <div id="users-section" class="content-section hidden">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">User Management</h3>
                        <div class="flex items-center space-x-4">
                            <select id="role-filter" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="filterUsers()">
                                <option value="">All Roles</option>
                                <option value="admin">Admin</option>
                                <option value="instructor">Instructor</option>
                                <option value="student">Student</option>
                                <option value="client">Client</option>
                            </select>
                            <select id="status-filter" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="filterUsers()">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <button onclick="openUserModal()" class="bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-200">
                                <i class="fas fa-plus mr-2"></i>Add User
                            </button>
                        </div>
                    </div>

                    <!-- Search and Stats -->
                    <div class="mb-6 flex items-center justify-between">
                        <div class="relative">
                            <input type="text" id="user-search" placeholder="Search users..."
                                   class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   onkeyup="searchUsers()">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <div class="text-sm text-gray-600">
                            <span id="users-count">0</span> users total
                        </div>
                    </div>

                    <!-- Users Grid -->
                    <div id="users-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-white rounded-lg p-6 text-center text-gray-500">
                            <i class="fas fa-spinner fa-spin text-2xl mb-3"></i>
                            <p>Loading users...</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Modal -->
            <div id="user-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl p-6 max-w-2xl w-full max-h-screen overflow-y-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h3 id="user-modal-title" class="text-xl font-bold text-gray-900">Add New User</h3>
                        <button onclick="closeUserModal()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <form id="user-form" onsubmit="saveUser(event)">
                        <input type="hidden" id="user-id" value="">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" id="user-name" required
                                       class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" id="user-email" required
                                       class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                                <select id="user-role" required
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Role</option>
                                    <option value="student">Student</option>
                                    <option value="instructor">Instructor</option>
                                    <option value="client">Client</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone (Optional)</label>
                                <input type="tel" id="user-phone"
                                       class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="mb-4" id="password-section">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input type="password" id="user-password" required
                                   class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   placeholder="Enter password (min 8 characters)">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bio (Optional)</label>
                            <textarea id="user-bio" rows="3"
                                      class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      placeholder="Tell us about this user..."></textarea>
                        </div>

                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" id="user-active" class="mr-2">
                                <span class="text-sm text-gray-700">User account is active</span>
                            </label>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeUserModal()"
                                    class="px-4 py-2 text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:from-green-600 hover:to-green-700">
                                <i class="fas fa-save mr-2"></i>Save User
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete User Confirmation Modal -->
            <div id="delete-user-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl p-6 max-w-md w-full">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-trash text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Delete User</h3>
                        <p class="text-gray-600 mb-6">Are you sure you want to delete this user? This action cannot be undone.</p>
                        <div class="flex justify-center space-x-3">
                            <button onclick="closeDeleteUserModal()"
                                    class="px-4 py-2 text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50">
                                Cancel
                            </button>
                            <button onclick="confirmDeleteUser()"
                                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                Delete User
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Progress Modal -->
            <div id="student-progress-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
                <div class="bg-white rounded-xl p-6 max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Student Progress Report</h3>
                        <div class="flex items-center space-x-3">
                            <button onclick="downloadProgressReport()" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors">
                                <i class="fas fa-download mr-2"></i>Download Report
                            </button>
                            <button onclick="closeStudentProgressModal()" class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div id="student-progress-content">
                        <!-- Progress content will be loaded here -->
                    </div>
                </div>
            </div>

            <!-- Certificate Generation Modal -->
            <div id="certificate-generation-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
                <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Generate Certificate</h3>
                        <button onclick="closeCertificateGenerationModal()" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div id="certificate-generation-content">
                        <!-- Content will be loaded here -->
                    </div>
                </div>
            </div>

            <!-- Support Requests Section -->
            <div id="support-requests-section" class="content-section hidden">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Support Requests</h3>
                        <div class="flex items-center space-x-4">
                            <select id="support-status-filter" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="filterSupportRequests()">
                                <option value="">All Status</option>
                                <option value="pending">Pending</option>
                                <option value="in_review">In Review</option>
                                <option value="assigned">Assigned</option>
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            <select id="support-urgency-filter" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="filterSupportRequests()">
                                <option value="">All Urgency</option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                            <button onclick="refreshSupportRequests()" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200">
                                <i class="fas fa-sync-alt mr-2"></i>Refresh
                            </button>
                        </div>
                    </div>

                    <!-- Support Requests Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6">
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-yellow-600" id="pending-count">-</div>
                            <div class="text-sm text-yellow-600 font-medium">Pending</div>
                        </div>
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-blue-600" id="in-progress-count">-</div>
                            <div class="text-sm text-blue-600 font-medium">In Progress</div>
                        </div>
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-green-600" id="completed-count">-</div>
                            <div class="text-sm text-green-600 font-medium">Completed</div>
                        </div>
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-red-600" id="urgent-count">-</div>
                            <div class="text-sm text-red-600 font-medium">Urgent</div>
                        </div>
                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-purple-600" id="total-support-count">-</div>
                            <div class="text-sm text-purple-600 font-medium">Total</div>
                        </div>
                    </div>

                    <!-- Support Requests List -->
                    <div id="support-requests-list" class="space-y-4">
                        <div class="text-center py-8">
                            <i class="fas fa-spinner fa-spin text-gray-400 text-2xl mb-4"></i>
                            <p class="text-gray-500">Loading support requests...</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Marketplace Section -->
            <div id="marketplace-section" class="content-section hidden">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Development Services</h3>
                        <div class="flex items-center space-x-4">
                            <select id="project-status-filter" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="filterProjects()">
                                <option value="">All Status</option>
                                <option value="pending">Pending</option>
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            <select id="project-type-filter" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="filterProjects()">
                                <option value="">All Types</option>
                                <option value="web_development">Web Development</option>
                                <option value="data_analysis">Data Analysis</option>
                                <option value="api_integration">API Integration</option>
                                <option value="consultation">Consultation</option>
                            </select>
                            <button onclick="openProjectModal()" class="bg-gradient-to-r from-purple-500 to-purple-600 text-white px-4 py-2 rounded-lg hover:from-purple-600 hover:to-purple-700 transition-all duration-200">
                                <i class="fas fa-plus mr-2"></i>Request Project
                            </button>
                        </div>
                    </div>

                    <!-- Search and Stats -->
                    <div class="mb-6 flex items-center justify-between">
                        <div class="relative">
                            <input type="text" id="project-search" placeholder="Search projects..."
                                   class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   onkeyup="searchProjects()">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <div class="text-sm text-gray-600">
                            <span id="projects-count">0</span> projects total
                        </div>
                    </div>

                    <!-- Projects Grid -->
                    <div id="projects-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="text-center text-gray-500 col-span-full py-8">
                            <i class="fas fa-spinner fa-spin text-2xl mb-3"></i>
                            <p>Loading projects...</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Request Modal -->
            <div id="project-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl p-6 max-w-3xl w-full max-h-screen overflow-y-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h3 id="project-modal-title" class="text-xl font-bold text-gray-900">Request Development Project</h3>
                        <button onclick="closeProjectModal()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <form id="project-form" onsubmit="saveProject(event)">
                        <input type="hidden" id="project-id" value="">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Project Title</label>
                                <input type="text" id="project-title" required
                                       class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                       placeholder="e.g., E-commerce Website Development">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Project Type</label>
                                <select id="project-type" required
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Type</option>
                                    <option value="web_development">Web Development</option>
                                    <option value="data_analysis">Data Analysis</option>
                                    <option value="api_integration">API Integration</option>
                                    <option value="consultation">Consultation</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Budget Range</label>
                                <select id="project-budget" required
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Budget</option>
                                    <option value="500-1000">$500 - $1,000</option>
                                    <option value="1000-2500">$1,000 - $2,500</option>
                                    <option value="2500-5000">$2,500 - $5,000</option>
                                    <option value="5000+">$5,000+</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Timeline</label>
                                <select id="project-timeline" required
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Timeline</option>
                                    <option value="1-2 weeks">1-2 weeks</option>
                                    <option value="3-4 weeks">3-4 weeks</option>
                                    <option value="1-2 months">1-2 months</option>
                                    <option value="3+ months">3+ months</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Priority</label>
                                <select id="project-priority" required
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Priority</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                    <option value="urgent">Urgent</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Project Description</label>
                            <textarea id="project-description" rows="4" required
                                      class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      placeholder="Describe your project requirements, goals, and any specific features you need..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Technical Requirements</label>
                            <textarea id="project-requirements" rows="3"
                                      class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      placeholder="Any specific technologies, platforms, or technical constraints..."></textarea>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Additional Notes</label>
                            <textarea id="project-notes" rows="2"
                                      class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      placeholder="Any additional information or special requests..."></textarea>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeProjectModal()"
                                    class="px-4 py-2 text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-lg hover:from-purple-600 hover:to-purple-700">
                                <i class="fas fa-paper-plane mr-2"></i>Submit Request
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Project Details Modal -->
            <div id="project-details-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl p-6 max-w-2xl w-full max-h-screen overflow-y-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h3 id="project-details-title" class="text-xl font-bold text-gray-900">Project Details</h3>
                        <button onclick="closeProjectDetailsModal()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <div id="project-details-content">
                        <!-- Project details will be populated here -->
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <button onclick="closeProjectDetailsModal()"
                                class="px-4 py-2 text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50">
                            Close
                        </button>
                        <button id="edit-project-btn" onclick="editProjectFromDetails()"
                                class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700">
                            <i class="fas fa-edit mr-2"></i>Edit Project
                        </button>
                    </div>
                </div>
            </div>

            <!-- CodeLabs Section -->
            <div id="labs-section" class="content-section hidden">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Code Labs</h3>
                        <div class="flex items-center space-x-4">
                            <select id="codelab-course-filter" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="filterCodeLabs()">
                                <option value="">All Courses</option>
                                <option value="1">Complete Web Development Bootcamp</option>
                                <option value="2">Python Data Analysis Fundamentals</option>
                                <option value="3">Machine Learning with Python</option>
                            </select>
                            <select id="codelab-language-filter" class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="filterCodeLabs()">
                                <option value="">All Languages</option>
                                <option value="javascript">JavaScript</option>
                                <option value="python">Python</option>
                                <option value="php">PHP</option>
                                <option value="html">HTML</option>
                                <option value="css">CSS</option>
                            </select>
                            <button onclick="openCodeLabModal()" class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-4 py-2 rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 admin-only">
                                <i class="fas fa-plus mr-2"></i>Create Lab
                            </button>
                        </div>
                    </div>

                    <!-- Search and Stats -->
                    <div class="mb-6 flex items-center justify-between">
                        <div class="relative">
                            <input type="text" id="codelab-search" placeholder="Search code labs..."
                                   class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   onkeyup="searchCodeLabs()">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <div class="text-sm text-gray-600">
                            <span id="codelabs-count">0</span> labs available
                        </div>
                    </div>

                    <!-- CodeLabs Grid -->
                    <div id="codelabs-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="text-center text-gray-500 col-span-full py-8">
                            <i class="fas fa-spinner fa-spin text-2xl mb-3"></i>
                            <p>Loading code labs...</p>
                        </div>
                    </div>
                </div>

                <!-- IDE Environment (hidden by default) -->
                <div id="ide-environment" class="hidden fixed inset-0 bg-gray-900 z-50">
                    <!-- IDE Header -->
                    <div class="bg-gray-800 border-b border-gray-700 px-4 py-2 flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <button onclick="closeIDE()" class="text-gray-400 hover:text-white">
                                <i class="fas fa-arrow-left mr-2"></i>Back to Labs
                            </button>
                            <div class="text-white">
                                <span id="ide-lab-title" class="font-medium">Lab Title</span>
                                <span class="text-gray-400 ml-2" id="ide-language">JavaScript</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button onclick="runCode()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                                <i class="fas fa-play mr-2"></i>Run Code
                            </button>
                            <button onclick="resetCode()" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg">
                                <i class="fas fa-refresh mr-2"></i>Reset
                            </button>
                            <button onclick="submitSolution()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                                <i class="fas fa-check mr-2"></i>Submit
                            </button>
                        </div>
                    </div>

                    <!-- IDE Content -->
                    <div class="flex h-full">
                        <!-- Left Panel - Instructions -->
                        <div class="w-1/3 bg-gray-100 border-r border-gray-300 overflow-y-auto">
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-gray-900 mb-3">Instructions</h3>
                                <div id="lab-instructions" class="text-gray-700 mb-6">
                                    <!-- Instructions will be loaded here -->
                                </div>

                                <h4 class="text-md font-semibold text-gray-900 mb-2">Hints</h4>
                                <div id="lab-hints" class="space-y-2 mb-4">
                                    <!-- Hints will be loaded here -->
                                </div>

                                <h4 class="text-md font-semibold text-gray-900 mb-2">Test Cases</h4>
                                <div id="lab-test-cases" class="bg-gray-50 p-3 rounded-lg text-sm">
                                    <!-- Test cases will be loaded here -->
                                </div>
                            </div>
                        </div>

                        <!-- Right Panel - Code Editor and Output -->
                        <div class="flex-1 flex flex-col">
                            <!-- Code Editor -->
                            <div class="flex-1 relative">
                                <div class="absolute inset-0 bg-gray-900">
                                    <textarea id="code-editor" class="w-full h-full p-4 bg-gray-900 text-green-400 font-mono resize-none outline-none" placeholder="// Write your code here..."></textarea>
                                </div>
                            </div>

                            <!-- Output Panel -->
                            <div class="h-1/3 bg-black border-t border-gray-700">
                                <div class="bg-gray-800 px-4 py-2 border-b border-gray-700">
                                    <div class="flex items-center justify-between">
                                        <h4 class="text-white font-medium">Output</h4>
                                        <button onclick="clearOutput()" class="text-gray-400 hover:text-white text-sm">
                                            <i class="fas fa-trash mr-1"></i>Clear
                                        </button>
                                    </div>
                                </div>
                                <div id="code-output" class="p-4 text-green-400 font-mono text-sm h-full overflow-y-auto">
                                    <div class="text-gray-500">Ready to run code...</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CodeLab Modal -->
            <div id="codelab-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl p-6 max-w-4xl w-full max-h-screen overflow-y-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h3 id="codelab-modal-title" class="text-xl font-bold text-gray-900">Create Code Lab</h3>
                        <button onclick="closeCodeLabModal()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <form id="codelab-form" onsubmit="saveCodeLab(event)">
                        <input type="hidden" id="codelab-id" value="">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Lab Title</label>
                                <input type="text" id="codelab-title" required
                                       class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                       placeholder="e.g., Introduction to Functions">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Course</label>
                                <select id="codelab-course" required
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Course</option>
                                    <option value="1">Complete Web Development Bootcamp</option>
                                    <option value="2">Python Data Analysis Fundamentals</option>
                                    <option value="3">Machine Learning with Python</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Programming Language</label>
                                <select id="codelab-language" required
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Language</option>
                                    <option value="javascript">JavaScript</option>
                                    <option value="python">Python</option>
                                    <option value="php">PHP</option>
                                    <option value="java">Java</option>
                                    <option value="cpp">C++</option>
                                    <option value="html">HTML</option>
                                    <option value="css">CSS</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Difficulty</label>
                                <select id="codelab-difficulty" required
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Difficulty</option>
                                    <option value="beginner">Beginner</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="advanced">Advanced</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Est. Time (minutes)</label>
                                <input type="number" id="codelab-time" min="5" max="180" required
                                       class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea id="codelab-description" rows="3" required
                                      class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      placeholder="Brief description of what students will learn..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Instructions</label>
                            <textarea id="codelab-instructions" rows="4" required
                                      class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      placeholder="Step-by-step instructions for completing the lab..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Starter Code</label>
                            <textarea id="codelab-starter-code" rows="6"
                                      class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono"
                                      placeholder="// Initial code that students will start with..."></textarea>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Solution Code</label>
                            <textarea id="codelab-solution-code" rows="6"
                                      class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono"
                                      placeholder="// Complete solution code..."></textarea>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeCodeLabModal()"
                                    class="px-4 py-2 text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:from-orange-600 hover:to-orange-700">
                                <i class="fas fa-save mr-2"></i>Save Lab
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Settings Modal -->
            <div id="settings-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl p-6 max-w-2xl w-full max-h-screen overflow-y-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-900">Payment Settings</h3>
                        <button onclick="closeSettingsModal()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <!-- PayPal Settings -->
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <i class="fab fa-paypal text-blue-600 mr-2"></i>PayPal Configuration
                        </h4>

                        <form id="paypal-settings-form" onsubmit="savePayPalSettings(event)">
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Client ID</label>
                                    <input type="text" id="paypal-client-id"
                                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="Enter PayPal Client ID" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Client Secret</label>
                                    <input type="password" id="paypal-client-secret"
                                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="Enter PayPal Client Secret" required>
                                </div>

                                <div class="flex items-center space-x-4">
                                    <label class="flex items-center">
                                        <input type="checkbox" id="paypal-sandbox"
                                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Sandbox Mode (for testing)</span>
                                    </label>

                                    <label class="flex items-center">
                                        <input type="checkbox" id="paypal-active"
                                               class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                        <span class="ml-2 text-sm text-gray-700">Enable PayPal</span>
                                    </label>
                                </div>

                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                    <h5 class="font-medium text-blue-800 mb-2">Setup Instructions:</h5>
                                    <ol class="text-sm text-blue-700 space-y-1 list-decimal list-inside">
                                        <li>Create a PayPal Developer account at <a href="https://developer.paypal.com" target="_blank" class="underline">developer.paypal.com</a></li>
                                        <li>Create a new app in your PayPal Developer Dashboard</li>
                                        <li>Copy the Client ID and Client Secret from your app</li>
                                        <li>Use Sandbox mode for testing, live mode for production</li>
                                    </ol>
                                </div>
                            </div>

                            <div class="flex justify-end space-x-3 mt-6">
                                <button type="button" onclick="closeSettingsModal()"
                                        class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                                    Cancel
                                </button>
                                <button type="submit"
                                        class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700">
                                    <i class="fas fa-save mr-2"></i>Save Settings
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Notifications Modal -->
            <div id="notifications-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl p-6 max-w-2xl w-full max-h-screen overflow-y-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-900">Notifications</h3>
                        <button onclick="closeNotificationsModal()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <div id="notifications-list" class="space-y-4">
                        <!-- Sample notifications -->
                        <div class="flex items-start p-4 bg-blue-50 border-l-4 border-blue-500 rounded-lg">
                            <div class="flex-shrink-0">
                                <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                            </div>
                            <div class="ml-3 flex-1">
                                <h4 class="text-sm font-medium text-blue-800">System Update</h4>
                                <p class="text-sm text-blue-700 mt-1">The system has been updated with new features. Check out the latest enhancements!</p>
                                <p class="text-xs text-blue-600 mt-2">2 hours ago</p>
                            </div>
                        </div>

                        <div class="flex items-start p-4 bg-green-50 border-l-4 border-green-500 rounded-lg">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                            </div>
                            <div class="ml-3 flex-1">
                                <h4 class="text-sm font-medium text-green-800">Course Completed</h4>
                                <p class="text-sm text-green-700 mt-1">Congratulations! You've completed the "Complete Web Development Bootcamp" course.</p>
                                <p class="text-xs text-green-600 mt-2">1 day ago</p>
                            </div>
                        </div>

                        <div class="flex items-start p-4 bg-yellow-50 border-l-4 border-yellow-500 rounded-lg">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-triangle text-yellow-500 mt-1"></i>
                            </div>
                            <div class="ml-3 flex-1">
                                <h4 class="text-sm font-medium text-yellow-800">Certificate Expiring</h4>
                                <p class="text-sm text-yellow-700 mt-1">Your certificate for "Advanced JavaScript" will expire in 30 days. Consider renewing it.</p>
                                <p class="text-xs text-yellow-600 mt-2">3 days ago</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <button onclick="markAllAsRead()" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                            Mark All as Read
                        </button>
                        <button onclick="closeNotificationsModal()" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700">
                            Close
                        </button>
                    </div>
                </div>
            </div>

            <!-- Add User Modal -->
            <div id="add-user-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl p-6 max-w-2xl w-full max-h-screen overflow-y-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-900">Add New User</h3>
                        <button onclick="closeAddUserModal()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <form id="add-user-form" onsubmit="submitAddUser(event)">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" id="new-user-name" required
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="Enter full name">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                <input type="email" id="new-user-email" required
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="Enter email address">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <input type="password" id="new-user-password" required
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="Enter password">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                                <select id="new-user-role" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select Role</option>
                                    <option value="student">Student</option>
                                    <option value="instructor">Instructor</option>
                                    <option value="client">Client</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" id="new-user-phone"
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="Enter phone number">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select id="new-user-status"
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                            <textarea id="new-user-bio" rows="3"
                                      class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                      placeholder="Enter user bio (optional)"></textarea>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeAddUserModal()"
                                    class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:from-green-600 hover:to-green-700">
                                <i class="fas fa-user-plus mr-2"></i>Add User
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Reports Modal -->
            <div id="reports-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl p-6 max-w-4xl w-full max-h-screen overflow-y-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-900">System Reports</h3>
                        <button onclick="closeReportsModal()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <!-- Users Report Card -->
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-lg font-semibold">Total Users</h4>
                                    <p id="total-users-count" class="text-3xl font-bold">-</p>
                                </div>
                                <i class="fas fa-users text-4xl opacity-80"></i>
                            </div>
                        </div>

                        <!-- Courses Report Card -->
                        <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-lg font-semibold">Total Courses</h4>
                                    <p id="total-courses-count" class="text-3xl font-bold">-</p>
                                </div>
                                <i class="fas fa-graduation-cap text-4xl opacity-80"></i>
                            </div>
                        </div>

                        <!-- Subscriptions Report Card -->
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-lg font-semibold">Active Subscriptions</h4>
                                    <p id="total-subscriptions-count" class="text-3xl font-bold">-</p>
                                </div>
                                <i class="fas fa-credit-card text-4xl opacity-80"></i>
                            </div>
                        </div>

                        <!-- Certificates Report Card -->
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-6 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-lg font-semibold">Certificates Issued</h4>
                                    <p id="total-certificates-count" class="text-3xl font-bold">-</p>
                                </div>
                                <i class="fas fa-certificate text-4xl opacity-80"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="mb-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Recent Activity</h4>
                        <div id="recent-activity" class="bg-gray-50 rounded-lg p-4 max-h-64 overflow-y-auto">
                            <div class="space-y-2">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-user-plus text-green-500 mr-2"></i>
                                    <span>New user registration: Alice Developer</span>
                                    <span class="ml-auto">2 hours ago</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-certificate text-blue-500 mr-2"></i>
                                    <span>Certificate issued to Jane Student</span>
                                    <span class="ml-auto">5 hours ago</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-graduation-cap text-purple-500 mr-2"></i>
                                    <span>Course completed: Complete Web Development Bootcamp</span>
                                    <span class="ml-auto">1 day ago</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button onclick="exportReport()" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-download mr-2"></i>Export Report
                        </button>
                        <button onclick="closeReportsModal()" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700">
                            Close
                        </button>
                    </div>
                </div>
            </div>

            <div id="certificates-section" class="content-section hidden">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">My Certificates</h3>
                        <button onclick="refreshCertificates()" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors">
                            <i class="fas fa-sync-alt mr-2"></i>Refresh
                        </button>
                    </div>

                    <!-- Certificates Loading State -->
                    <div id="certificates-loading" class="text-center py-12">
                        <i class="fas fa-spinner fa-spin text-4xl text-blue-500 mb-4"></i>
                        <p class="text-gray-600">Loading your certificates...</p>
                    </div>

                    <!-- No Certificates State -->
                    <div id="no-certificates" class="text-center py-12 hidden">
                        <i class="fas fa-certificate text-4xl text-yellow-500 mb-4"></i>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">No Certificates Yet</h4>
                        <p class="text-gray-600 mb-4">Complete courses to earn certificates</p>
                        <button onclick="showSection('courses')" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors">
                            <i class="fas fa-graduation-cap mr-2"></i>Browse Courses
                        </button>
                    </div>

                    <!-- Certificates Grid -->
                    <div id="certificates-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 hidden">
                        <!-- Certificates will be loaded here -->
                    </div>

                    <!-- Generate Certificate Modal -->
                    <div id="generate-certificate-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
                        <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold">Generate Certificate</h3>
                                <button onclick="closeGenerateCertificateModal()" class="text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div id="generate-certificate-content">
                                <!-- Content will be loaded here -->
                            </div>
                        </div>
                    </div>

                    <!-- Certificate Preview Modal -->
                    <div id="certificate-preview-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
                        <div class="bg-white rounded-xl p-6 max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold">Certificate Preview</h3>
                                <button onclick="closeCertificatePreviewModal()" class="text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div id="certificate-preview-content">
                                <!-- Certificate preview will be loaded here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Learning Section -->
            <div id="course-learning-section" class="content-section hidden">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 id="learning-course-title" class="text-lg font-semibold text-gray-900">Course Learning</h3>
                            <p id="learning-course-subtitle" class="text-sm text-gray-600">Interactive learning experience</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button onclick="toggleTutorBot()" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors">
                                <i class="fas fa-robot mr-2"></i>Tutor Bot
                            </button>
                            <button onclick="showSection('courses')" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>Back to Courses
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                        <!-- Lesson Navigation -->
                        <div class="lg:col-span-1">
                            <div class="bg-white/50 rounded-xl p-4 mb-4">
                                <h4 class="font-semibold text-gray-900 mb-3">
                                    <i class="fas fa-list mr-2"></i>Course Content
                                </h4>
                                <div id="lesson-list" class="space-y-2">
                                    <!-- Lessons will be loaded here -->
                                </div>
                            </div>

                            <!-- Progress Card -->
                            <div class="bg-white/50 rounded-xl p-4">
                                <h4 class="font-semibold text-gray-900 mb-3">
                                    <i class="fas fa-chart-line mr-2"></i>Your Progress
                                </h4>
                                <div class="space-y-3">
                                    <div>
                                        <div class="flex justify-between text-sm mb-1">
                                            <span>Course Progress</span>
                                            <span id="progress-percentage">0%</span>
                                        </div>
                                        <div class="bg-gray-200 rounded-full h-2">
                                            <div id="progress-bar" class="bg-green-500 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        <p><span id="completed-lessons">0</span> of <span id="total-lessons">0</span> lessons completed</p>
                                        <p>Estimated time remaining: <span id="time-remaining">-- hours</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Main Learning Content -->
                        <div class="lg:col-span-3">
                            <div class="bg-white/50 rounded-xl p-6 min-h-[500px]">
                                <div id="lesson-content" class="text-gray-900">
                                    <!-- Lesson content will be loaded here -->
                                    <div class="text-center py-12">
                                        <i class="fas fa-spinner fa-spin text-4xl text-blue-500 mb-4"></i>
                                        <p class="text-gray-600">Loading lesson content...</p>
                                    </div>
                                </div>

                                <!-- Lesson Navigation -->
                                <div class="flex justify-between items-center mt-6 pt-4 border-t border-gray-200">
                                    <button id="prev-lesson" onclick="previousLesson()" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                        <i class="fas fa-arrow-left mr-2"></i>Previous
                                    </button>

                                    <div class="flex items-center space-x-3">
                                        <button onclick="markAsCompleted()" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors">
                                            <i class="fas fa-check mr-2"></i>Mark Complete
                                        </button>
                                        <button onclick="toggleBookmark()" class="px-3 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors">
                                            <i class="fas fa-bookmark"></i>
                                        </button>
                                    </div>

                                    <button id="next-lesson" onclick="nextLesson()" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors">
                                        Next<i class="fas fa-arrow-right ml-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tutor Bot Chat (hidden by default) -->
            <div id="tutor-bot" class="fixed bottom-4 right-4 w-80 bg-white rounded-xl shadow-xl z-50 hidden">
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white p-4 rounded-t-xl">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas fa-robot mr-2"></i>
                            <span class="font-bold">Tutor Bot</span>
                            <span class="ml-2 text-xs bg-green-500 px-2 py-1 rounded-full">Online</span>
                        </div>
                        <button onclick="toggleTutorBot()" class="text-white/80 hover:text-white">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="p-4 h-64 overflow-y-auto">
                    <div id="chat-messages" class="space-y-3">
                        <div class="flex items-start space-x-2">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm">
                                <i class="fas fa-robot"></i>
                            </div>
                            <div class="bg-gray-100 rounded-lg p-3 max-w-xs">
                                <p class="text-sm">Hi! I'm your tutor bot. How can I help you with this lesson?</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-4 border-t">
                    <div class="flex space-x-2">
                        <input type="text" id="chat-input" placeholder="Ask me anything..." class="flex-1 p-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button onclick="sendMessage()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Check if user is logged in
        const token = localStorage.getItem('token');
        const user = JSON.parse(localStorage.getItem('user') || '{}');

        if (!token || !user.id) {
            window.location.href = '/login';
        }

        // Display user info
        document.getElementById('user-name').textContent = user.name;
        document.getElementById('user-role').textContent = user.role.charAt(0).toUpperCase() + user.role.slice(1);

        // Set user avatar initials
        const initials = user.name.split(' ').map(n => n[0]).join('').toUpperCase();
        document.getElementById('user-avatar').textContent = initials;

        // Show role-specific dashboard and hide others
        if (user.role === 'admin') {
            document.getElementById('admin-dashboard').classList.remove('admin-only');
            document.getElementById('student-dashboard').style.display = 'none';
            document.getElementById('instructor-dashboard').style.display = 'none';
        } else if (user.role === 'student') {
            document.getElementById('admin-dashboard').style.display = 'none';
            document.getElementById('student-dashboard').classList.remove('hidden');
            document.getElementById('instructor-dashboard').style.display = 'none';
            // Hide admin-only menu items
            document.querySelectorAll('.admin-only').forEach(item => {
                item.style.display = 'none';
            });
        } else if (user.role === 'instructor') {
            document.getElementById('admin-dashboard').style.display = 'none';
            document.getElementById('student-dashboard').style.display = 'none';
            document.getElementById('instructor-dashboard').classList.remove('hidden');
            // Hide admin-only menu items
            document.querySelectorAll('.admin-only').forEach(item => {
                item.style.display = 'none';
            });
        }

        // Navigation functionality
        let currentSection = 'dashboard';

        function showSection(sectionName) {
            // Hide all content sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
            });

            // Show selected section
            document.getElementById(sectionName + '-section').classList.remove('hidden');

            // Update navigation active state
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('bg-slate-700', 'text-white');
                item.classList.add('text-gray-300');
            });

            event.target.closest('.nav-item').classList.add('bg-slate-700', 'text-white');
            event.target.closest('.nav-item').classList.remove('text-gray-300');

            // Update page title
            const titles = {
                'dashboard': 'Dashboard',
                'courses': 'Courses',
                'analytics': 'Analytics & Reports',
                'users': 'User Management',
                'support-requests': 'Support Requests',
                'marketplace': 'Marketplace',
                'labs': 'Code Labs',
                'certificates': 'Certificates',
                'course-learning': 'Course Learning'
            };

            const subtitles = {
                'dashboard': 'Welcome back! Here\'s what\'s happening today.',
                'courses': 'Manage and browse available courses',
                'analytics': 'View detailed analytics and reports',
                'users': 'Manage platform users and permissions',
                'support-requests': 'Manage client support requests and coding project inquiries',
                'marketplace': 'Browse and manage marketplace projects',
                'labs': 'Access browser-based development environments',
                'certificates': 'View and manage course certificates',
                'course-learning': 'Interactive learning experience with lessons and exercises'
            };

            document.getElementById('page-title').textContent = titles[sectionName] || 'Dashboard';
            document.getElementById('page-subtitle').textContent = subtitles[sectionName] || '';

            currentSection = sectionName;

            // Load section-specific data
            if (sectionName === 'courses') {
                loadCourses();
            } else if (sectionName === 'analytics') {
                loadAnalytics();
            } else if (sectionName === 'users') {
                loadUsers();
            } else if (sectionName === 'support-requests') {
                loadSupportRequests();
            } else if (sectionName === 'certificates') {
                loadCertificates();
            } else if (sectionName === 'marketplace') {
                loadProjects();
            } else if (sectionName === 'labs') {
                loadCodeLabs();
            }
        }

        // Analytics Variables
        let userGrowthChart = null;
        let courseCategoriesChart = null;
        let revenueChart = null;

        // Load analytics data
        async function loadAnalytics() {
            await Promise.all([
                loadOverviewStats(),
                loadUserGrowthChart(),
                loadCourseCategoriesChart(),
                loadRevenueChart(),
                loadPopularCourses(),
                loadRecentUsers()
            ]);
        }

        // Load overview statistics
        async function loadOverviewStats() {
            try {
                // Simulate API calls - in real implementation, these would be actual endpoints
                const stats = {
                    totalUsers: 1247,
                    usersGrowth: 12.5,
                    totalCourses: 5,
                    activeCourses: 5,
                    totalRevenue: 24850.00,
                    revenueGrowth: 18.3,
                    totalEnrollments: 342,
                    monthlyEnrollments: 89
                };

                document.getElementById('total-users').textContent = stats.totalUsers.toLocaleString();
                document.getElementById('users-growth').textContent = stats.usersGrowth;
                document.getElementById('total-courses').textContent = stats.totalCourses;
                document.getElementById('active-courses').textContent = stats.activeCourses;
                document.getElementById('total-revenue').textContent = `$${stats.totalRevenue.toLocaleString()}`;
                document.getElementById('revenue-growth').textContent = stats.revenueGrowth;
                document.getElementById('total-enrollments').textContent = stats.totalEnrollments.toLocaleString();
                document.getElementById('monthly-enrollments').textContent = stats.monthlyEnrollments;

            } catch (error) {
                console.error('Error loading overview stats:', error);
            }
        }

        // Load user growth chart
        async function loadUserGrowthChart() {
            const ctx = document.getElementById('user-growth-chart').getContext('2d');

            if (userGrowthChart) {
                userGrowthChart.destroy();
            }

            const data = {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'New Users',
                    data: [45, 67, 89, 123],
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            };

            userGrowthChart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }

        // Load course categories chart
        async function loadCourseCategoriesChart() {
            const ctx = document.getElementById('course-categories-chart').getContext('2d');

            if (courseCategoriesChart) {
                courseCategoriesChart.destroy();
            }

            const data = {
                labels: ['Web Development', 'Data Analysis', 'AI & ML'],
                datasets: [{
                    data: [3, 1, 1],
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(168, 85, 247, 0.8)'
                    ],
                    borderColor: [
                        'rgb(59, 130, 246)',
                        'rgb(16, 185, 129)',
                        'rgb(168, 85, 247)'
                    ],
                    borderWidth: 2
                }]
            };

            courseCategoriesChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                usePointStyle: true
                            }
                        }
                    }
                }
            });
        }

        // Load revenue chart
        async function loadRevenueChart() {
            const ctx = document.getElementById('revenue-chart').getContext('2d');

            if (revenueChart) {
                revenueChart.destroy();
            }

            const data = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Revenue',
                    data: [4200, 5100, 6300, 7800, 8900, 9600],
                    backgroundColor: 'rgba(168, 85, 247, 0.1)',
                    borderColor: 'rgb(168, 85, 247)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            };

            revenueChart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value.toLocaleString();
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }

        // Load popular courses
        async function loadPopularCourses() {
            try {
                const courses = [
                    { title: 'Complete Web Development Bootcamp', enrollments: 156 },
                    { title: 'Python Data Analysis Fundamentals', enrollments: 89 },
                    { title: 'Machine Learning with Python', enrollments: 67 },
                    { title: 'Advanced Full-Stack Development', enrollments: 45 },
                    { title: 'Deep Learning and Neural Networks', enrollments: 23 }
                ];

                const html = courses.map((course, index) => `
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center text-white text-sm font-bold mr-3">
                                ${index + 1}
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900 truncate">${course.title}</p>
                                <p class="text-xs text-gray-500">${course.enrollments} enrollments</p>
                            </div>
                        </div>
                    </div>
                `).join('');

                document.getElementById('popular-courses-list').innerHTML = html;

            } catch (error) {
                console.error('Error loading popular courses:', error);
            }
        }

        // Load recent users
        async function loadRecentUsers() {
            try {
                const users = [
                    { name: 'Alice Johnson', role: 'Student', joinedAt: '2 hours ago' },
                    { name: 'Bob Wilson', role: 'Student', joinedAt: '5 hours ago' },
                    { name: 'Carol Davis', role: 'Instructor', joinedAt: '1 day ago' },
                    { name: 'David Brown', role: 'Student', joinedAt: '2 days ago' },
                    { name: 'Eva Martinez', role: 'Client', joinedAt: '3 days ago' }
                ];

                const html = users.map(user => {
                    const initials = user.name.split(' ').map(n => n[0]).join('');
                    const roleColor = {
                        'Student': 'bg-blue-500',
                        'Instructor': 'bg-green-500',
                        'Client': 'bg-purple-500',
                        'Admin': 'bg-red-500'
                    }[user.role] || 'bg-gray-500';

                    return `
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 ${roleColor} rounded-full flex items-center justify-center text-white text-sm font-bold">
                                ${initials}
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">${user.name}</p>
                                <p class="text-xs text-gray-500">${user.role} • ${user.joinedAt}</p>
                            </div>
                        </div>
                    `;
                }).join('');

                document.getElementById('recent-users-list').innerHTML = html;

            } catch (error) {
                console.error('Error loading recent users:', error);
            }
        }

        // Update chart functions
        function updateUserGrowthChart() {
            loadUserGrowthChart();
        }

        function updateRevenueChart() {
            loadRevenueChart();
        }

        // Marketplace/Projects Variables
        let allProjects = [];
        let currentProjectId = null;

        // Load projects data
        async function loadProjects() {
            try {
                // Simulate API call - in real implementation, this would be an actual endpoint
                const projects = [
                    {
                        id: 1,
                        title: 'E-commerce Website Development',
                        type: 'web_development',
                        description: 'Build a modern e-commerce platform with React and Laravel backend. Need shopping cart, payment integration, and admin panel.',
                        budget: '2500-5000',
                        timeline: '1-2 months',
                        priority: 'high',
                        status: 'pending',
                        requirements: 'React, Laravel, PayPal/Stripe integration, responsive design',
                        notes: 'Previous experience with e-commerce projects preferred',
                        client_name: 'John Smith',
                        client_email: 'john@example.com',
                        created_at: '2024-03-20T10:30:00Z',
                        updated_at: '2024-03-20T10:30:00Z'
                    },
                    {
                        id: 2,
                        title: 'Data Analysis Dashboard',
                        type: 'data_analysis',
                        description: 'Create an interactive dashboard for sales data visualization using Python and modern charting libraries.',
                        budget: '1000-2500',
                        timeline: '3-4 weeks',
                        priority: 'medium',
                        status: 'in_progress',
                        requirements: 'Python, Pandas, Plotly/D3.js, PostgreSQL',
                        notes: 'Data is already cleaned and available in CSV format',
                        client_name: 'Sarah Johnson',
                        client_email: 'sarah@company.com',
                        created_at: '2024-03-15T14:15:00Z',
                        updated_at: '2024-03-22T09:45:00Z'
                    },
                    {
                        id: 3,
                        title: 'API Integration for Mobile App',
                        type: 'api_integration',
                        description: 'Integrate third-party APIs (payment, notifications, maps) into existing mobile application.',
                        budget: '500-1000',
                        timeline: '1-2 weeks',
                        priority: 'urgent',
                        status: 'completed',
                        requirements: 'REST APIs, JSON, mobile app integration experience',
                        notes: 'Mobile app is built with React Native',
                        client_name: 'Tech Startup Inc.',
                        client_email: 'dev@techstartup.com',
                        created_at: '2024-03-01T11:20:00Z',
                        updated_at: '2024-03-18T16:30:00Z'
                    },
                    {
                        id: 4,
                        title: 'Database Optimization Consultation',
                        type: 'consultation',
                        description: 'Review current database structure and provide optimization recommendations for better performance.',
                        budget: '500-1000',
                        timeline: '1-2 weeks',
                        priority: 'low',
                        status: 'pending',
                        requirements: 'MySQL/PostgreSQL expertise, performance optimization',
                        notes: 'Database has ~1M records, performance issues during peak hours',
                        client_name: 'Bob Wilson',
                        client_email: 'bob@example.org',
                        created_at: '2024-03-25T08:45:00Z',
                        updated_at: '2024-03-25T08:45:00Z'
                    },
                    {
                        id: 5,
                        title: 'Legacy System Migration',
                        type: 'web_development',
                        description: 'Migrate legacy PHP application to modern Laravel framework with improved security and performance.',
                        budget: '5000+',
                        timeline: '3+ months',
                        priority: 'medium',
                        status: 'cancelled',
                        requirements: 'Laravel, PHP 8+, MySQL, legacy system experience',
                        notes: 'Client decided to postpone this project',
                        client_name: 'Enterprise Corp',
                        client_email: 'it@enterprise.com',
                        created_at: '2024-02-28T13:10:00Z',
                        updated_at: '2024-03-10T12:00:00Z'
                    }
                ];

                allProjects = projects;
                displayProjects(allProjects);

            } catch (error) {
                console.error('Error loading projects:', error);
                document.getElementById('projects-grid').innerHTML = `
                    <div class="text-center text-red-500 col-span-full py-8">
                        <i class="fas fa-exclamation-triangle text-2xl mb-3"></i>
                        <p>Error loading projects</p>
                    </div>
                `;
            }
        }

        function displayProjects(projects) {
            const projectsGrid = document.getElementById('projects-grid');

            if (!projects || projects.length === 0) {
                projectsGrid.innerHTML = `
                    <div class="text-center text-gray-500 col-span-full py-12">
                        <i class="fas fa-briefcase text-4xl mb-4"></i>
                        <p>No projects found</p>
                        <button onclick="openProjectModal()" class="mt-4 bg-gradient-to-r from-purple-500 to-purple-600 text-white px-6 py-2 rounded-lg hover:from-purple-600 hover:to-purple-700 transition-all">
                            <i class="fas fa-plus mr-2"></i>Request Your First Project
                        </button>
                    </div>
                `;
                return;
            }

            const projectsHTML = projects.map(project => {
                const statusColors = {
                    'pending': 'bg-yellow-100 text-yellow-800',
                    'in_progress': 'bg-blue-100 text-blue-800',
                    'completed': 'bg-green-100 text-green-800',
                    'cancelled': 'bg-red-100 text-red-800'
                };

                const priorityColors = {
                    'low': 'text-gray-600',
                    'medium': 'text-blue-600',
                    'high': 'text-orange-600',
                    'urgent': 'text-red-600'
                };

                const typeIcons = {
                    'web_development': 'fas fa-code',
                    'data_analysis': 'fas fa-chart-bar',
                    'api_integration': 'fas fa-plug',
                    'consultation': 'fas fa-comments'
                };

                const createdDate = new Date(project.created_at).toLocaleDateString();

                return `
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-200 cursor-pointer"
                         onclick="viewProjectDetails(${project.id})">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                                    <i class="${typeIcons[project.type]} text-white text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-900 mb-1">${project.title}</h4>
                                    <p class="text-sm text-gray-600 capitalize">${project.type.replace('_', ' ')}</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${statusColors[project.status]} capitalize">
                                ${project.status.replace('_', ' ')}
                            </span>
                        </div>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">${project.description}</p>

                        <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                            <div>
                                <span class="text-gray-500">Budget:</span>
                                <span class="font-medium text-gray-900 ml-1">$${project.budget}</span>
                            </div>
                            <div>
                                <span class="text-gray-500">Timeline:</span>
                                <span class="font-medium text-gray-900 ml-1">${project.timeline}</span>
                            </div>
                            <div>
                                <span class="text-gray-500">Priority:</span>
                                <span class="font-medium ${priorityColors[project.priority]} ml-1 capitalize">${project.priority}</span>
                            </div>
                            <div>
                                <span class="text-gray-500">Created:</span>
                                <span class="font-medium text-gray-900 ml-1">${createdDate}</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-user mr-1"></i>
                                ${project.client_name}
                            </div>
                            <div class="flex space-x-2">
                                <button onclick="event.stopPropagation(); editProject(${project.id})" class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="event.stopPropagation(); deleteProject(${project.id})" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');

            projectsGrid.innerHTML = projectsHTML;
            document.getElementById('projects-count').textContent = projects.length;
        }

        function filterProjects() {
            const statusFilter = document.getElementById('project-status-filter').value;
            const typeFilter = document.getElementById('project-type-filter').value;

            let filteredProjects = allProjects;

            if (statusFilter) {
                filteredProjects = filteredProjects.filter(project => project.status === statusFilter);
            }

            if (typeFilter) {
                filteredProjects = filteredProjects.filter(project => project.type === typeFilter);
            }

            displayProjects(filteredProjects);
        }

        function searchProjects() {
            const searchTerm = document.getElementById('project-search').value.toLowerCase();

            if (!searchTerm) {
                displayProjects(allProjects);
                return;
            }

            const filteredProjects = allProjects.filter(project =>
                project.title.toLowerCase().includes(searchTerm) ||
                project.description.toLowerCase().includes(searchTerm) ||
                project.client_name.toLowerCase().includes(searchTerm) ||
                project.type.toLowerCase().includes(searchTerm)
            );

            displayProjects(filteredProjects);
        }

        function openProjectModal(projectId = null) {
            const modal = document.getElementById('project-modal');
            const form = document.getElementById('project-form');
            const modalTitle = document.getElementById('project-modal-title');

            // Reset form
            form.reset();
            document.getElementById('project-id').value = '';

            if (projectId) {
                // Edit mode
                modalTitle.textContent = 'Edit Project Request';
                const project = allProjects.find(p => p.id === projectId);
                if (project) {
                    document.getElementById('project-id').value = project.id;
                    document.getElementById('project-title').value = project.title;
                    document.getElementById('project-type').value = project.type;
                    document.getElementById('project-budget').value = project.budget;
                    document.getElementById('project-timeline').value = project.timeline;
                    document.getElementById('project-priority').value = project.priority;
                    document.getElementById('project-description').value = project.description;
                    document.getElementById('project-requirements').value = project.requirements || '';
                    document.getElementById('project-notes').value = project.notes || '';
                }
            } else {
                // Add mode
                modalTitle.textContent = 'Request Development Project';
            }

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeProjectModal() {
            document.getElementById('project-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        async function saveProject(event) {
            event.preventDefault();

            const projectId = document.getElementById('project-id').value;
            const projectData = {
                title: document.getElementById('project-title').value,
                type: document.getElementById('project-type').value,
                budget: document.getElementById('project-budget').value,
                timeline: document.getElementById('project-timeline').value,
                priority: document.getElementById('project-priority').value,
                description: document.getElementById('project-description').value,
                requirements: document.getElementById('project-requirements').value,
                notes: document.getElementById('project-notes').value,
                client_name: user.name,
                client_email: user.email
            };

            try {
                const isNewProject = !projectId;

                if (isNewProject) {
                    // Add new project
                    const newProject = {
                        id: allProjects.length + 1,
                        ...projectData,
                        status: 'pending',
                        created_at: new Date().toISOString(),
                        updated_at: new Date().toISOString()
                    };
                    allProjects.push(newProject);
                    showNotification('Project request submitted successfully!', 'success');
                } else {
                    // Update existing project
                    const projectIndex = allProjects.findIndex(p => p.id == projectId);
                    if (projectIndex !== -1) {
                        allProjects[projectIndex] = {
                            ...allProjects[projectIndex],
                            ...projectData,
                            updated_at: new Date().toISOString()
                        };
                        showNotification('Project updated successfully!', 'success');
                    }
                }

                closeProjectModal();
                displayProjects(allProjects);

            } catch (error) {
                console.error('Error saving project:', error);
                showNotification('Error saving project', 'error');
            }
        }

        function editProject(projectId) {
            openProjectModal(projectId);
        }

        function deleteProject(projectId) {
            if (confirm('Are you sure you want to delete this project request?')) {
                allProjects = allProjects.filter(p => p.id !== projectId);
                displayProjects(allProjects);
                showNotification('Project deleted successfully!', 'success');
            }
        }

        function viewProjectDetails(projectId) {
            const project = allProjects.find(p => p.id === projectId);
            if (!project) return;

            currentProjectId = projectId;

            const statusColors = {
                'pending': 'bg-yellow-100 text-yellow-800',
                'in_progress': 'bg-blue-100 text-blue-800',
                'completed': 'bg-green-100 text-green-800',
                'cancelled': 'bg-red-100 text-red-800'
            };

            const content = `
                <div class="space-y-6">
                    <div class="flex items-start justify-between">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900 mb-2">${project.title}</h4>
                            <p class="text-gray-600 capitalize">${project.type.replace('_', ' ')} Project</p>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium ${statusColors[project.status]} capitalize">
                            ${project.status.replace('_', ' ')}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h5 class="font-semibold text-gray-900 mb-2">Project Details</h5>
                            <div class="space-y-2 text-sm">
                                <div><span class="text-gray-500">Budget:</span> <span class="font-medium">$${project.budget}</span></div>
                                <div><span class="text-gray-500">Timeline:</span> <span class="font-medium">${project.timeline}</span></div>
                                <div><span class="text-gray-500">Priority:</span> <span class="font-medium capitalize">${project.priority}</span></div>
                                <div><span class="text-gray-500">Created:</span> <span class="font-medium">${new Date(project.created_at).toLocaleDateString()}</span></div>
                            </div>
                        </div>

                        <div>
                            <h5 class="font-semibold text-gray-900 mb-2">Client Information</h5>
                            <div class="space-y-2 text-sm">
                                <div><span class="text-gray-500">Name:</span> <span class="font-medium">${project.client_name}</span></div>
                                <div><span class="text-gray-500">Email:</span> <span class="font-medium">${project.client_email}</span></div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h5 class="font-semibold text-gray-900 mb-2">Description</h5>
                        <p class="text-gray-600 text-sm leading-relaxed">${project.description}</p>
                    </div>

                    ${project.requirements ? `
                        <div>
                            <h5 class="font-semibold text-gray-900 mb-2">Technical Requirements</h5>
                            <p class="text-gray-600 text-sm leading-relaxed">${project.requirements}</p>
                        </div>
                    ` : ''}

                    ${project.notes ? `
                        <div>
                            <h5 class="font-semibold text-gray-900 mb-2">Additional Notes</h5>
                            <p class="text-gray-600 text-sm leading-relaxed">${project.notes}</p>
                        </div>
                    ` : ''}
                </div>
            `;

            document.getElementById('project-details-content').innerHTML = content;
            document.getElementById('project-details-title').textContent = 'Project Details';
            document.getElementById('project-details-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeProjectDetailsModal() {
            document.getElementById('project-details-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            currentProjectId = null;
        }

        function editProjectFromDetails() {
            closeProjectDetailsModal();
            if (currentProjectId) {
                openProjectModal(currentProjectId);
            }
        }

        // User Management Functions
        let allUsers = [];
        let userToDelete = null;
        let selectedStudent = null;

        // Load users data
        async function loadUsers() {
            try {
                const response = await fetch('/api/users', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });

                if (response.ok) {
                    const result = await response.json();
                    allUsers = result.data || [];
                    renderUsers(allUsers);
                } else {
                    showNotification('Failed to load users', 'error');
                }
            } catch (error) {
                console.error('Error loading users:', error);
                showNotification('Error loading users', 'error');
            }
        }

        function renderUsers(users) {
            const usersList = document.getElementById('users-list');
            const usersHTML = users.map(user => `
                <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
                                ${user.name.charAt(0).toUpperCase()}
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">${user.name}</h4>
                                <p class="text-sm text-gray-600">${user.email}</p>
                                <span class="inline-block px-2 py-1 text-xs rounded-full ${getRoleColor(user.role)} mt-1">
                                    ${user.role.charAt(0).toUpperCase() + user.role.slice(1)}
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            ${user.role === 'student' ? `
                                <button onclick="viewStudentProgress(${user.id})"
                                        class="px-3 py-1 text-xs bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors">
                                    <i class="fas fa-chart-line mr-1"></i>Progress
                                </button>
                                <button onclick="generateCertificateForStudent(${user.id})"
                                        class="px-3 py-1 text-xs bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors">
                                    <i class="fas fa-certificate mr-1"></i>Certificate
                                </button>
                            ` : ''}
                            <button onclick="editUser(${user.id})"
                                    class="px-3 py-1 text-xs bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition-colors">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="deleteUser(${user.id})"
                                    class="px-3 py-1 text-xs bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>

                    ${user.role === 'student' ? `
                        <div class="mt-3 pt-3 border-t border-gray-100">
                            <div class="grid grid-cols-3 gap-4 text-center">
                                <div>
                                    <p class="text-xs text-gray-500">Courses</p>
                                    <p class="font-semibold text-blue-600" id="user-${user.id}-courses">-</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Certificates</p>
                                    <p class="font-semibold text-green-600" id="user-${user.id}-certificates">-</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Progress</p>
                                    <p class="font-semibold text-purple-600" id="user-${user.id}-progress">-</p>
                                </div>
                            </div>
                        </div>
                    ` : ''}
                </div>
            `).join('');

            usersList.innerHTML = usersHTML;
            document.getElementById('users-count').textContent = users.length;

            // Load additional stats for students
            users.filter(user => user.role === 'student').forEach(student => {
                loadStudentStats(student.id);
            });
        }

        function getRoleColor(role) {
            const colors = {
                'admin': 'bg-red-100 text-red-800',
                'instructor': 'bg-blue-100 text-blue-800',
                'student': 'bg-green-100 text-green-800',
                'client': 'bg-purple-100 text-purple-800'
            };
            return colors[role] || 'bg-gray-100 text-gray-800';
        }

        async function loadStudentStats(studentId) {
            try {
                // Load subscriptions count
                const subscriptionsResponse = await fetch(`/api/students/${studentId}/subscriptions`, {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });

                // Load certificates count
                const certificatesResponse = await fetch(`/api/students/${studentId}/certificates`, {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });

                if (subscriptionsResponse.ok) {
                    const subscriptionsData = await subscriptionsResponse.json();
                    document.getElementById(`user-${studentId}-courses`).textContent = subscriptionsData.data?.length || 0;
                }

                if (certificatesResponse.ok) {
                    const certificatesData = await certificatesResponse.json();
                    document.getElementById(`user-${studentId}-certificates`).textContent = certificatesData.data?.length || 0;

                    // Calculate average progress
                    const avgProgress = certificatesData.data?.length > 0
                        ? Math.round(certificatesData.data.reduce((sum, cert) => sum + cert.completion_percentage, 0) / certificatesData.data.length)
                        : 0;
                    document.getElementById(`user-${studentId}-progress`).textContent = avgProgress + '%';
                }
            } catch (error) {
                console.error('Error loading student stats:', error);
            }
        }

        function filterUsers() {
            const roleFilter = document.getElementById('role-filter').value;
            const statusFilter = document.getElementById('status-filter').value;

            let filteredUsers = allUsers;

            if (roleFilter) {
                filteredUsers = filteredUsers.filter(user => user.role === roleFilter);
            }

            if (statusFilter) {
                const isActive = statusFilter === 'active';
                filteredUsers = filteredUsers.filter(user => user.is_active === isActive);
            }

            renderUsers(filteredUsers);
        }

        function searchUsers() {
            const searchTerm = document.getElementById('user-search').value.toLowerCase();

            if (!searchTerm) {
                renderUsers(allUsers);
                return;
            }

            const filteredUsers = allUsers.filter(user =>
                user.name.toLowerCase().includes(searchTerm) ||
                user.email.toLowerCase().includes(searchTerm) ||
                user.role.toLowerCase().includes(searchTerm)
            );

            renderUsers(filteredUsers);
        }

        function openUserModal(userId = null) {
            const modal = document.getElementById('user-modal');
            const form = document.getElementById('user-form');
            const modalTitle = document.getElementById('user-modal-title');
            const passwordSection = document.getElementById('password-section');

            // Reset form
            form.reset();
            document.getElementById('user-id').value = '';

            if (userId) {
                // Edit mode
                modalTitle.textContent = 'Edit User';
                const user = allUsers.find(u => u.id === userId);
                if (user) {
                    document.getElementById('user-id').value = user.id;
                    document.getElementById('user-name').value = user.name;
                    document.getElementById('user-email').value = user.email;
                    document.getElementById('user-role').value = user.role;
                    document.getElementById('user-phone').value = user.phone || '';
                    document.getElementById('user-bio').value = user.bio || '';
                    document.getElementById('user-active').checked = user.is_active;

                    // Hide password field in edit mode
                    passwordSection.style.display = 'none';
                    document.getElementById('user-password').required = false;
                }
            } else {
                // Add mode
                modalTitle.textContent = 'Add New User';
                document.getElementById('user-active').checked = true;
                passwordSection.style.display = 'block';
                document.getElementById('user-password').required = true;
            }

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeUserModal() {
            document.getElementById('user-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        async function saveUser(event) {
            event.preventDefault();

            const userId = document.getElementById('user-id').value;
            const userData = {
                name: document.getElementById('user-name').value,
                email: document.getElementById('user-email').value,
                role: document.getElementById('user-role').value,
                phone: document.getElementById('user-phone').value,
                bio: document.getElementById('user-bio').value,
                is_active: document.getElementById('user-active').checked
            };

            if (!userId) {
                userData.password = document.getElementById('user-password').value;
            }

            try {
                // Simulate API call
                const isNewUser = !userId;

                if (isNewUser) {
                    // Add new user
                    const newUser = {
                        id: allUsers.length + 1,
                        ...userData,
                        created_at: new Date().toISOString()
                    };
                    allUsers.push(newUser);
                    showNotification('User created successfully!', 'success');
                } else {
                    // Update existing user
                    const userIndex = allUsers.findIndex(u => u.id == userId);
                    if (userIndex !== -1) {
                        allUsers[userIndex] = { ...allUsers[userIndex], ...userData };
                        showNotification('User updated successfully!', 'success');
                    }
                }

                closeUserModal();
                renderUsers(allUsers);

            } catch (error) {
                console.error('Error saving user:', error);
                showNotification('Error saving user', 'error');
            }
        }

        function editUser(userId) {
            openUserModal(userId);
        }

        function deleteUser(userId) {
            userToDelete = userId;
            document.getElementById('delete-user-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteUserModal() {
            document.getElementById('delete-user-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            userToDelete = null;
        }

        async function confirmDeleteUser() {
            if (!userToDelete) return;

            try {
                // Simulate API call
                allUsers = allUsers.filter(u => u.id !== userToDelete);

                closeDeleteUserModal();
                renderUsers(allUsers);
                showNotification('User deleted successfully!', 'success');

            } catch (error) {
                console.error('Error deleting user:', error);
                showNotification('Error deleting user', 'error');
            }
        }

        // Student Progress Management
        async function viewStudentProgress(studentId) {
            try {
                selectedStudent = allUsers.find(user => user.id === studentId);
                if (!selectedStudent) return;

                const modal = document.getElementById('student-progress-modal');
                const content = document.getElementById('student-progress-content');

                content.innerHTML = '<div class="text-center py-8"><i class="fas fa-spinner fa-spin text-2xl text-blue-500"></i><p class="mt-2">Loading progress data...</p></div>';
                modal.classList.remove('hidden');

                // Load student data
                const [subscriptionsResponse, certificatesResponse] = await Promise.all([
                    fetch(`/api/students/${studentId}/subscriptions`, {
                        headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
                    }),
                    fetch(`/api/students/${studentId}/certificates`, {
                        headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
                    })
                ]);

                const subscriptions = subscriptionsResponse.ok ? (await subscriptionsResponse.json()).data : [];
                const certificates = certificatesResponse.ok ? (await certificatesResponse.json()).data : [];

                renderStudentProgress(selectedStudent, subscriptions, certificates);
            } catch (error) {
                console.error('Error loading student progress:', error);
                showNotification('Error loading student progress', 'error');
            }
        }

        function renderStudentProgress(student, subscriptions, certificates) {
            const content = document.getElementById('student-progress-content');

            // Calculate statistics
            const totalCourses = subscriptions.length;
            const completedCourses = certificates.length;
            const averageScore = certificates.length > 0
                ? (certificates.reduce((sum, cert) => sum + parseFloat(cert.final_score || 0), 0) / certificates.length).toFixed(1)
                : 0;
            const completionRate = totalCourses > 0 ? Math.round((completedCourses / totalCourses) * 100) : 0;

            content.innerHTML = `
                <div class="space-y-6">
                    <!-- Student Info Header -->
                    <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg p-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-2xl font-bold">
                                ${student.name.charAt(0).toUpperCase()}
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900">${student.name}</h4>
                                <p class="text-gray-600">${student.email}</p>
                                <span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm mt-1">
                                    Student
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Statistics -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="bg-blue-50 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-blue-600">${totalCourses}</div>
                            <div class="text-sm text-gray-600">Enrolled Courses</div>
                        </div>
                        <div class="bg-green-50 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-green-600">${completedCourses}</div>
                            <div class="text-sm text-gray-600">Completed</div>
                        </div>
                        <div class="bg-purple-50 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-purple-600">${averageScore}</div>
                            <div class="text-sm text-gray-600">Avg Score</div>
                        </div>
                        <div class="bg-orange-50 rounded-lg p-4 text-center">
                            <div class="text-2xl font-bold text-orange-600">${completionRate}%</div>
                            <div class="text-sm text-gray-600">Completion Rate</div>
                        </div>
                    </div>

                    <!-- Course Progress Table -->
                    <div>
                        <h5 class="text-lg font-semibold mb-3">Course Progress</h5>
                        <div class="overflow-x-auto">
                            <table class="w-full border-collapse border border-gray-200 rounded-lg">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="border border-gray-200 px-4 py-2 text-left">Course</th>
                                        <th class="border border-gray-200 px-4 py-2 text-center">Status</th>
                                        <th class="border border-gray-200 px-4 py-2 text-center">Progress</th>
                                        <th class="border border-gray-200 px-4 py-2 text-center">Score</th>
                                        <th class="border border-gray-200 px-4 py-2 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${subscriptions.map(subscription => {
                                        const certificate = certificates.find(cert => cert.course_id === subscription.course_id);
                                        return `
                                            <tr class="hover:bg-gray-50">
                                                <td class="border border-gray-200 px-4 py-2">
                                                    <div class="font-medium">${subscription.course?.title || 'Unknown Course'}</div>
                                                    <div class="text-sm text-gray-500">${subscription.course?.category?.replace('_', ' ') || ''}</div>
                                                </td>
                                                <td class="border border-gray-200 px-4 py-2 text-center">
                                                    <span class="px-2 py-1 rounded-full text-xs ${certificate ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'}">
                                                        ${certificate ? 'Completed' : 'In Progress'}
                                                    </span>
                                                </td>
                                                <td class="border border-gray-200 px-4 py-2 text-center">
                                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                                        <div class="bg-blue-500 h-2 rounded-full" style="width: ${certificate?.completion_percentage || 0}%"></div>
                                                    </div>
                                                    <span class="text-xs text-gray-500">${certificate?.completion_percentage || 0}%</span>
                                                </td>
                                                <td class="border border-gray-200 px-4 py-2 text-center">
                                                    ${certificate ? certificate.final_score : '-'}
                                                </td>
                                                <td class="border border-gray-200 px-4 py-2 text-center">
                                                    ${!certificate ? `
                                                        <button onclick="generateCertificateForStudentCourse(${student.id}, ${subscription.course_id})"
                                                                class="px-2 py-1 bg-green-500 hover:bg-green-600 text-white text-xs rounded transition-colors">
                                                            Generate Certificate
                                                        </button>
                                                    ` : `
                                                        <button onclick="viewCertificate(${certificate.id})"
                                                                class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded transition-colors">
                                                            View Certificate
                                                        </button>
                                                    `}
                                                </td>
                                            </tr>
                                        `;
                                    }).join('')}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            `;
        }

        async function generateCertificateForStudent(studentId) {
            try {
                selectedStudent = allUsers.find(user => user.id === studentId);
                if (!selectedStudent) return;

                // Load student's subscriptions to show available courses
                const response = await fetch(`/api/students/${studentId}/subscriptions`, {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });

                if (response.ok) {
                    const result = await response.json();
                    const subscriptions = result.data || [];

                    const modal = document.getElementById('certificate-generation-modal');
                    const content = document.getElementById('certificate-generation-content');

                    content.innerHTML = `
                        <div class="space-y-4">
                            <div class="bg-blue-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-blue-900">Student: ${selectedStudent.name}</h4>
                                <p class="text-blue-700">${selectedStudent.email}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Select Course</label>
                                <select id="course-select" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Choose a course...</option>
                                    ${subscriptions.map(sub => `
                                        <option value="${sub.course_id}" data-course-title="${sub.course?.title}">
                                            ${sub.course?.title} - ${sub.course?.category?.replace('_', ' ')}
                                        </option>
                                    `).join('')}
                                </select>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Final Score</label>
                                    <input type="number" id="final-score" min="0" max="100" step="0.1"
                                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                           placeholder="95.5">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Completion %</label>
                                    <input type="number" id="completion-percentage" min="0" max="100" value="100"
                                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>

                            <div class="flex justify-end space-x-3 mt-6">
                                <button onclick="closeCertificateGenerationModal()"
                                        class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                                    Cancel
                                </button>
                                <button onclick="generateCertificateSubmit()"
                                        class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg">
                                    Generate Certificate
                                </button>
                            </div>
                        </div>
                    `;

                    modal.classList.remove('hidden');
                }
            } catch (error) {
                console.error('Error loading student courses:', error);
                showNotification('Error loading student courses', 'error');
            }
        }

        async function generateCertificateSubmit() {
            try {
                const courseId = document.getElementById('course-select').value;
                const finalScore = document.getElementById('final-score').value;
                const completionPercentage = document.getElementById('completion-percentage').value;

                if (!courseId) {
                    showNotification('Please select a course', 'error');
                    return;
                }

                const response = await fetch(`/api/admin/certificates/generate`, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        student_id: selectedStudent.id,
                        course_id: parseInt(courseId),
                        final_score: finalScore ? parseFloat(finalScore) : null,
                        completion_percentage: parseInt(completionPercentage)
                    })
                });

                const result = await response.json();

                if (result.success) {
                    showNotification('Certificate generated successfully!', 'success');
                    closeCertificateGenerationModal();
                    loadUsers(); // Refresh user list
                } else {
                    showNotification(result.message || 'Failed to generate certificate', 'error');
                }
            } catch (error) {
                console.error('Error generating certificate:', error);
                showNotification('Error generating certificate', 'error');
            }
        }

        function closeStudentProgressModal() {
            document.getElementById('student-progress-modal').classList.add('hidden');
        }

        function closeCertificateGenerationModal() {
            document.getElementById('certificate-generation-modal').classList.add('hidden');
        }

        function downloadProgressReport() {
            if (!selectedStudent) return;

            // Generate and download a progress report
            const reportData = {
                student: selectedStudent,
                generated_at: new Date().toISOString(),
                // Add more report data as needed
            };

            const blob = new Blob([JSON.stringify(reportData, null, 2)], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `progress-report-${selectedStudent.name.replace(/\s+/g, '-')}-${new Date().toISOString().split('T')[0]}.json`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);

            showNotification('Progress report downloaded', 'success');
        }

        async function generateCertificateForStudentCourse(studentId, courseId) {
            try {
                selectedStudent = allUsers.find(user => user.id === studentId);
                if (!selectedStudent) return;

                const response = await fetch(`/api/admin/certificates/generate`, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        student_id: studentId,
                        course_id: courseId,
                        final_score: 100,
                        completion_percentage: 100
                    })
                });

                const result = await response.json();

                if (result.success) {
                    showNotification('Certificate generated successfully!', 'success');
                    // Refresh the progress modal if it's open
                    if (!document.getElementById('student-progress-modal').classList.contains('hidden')) {
                        viewStudentProgress(studentId);
                    }
                } else {
                    showNotification(result.message || 'Failed to generate certificate', 'error');
                }
            } catch (error) {
                console.error('Error generating certificate:', error);
                showNotification('Error generating certificate', 'error');
            }
        }

        function viewCertificate(certificateId) {
            // This would typically open a certificate viewer or download the certificate
            showNotification('Certificate viewer not implemented yet', 'info');
        }

        // Load courses data
        async function loadCourses() {
            try {
                const coursesResponse = await fetch('/api/courses', {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                });

                if (coursesResponse.ok) {
                    const coursesData = await coursesResponse.json();
                    displayCourses(coursesData.data || []);
                }
            } catch (error) {
                console.error('Error loading courses:', error);
                document.getElementById('courses-list').innerHTML = `
                    <div class="text-center text-red-500 col-span-full py-8">
                        <i class="fas fa-exclamation-triangle text-2xl mb-3"></i>
                        <p>Error loading courses</p>
                    </div>
                `;
            }
        }

        async function displayCourses(courses) {
            const coursesList = document.getElementById('courses-list');

            if (!courses || courses.length === 0) {
                coursesList.innerHTML = `
                    <div class="text-center text-gray-500 col-span-full py-12">
                        <i class="fas fa-book text-4xl mb-4"></i>
                        <p>No courses available</p>
                    </div>
                `;
                return;
            }

            // Check subscription status for each course
            const coursesWithSubscriptionStatus = await Promise.all(
                courses.map(async (course) => {
                    if (user.role === 'student') {
                        course.isSubscribed = await checkSubscriptionStatus(course.id);
                    }
                    return course;
                })
            );

            const coursesHTML = coursesWithSubscriptionStatus.map(course => `
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 card-hover">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">${course.title}</h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">${course.description}</p>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800">
                                    ${course.category.replace('_', ' ').toUpperCase()}
                                </span>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-green-100 to-green-200 text-green-800">
                                    ${course.difficulty.toUpperCase()}
                                </span>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-purple-100 to-purple-200 text-purple-800">
                                    <i class="fas fa-clock mr-1"></i>${course.estimated_hours}h
                                </span>
                                ${course.isSubscribed ? `
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-emerald-100 to-emerald-200 text-emerald-800">
                                        <i class="fas fa-check mr-1"></i>SUBSCRIBED
                                    </span>
                                ` : ''}
                            </div>

                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <i class="fas fa-user mr-2"></i>
                                <span>${course.instructor?.name || 'Instructor'}</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-gray-900">$${course.price}</div>
                        <div class="flex space-x-2">
                            ${user.role === 'admin' || user.role === 'instructor' ? `
                                <button onclick="editCourse(${course.id})" class="px-3 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-200 text-sm">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="deleteCourse(${course.id})" class="px-3 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 text-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            ` : course.isSubscribed ? `
                                <button class="px-6 py-2 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-lg cursor-default text-sm font-medium">
                                    <i class="fas fa-check mr-2"></i>Subscribed
                                </button>
                                <button onclick="startLearning(${course.id})" class="px-6 py-2 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-lg hover:from-purple-600 hover:to-purple-700 transition-all duration-200 transform hover:scale-105 text-sm font-medium">
                                    <i class="fas fa-play mr-2"></i>Start Learning
                                </button>
                            ` : `
                                <div class="flex space-x-2">
                                    <button onclick="subscribeToCourse(${course.id})" class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-200 transform hover:scale-105 text-sm font-medium">
                                        <i class="fas fa-credit-card mr-2"></i>Demo Payment
                                    </button>
                                    <button onclick="subscribeToPayPalCourse(${course.id})" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 transform hover:scale-105 text-sm font-medium">
                                        <i class="fab fa-paypal mr-2"></i>PayPal
                                    </button>
                                </div>
                            `}
                        </div>
                    </div>
                </div>
            `).join('');

            coursesList.innerHTML = coursesHTML;
            document.getElementById('courses-count').textContent = courses.length;
        }

        // Course Management Functions
        let allCourses = [];
        let courseToDelete = null;

        async function loadCourses() {
            try {
                const coursesResponse = await fetch('/api/courses', {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                });

                if (coursesResponse.ok) {
                    const coursesData = await coursesResponse.json();
                    allCourses = coursesData.data || [];
                    displayCourses(allCourses);
                }
            } catch (error) {
                console.error('Error loading courses:', error);
                document.getElementById('courses-list').innerHTML = `
                    <div class="text-center text-red-500 col-span-full py-8">
                        <i class="fas fa-exclamation-triangle text-2xl mb-3"></i>
                        <p>Error loading courses</p>
                    </div>
                `;
            }
        }

        function filterCourses() {
            const categoryFilter = document.getElementById('category-filter').value;
            const difficultyFilter = document.getElementById('difficulty-filter').value;

            let filteredCourses = allCourses;

            if (categoryFilter) {
                filteredCourses = filteredCourses.filter(course => course.category === categoryFilter);
            }

            if (difficultyFilter) {
                filteredCourses = filteredCourses.filter(course => course.difficulty === difficultyFilter);
            }

            displayCourses(filteredCourses);
        }

        function searchCourses() {
            const searchTerm = document.getElementById('course-search').value.toLowerCase();

            if (!searchTerm) {
                displayCourses(allCourses);
                return;
            }

            const filteredCourses = allCourses.filter(course =>
                course.title.toLowerCase().includes(searchTerm) ||
                course.description.toLowerCase().includes(searchTerm) ||
                (course.technologies && course.technologies.some(tech =>
                    tech.toLowerCase().includes(searchTerm)
                ))
            );

            displayCourses(filteredCourses);
        }

        function openCourseModal(courseId = null) {
            const modal = document.getElementById('course-modal');
            const form = document.getElementById('course-form');
            const modalTitle = document.getElementById('modal-title');

            // Reset form
            form.reset();
            document.getElementById('course-id').value = '';

            if (courseId) {
                // Edit mode
                modalTitle.textContent = 'Edit Course';
                const course = allCourses.find(c => c.id === courseId);
                if (course) {
                    document.getElementById('course-id').value = course.id;
                    document.getElementById('course-title').value = course.title;
                    document.getElementById('course-category').value = course.category;
                    document.getElementById('course-difficulty').value = course.difficulty;
                    document.getElementById('course-price').value = course.price;
                    document.getElementById('course-hours').value = course.estimated_hours;
                    document.getElementById('course-description').value = course.description;
                    document.getElementById('course-technologies').value = course.technologies ? course.technologies.join(', ') : '';
                    document.getElementById('course-active').checked = course.is_active;
                }
            } else {
                // Add mode
                modalTitle.textContent = 'Add New Course';
                document.getElementById('course-active').checked = true;
            }

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeCourseModal() {
            document.getElementById('course-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        async function saveCourse(event) {
            event.preventDefault();

            const courseId = document.getElementById('course-id').value;
            const courseData = {
                title: document.getElementById('course-title').value,
                category: document.getElementById('course-category').value,
                difficulty: document.getElementById('course-difficulty').value,
                price: parseFloat(document.getElementById('course-price').value),
                estimated_hours: parseInt(document.getElementById('course-hours').value),
                description: document.getElementById('course-description').value,
                technologies: document.getElementById('course-technologies').value.split(',').map(t => t.trim()).filter(t => t),
                is_active: document.getElementById('course-active').checked
            };

            try {
                const url = courseId ? `/api/courses/${courseId}` : '/api/courses';
                const method = courseId ? 'PUT' : 'POST';

                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(courseData)
                });

                const result = await response.json();

                if (response.ok) {
                    closeCourseModal();
                    loadCourses(); // Reload courses
                    showNotification(courseId ? 'Course updated successfully!' : 'Course created successfully!', 'success');
                } else {
                    showNotification(result.message || 'Error saving course', 'error');
                }
            } catch (error) {
                console.error('Error saving course:', error);
                showNotification('Error saving course', 'error');
            }
        }

        function editCourse(courseId) {
            openCourseModal(courseId);
        }

        function deleteCourse(courseId) {
            courseToDelete = courseId;
            document.getElementById('delete-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            document.getElementById('delete-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            courseToDelete = null;
        }

        async function confirmDeleteCourse() {
            if (!courseToDelete) return;

            try {
                const response = await fetch(`/api/courses/${courseToDelete}`, {
                    method: 'DELETE',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (response.ok) {
                    closeDeleteModal();
                    loadCourses(); // Reload courses
                    showNotification('Course deleted successfully!', 'success');
                } else {
                    showNotification(result.message || 'Error deleting course', 'error');
                }
            } catch (error) {
                console.error('Error deleting course:', error);
                showNotification('Error deleting course', 'error');
            }
        }

        // Notification function
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg text-white transform transition-all duration-300 translate-x-full`;

            if (type === 'success') {
                notification.classList.add('bg-green-500');
            } else if (type === 'error') {
                notification.classList.add('bg-red-500');
            } else {
                notification.classList.add('bg-blue-500');
            }

            notification.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-${type === 'success' ? 'check' : type === 'error' ? 'exclamation-triangle' : 'info-circle'} mr-2"></i>
                    <span>${message}</span>
                </div>
            `;

            document.body.appendChild(notification);

            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            // Auto remove after 3 seconds
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }

        function logout() {
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            window.location.href = '/login';
        }

        // Initialize dashboard
        document.addEventListener('DOMContentLoaded', function() {
            // Set initial active navigation
            document.querySelector('[onclick="showSection(\'dashboard\')"]').classList.add('bg-slate-700', 'text-white');
            document.querySelector('[onclick="showSection(\'dashboard\')"]').classList.remove('text-gray-300');

            // Load initial dashboard data
            loadCourses();
        });

        // Mobile menu toggle (for future mobile responsiveness)
        function toggleMobileMenu() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        }

        // CodeLabs Management Functions
        let allCodeLabs = [];
        let currentCodeLab = null;

        // Load CodeLabs data
        async function loadCodeLabs() {
            try {
                // Simulate API call - in real implementation, this would be an actual endpoint
                const codeLabs = [
                    {
                        id: 1,
                        title: 'Introduction to JavaScript Functions',
                        description: 'Learn the basics of creating and using functions in JavaScript.',
                        instructions: 'Write a function called greetUser that takes a name parameter and returns a greeting message.',
                        course_id: 1,
                        course_name: 'Complete Web Development Bootcamp',
                        programming_language: 'javascript',
                        difficulty: 'beginner',
                        estimated_time: 30,
                        max_score: 100,
                        is_published: true,
                        order: 1,
                        starter_code: {
                            main: '// Write your function here\nfunction greetUser(name) {\n    // Your code goes here\n}\n\n// Test your function\nconsole.log(greetUser("John"));'
                        },
                        solution_code: {
                            main: 'function greetUser(name) {\n    return "Hello, " + name + "! Welcome to Zoswa!";\n}\n\nconsole.log(greetUser("John"));'
                        },
                        test_cases: [
                            {
                                description: 'Function returns correct greeting',
                                code: 'console.log(greetUser("Alice"));',
                                expected: 'Hello, Alice! Welcome to Zoswa!'
                            }
                        ],
                        hints: ['Remember to use the return statement', 'You can concatenate strings with the + operator'],
                        created_at: '2024-01-15T10:30:00Z'
                    },
                    {
                        id: 2,
                        title: 'Python List Operations',
                        description: 'Master basic list operations in Python including append, remove, and iteration.',
                        instructions: 'Create a function that filters even numbers from a list and returns a new list.',
                        course_id: 2,
                        course_name: 'Python Data Analysis Fundamentals',
                        programming_language: 'python',
                        difficulty: 'intermediate',
                        estimated_time: 45,
                        max_score: 100,
                        is_published: true,
                        order: 1,
                        starter_code: {
                            main: '# Write your function here\ndef filter_even_numbers(numbers):\n    # Your code goes here\n    pass\n\n# Test your function\ntest_list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]\nprint(filter_even_numbers(test_list))'
                        },
                        solution_code: {
                            main: 'def filter_even_numbers(numbers):\n    return [num for num in numbers if num % 2 == 0]\n\ntest_list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]\nprint(filter_even_numbers(test_list))'
                        },
                        test_cases: [
                            {
                                description: 'Function filters even numbers correctly',
                                code: 'print(filter_even_numbers([1, 2, 3, 4, 5]))',
                                expected: '[2, 4]'
                            }
                        ],
                        hints: ['Use list comprehension', 'The modulo operator % can help check for even numbers'],
                        created_at: '2024-02-01T14:20:00Z'
                    },
                    {
                        id: 3,
                        title: 'PHP Array Manipulation',
                        description: 'Learn to work with associative arrays in PHP and perform common operations.',
                        instructions: 'Create a function that takes an array of user data and returns only active users.',
                        course_id: 1,
                        course_name: 'Complete Web Development Bootcamp',
                        programming_language: 'php',
                        difficulty: 'intermediate',
                        estimated_time: 40,
                        max_score: 100,
                        is_published: true,
                        order: 2,
                        starter_code: {
                            main: '<?php\n// Write your function here\nfunction getActiveUsers($users) {\n    // Your code goes here\n}\n\n// Test data\n$users = [\n    ["name" => "John", "active" => true],\n    ["name" => "Jane", "active" => false],\n    ["name" => "Bob", "active" => true]\n];\n\nprint_r(getActiveUsers($users));\n?>'
                        },
                        solution_code: {
                            main: '<?php\nfunction getActiveUsers($users) {\n    return array_filter($users, function($user) {\n        return $user["active"] === true;\n    });\n}\n\n$users = [\n    ["name" => "John", "active" => true],\n    ["name" => "Jane", "active" => false],\n    ["name" => "Bob", "active" => true]\n];\n\nprint_r(getActiveUsers($users));\n?>'
                        },
                        test_cases: [],
                        hints: ['Use array_filter() function', 'Check the "active" key in each user array'],
                        created_at: '2024-02-15T11:45:00Z'
                    }
                ];

                allCodeLabs = codeLabs;
                displayCodeLabs(allCodeLabs);

            } catch (error) {
                console.error('Error loading code labs:', error);
                document.getElementById('codelabs-grid').innerHTML = `
                    <div class="text-center text-red-500 col-span-full py-8">
                        <i class="fas fa-exclamation-triangle text-2xl mb-3"></i>
                        <p>Error loading code labs</p>
                    </div>
                `;
            }
        }

        function displayCodeLabs(codeLabs) {
            const grid = document.getElementById('codelabs-grid');
            document.getElementById('codelabs-count').textContent = codeLabs.length;

            if (codeLabs.length === 0) {
                grid.innerHTML = `
                    <div class="text-center text-gray-500 col-span-full py-8">
                        <i class="fas fa-code text-4xl mb-4"></i>
                        <p>No code labs found</p>
                    </div>
                `;
                return;
            }

            const difficultyColors = {
                'beginner': 'bg-green-100 text-green-800',
                'intermediate': 'bg-yellow-100 text-yellow-800',
                'advanced': 'bg-red-100 text-red-800'
            };

            const languageIcons = {
                'javascript': 'fab fa-js-square text-yellow-500',
                'python': 'fab fa-python text-blue-500',
                'php': 'fab fa-php text-purple-500',
                'java': 'fab fa-java text-red-500',
                'cpp': 'fas fa-code text-blue-600',
                'html': 'fab fa-html5 text-orange-500',
                'css': 'fab fa-css3-alt text-blue-500'
            };

            grid.innerHTML = codeLabs.map(lab => `
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg flex items-center justify-center">
                                <i class="${languageIcons[lab.programming_language] || 'fas fa-code'} text-white"></i>
                            </div>
                            <div>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium ${difficultyColors[lab.difficulty]}">
                                    ${lab.difficulty}
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            ${user.role === 'admin' || user.role === 'instructor' ? `
                                <button onclick="editCodeLab(${lab.id})" class="text-blue-600 hover:text-blue-700 p-2">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="deleteCodeLab(${lab.id})" class="text-red-600 hover:text-red-700 p-2">
                                    <i class="fas fa-trash"></i>
                                </button>
                            ` : ''}
                        </div>
                    </div>

                    <h4 class="text-lg font-bold text-gray-900 mb-2">${lab.title}</h4>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">${lab.description}</p>

                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span><i class="fas fa-book mr-1"></i>${lab.course_name}</span>
                        <span><i class="fas fa-clock mr-1"></i>${lab.estimated_time}min</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-400 capitalize">${lab.programming_language}</span>
                        <button onclick="openIDE(${lab.id})" class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-4 py-2 rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200">
                            <i class="fas fa-play mr-2"></i>Start Lab
                        </button>
                    </div>
                </div>
            `).join('');
        }

        function filterCodeLabs() {
            const courseFilter = document.getElementById('codelab-course-filter').value;
            const languageFilter = document.getElementById('codelab-language-filter').value;

            let filtered = allCodeLabs;

            if (courseFilter) {
                filtered = filtered.filter(lab => lab.course_id.toString() === courseFilter);
            }

            if (languageFilter) {
                filtered = filtered.filter(lab => lab.programming_language === languageFilter);
            }

            displayCodeLabs(filtered);
        }

        function searchCodeLabs() {
            const searchTerm = document.getElementById('codelab-search').value.toLowerCase();
            const filtered = allCodeLabs.filter(lab =>
                lab.title.toLowerCase().includes(searchTerm) ||
                lab.description.toLowerCase().includes(searchTerm) ||
                lab.programming_language.toLowerCase().includes(searchTerm)
            );
            displayCodeLabs(filtered);
        }

        // CodeLab Modal Functions
        function openCodeLabModal(labId = null) {
            const modal = document.getElementById('codelab-modal');
            const form = document.getElementById('codelab-form');

            if (labId) {
                const lab = allCodeLabs.find(l => l.id === labId);
                if (lab) {
                    document.getElementById('codelab-modal-title').textContent = 'Edit Code Lab';
                    document.getElementById('codelab-id').value = lab.id;
                    document.getElementById('codelab-title').value = lab.title;
                    document.getElementById('codelab-course').value = lab.course_id;
                    document.getElementById('codelab-language').value = lab.programming_language;
                    document.getElementById('codelab-difficulty').value = lab.difficulty;
                    document.getElementById('codelab-time').value = lab.estimated_time;
                    document.getElementById('codelab-description').value = lab.description;
                    document.getElementById('codelab-instructions').value = lab.instructions;
                    document.getElementById('codelab-starter-code').value = lab.starter_code.main || '';
                    document.getElementById('codelab-solution-code').value = lab.solution_code.main || '';
                }
            } else {
                document.getElementById('codelab-modal-title').textContent = 'Create Code Lab';
                form.reset();
                document.getElementById('codelab-id').value = '';
            }

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeCodeLabModal() {
            document.getElementById('codelab-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        async function saveCodeLab(event) {
            event.preventDefault();

            try {
                const formData = {
                    title: document.getElementById('codelab-title').value,
                    course_id: document.getElementById('codelab-course').value,
                    programming_language: document.getElementById('codelab-language').value,
                    difficulty: document.getElementById('codelab-difficulty').value,
                    estimated_time: document.getElementById('codelab-time').value,
                    description: document.getElementById('codelab-description').value,
                    instructions: document.getElementById('codelab-instructions').value,
                    starter_code: {
                        main: document.getElementById('codelab-starter-code').value
                    },
                    solution_code: {
                        main: document.getElementById('codelab-solution-code').value
                    }
                };

                const labId = document.getElementById('codelab-id').value;

                if (labId) {
                    // Update existing lab
                    const labIndex = allCodeLabs.findIndex(l => l.id === parseInt(labId));
                    if (labIndex !== -1) {
                        allCodeLabs[labIndex] = { ...allCodeLabs[labIndex], ...formData };
                        showNotification('Code lab updated successfully!', 'success');
                    }
                } else {
                    // Create new lab
                    const newLab = {
                        id: Date.now(),
                        ...formData,
                        course_name: document.querySelector(`#codelab-course option[value="${formData.course_id}"]`).textContent,
                        max_score: 100,
                        is_published: true,
                        order: allCodeLabs.length + 1,
                        test_cases: [],
                        hints: [],
                        created_at: new Date().toISOString()
                    };
                    allCodeLabs.push(newLab);
                    showNotification('Code lab created successfully!', 'success');
                }

                closeCodeLabModal();
                displayCodeLabs(allCodeLabs);

            } catch (error) {
                console.error('Error saving code lab:', error);
                showNotification('Error saving code lab', 'error');
            }
        }

        function editCodeLab(labId) {
            openCodeLabModal(labId);
        }

        function deleteCodeLab(labId) {
            if (confirm('Are you sure you want to delete this code lab?')) {
                allCodeLabs = allCodeLabs.filter(l => l.id !== labId);
                displayCodeLabs(allCodeLabs);
                showNotification('Code lab deleted successfully!', 'success');
            }
        }

        // IDE Functions
        function openIDE(labId) {
            const lab = allCodeLabs.find(l => l.id === labId);
            if (!lab) return;

            currentCodeLab = lab;

            // Update IDE header
            document.getElementById('ide-lab-title').textContent = lab.title;
            document.getElementById('ide-language').textContent = lab.programming_language.toUpperCase();

            // Load instructions and hints
            document.getElementById('lab-instructions').innerHTML = lab.instructions.replace(/\n/g, '<br>');

            if (lab.hints && lab.hints.length > 0) {
                document.getElementById('lab-hints').innerHTML = lab.hints.map((hint, index) =>
                    `<div class="text-sm text-gray-600 bg-yellow-50 p-2 rounded">💡 ${hint}</div>`
                ).join('');
            } else {
                document.getElementById('lab-hints').innerHTML = '<div class="text-sm text-gray-500">No hints available</div>';
            }

            // Load test cases
            if (lab.test_cases && lab.test_cases.length > 0) {
                document.getElementById('lab-test-cases').innerHTML = lab.test_cases.map((test, index) =>
                    `<div class="mb-2"><strong>Test ${index + 1}:</strong> ${test.description}</div>`
                ).join('');
            } else {
                document.getElementById('lab-test-cases').innerHTML = '<div class="text-gray-500">No test cases defined</div>';
            }

            // Load starter code
            document.getElementById('code-editor').value = lab.starter_code.main || '// Write your code here...';

            // Clear output
            document.getElementById('code-output').innerHTML = '<div class="text-gray-500">Ready to run code...</div>';

            // Show IDE
            document.getElementById('ide-environment').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeIDE() {
            document.getElementById('ide-environment').classList.add('hidden');
            document.body.style.overflow = 'auto';
            currentCodeLab = null;
        }

        async function runCode() {
            if (!currentCodeLab) return;

            const code = document.getElementById('code-editor').value;
            const outputDiv = document.getElementById('code-output');

            outputDiv.innerHTML = '<div class="text-yellow-400"><i class="fas fa-spinner fa-spin mr-2"></i>Running code...</div>';

            try {
                // Simulate API call to execute code
                const response = await fetch('/api/codelabs/' + currentCodeLab.id + '/execute', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + token
                    },
                    body: JSON.stringify({
                        code: code,
                        language: currentCodeLab.programming_language
                    })
                });

                if (response.ok) {
                    const result = await response.json();
                    if (result.success) {
                        const output = result.data.output || 'Code executed successfully';
                        const error = result.data.error;
                        const testsPassedColor = result.data.tests_passed === result.data.total_tests ? 'text-green-400' : 'text-red-400';

                        outputDiv.innerHTML = `
                            ${error ? `<div class="text-red-400 mb-2">Error: ${error}</div>` : ''}
                            <div class="text-green-400 mb-2">Output:</div>
                            <div class="text-white mb-2">${output}</div>
                            ${result.data.total_tests > 0 ? `
                                <div class="${testsPassedColor}">
                                    Tests: ${result.data.tests_passed}/${result.data.total_tests} passed
                                </div>
                            ` : ''}
                        `;
                    } else {
                        outputDiv.innerHTML = '<div class="text-red-400">Error executing code</div>';
                    }
                } else {
                    outputDiv.innerHTML = '<div class="text-red-400">Failed to execute code</div>';
                }
            } catch (error) {
                console.error('Error running code:', error);
                outputDiv.innerHTML = '<div class="text-red-400">Error: Unable to execute code</div>';
            }
        }

        function resetCode() {
            if (!currentCodeLab) return;

            if (confirm('Are you sure you want to reset your code? All changes will be lost.')) {
                document.getElementById('code-editor').value = currentCodeLab.starter_code.main || '';
                document.getElementById('code-output').innerHTML = '<div class="text-gray-500">Code reset. Ready to run...</div>';
            }
        }

        function submitSolution() {
            if (!currentCodeLab) return;

            const code = document.getElementById('code-editor').value;
            if (code.trim() === '' || code.trim() === (currentCodeLab.starter_code.main || '').trim()) {
                alert('Please write some code before submitting!');
                return;
            }

            if (confirm('Submit your solution? You can continue editing after submission.')) {
                showNotification('Solution submitted successfully!', 'success');
                // Here you would typically save the solution to the database
            }
        }

        function clearOutput() {
            document.getElementById('code-output').innerHTML = '<div class="text-gray-500">Output cleared.</div>';
        }

        // Subscription Functions
        async function subscribeToCourse(courseId) {
            if (!confirm('Do you want to subscribe to this course? This will process a payment.')) {
                return;
            }

            try {
                const response = await fetch('/api/subscriptions', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + token
                    },
                    body: JSON.stringify({
                        course_id: courseId,
                        payment_method: 'demo_payment'
                    })
                });

                const result = await response.json();

                if (result.success) {
                    showNotification(result.message || 'Successfully subscribed to course!', 'success');
                    // Reload courses to update UI
                    loadCourses();
                } else {
                    showNotification(result.message || 'Failed to subscribe to course', 'error');
                }
            } catch (error) {
                console.error('Error subscribing to course:', error);
                showNotification('Error subscribing to course', 'error');
            }
        }

        async function checkSubscriptionStatus(courseId) {
            try {
                const response = await fetch(`/api/subscriptions/check/${courseId}`, {
                    method: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                });

                const result = await response.json();

                if (result.success) {
                    return result.subscribed;
                }
            } catch (error) {
                console.error('Error checking subscription status:', error);
            }
            return false;
        }

        // PayPal Settings Functions
        async function showSettingsModal() {
            if (user.role !== 'admin') {
                showNotification('Access denied. Admin privileges required.', 'error');
                return;
            }

            document.getElementById('settings-modal').classList.remove('hidden');
            await loadPayPalSettings();
        }

        function closeSettingsModal() {
            document.getElementById('settings-modal').classList.add('hidden');
        }

        function showNotificationsModal() {
            document.getElementById('notifications-modal').classList.remove('hidden');
        }

        function closeNotificationsModal() {
            document.getElementById('notifications-modal').classList.add('hidden');
        }

        function markAllAsRead() {
            const notificationBadge = document.querySelector('.fa-bell').nextElementSibling;
            if (notificationBadge) {
                notificationBadge.textContent = '0';
                notificationBadge.classList.add('hidden');
            }
            showNotification('All notifications marked as read', 'success');
        }

        // Add User Modal Functions
        function openAddUserModal() {
            if (user.role !== 'admin') {
                showNotification('Access denied. Admin privileges required.', 'error');
                return;
            }
            document.getElementById('add-user-modal').classList.remove('hidden');
            document.getElementById('add-user-form').reset();
        }

        function closeAddUserModal() {
            document.getElementById('add-user-modal').classList.add('hidden');
        }

        async function submitAddUser(event) {
            event.preventDefault();

            const formData = {
                name: document.getElementById('new-user-name').value,
                email: document.getElementById('new-user-email').value,
                password: document.getElementById('new-user-password').value,
                role: document.getElementById('new-user-role').value,
                phone: document.getElementById('new-user-phone').value,
                bio: document.getElementById('new-user-bio').value,
                is_active: document.getElementById('new-user-status').value === '1'
            };

            try {
                const response = await fetch('/api/auth/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();

                if (result.success) {
                    showNotification('User created successfully!', 'success');
                    closeAddUserModal();
                    if (typeof loadUsers === 'function') {
                        loadUsers(); // Refresh users list if available
                    }
                } else {
                    showNotification(result.message || 'Failed to create user', 'error');
                }
            } catch (error) {
                console.error('Error creating user:', error);
                showNotification('Error creating user', 'error');
            }
        }

        // Reports Modal Functions
        function showReportsModal() {
            if (user.role !== 'admin') {
                showNotification('Access denied. Admin privileges required.', 'error');
                return;
            }
            document.getElementById('reports-modal').classList.remove('hidden');
            loadReportsData();
        }

        function closeReportsModal() {
            document.getElementById('reports-modal').classList.add('hidden');
        }

        async function loadReportsData() {
            try {
                // Load users count
                const usersResponse = await fetch('/api/users', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });
                if (usersResponse.ok) {
                    const usersData = await usersResponse.json();
                    document.getElementById('total-users-count').textContent = usersData.data.length;
                }

                // Load courses count
                const coursesResponse = await fetch('/api/courses', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });
                if (coursesResponse.ok) {
                    const coursesData = await coursesResponse.json();
                    document.getElementById('total-courses-count').textContent = coursesData.data.length;
                }

                // Load subscriptions count
                const subscriptionsResponse = await fetch('/api/subscriptions', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });
                if (subscriptionsResponse.ok) {
                    const subscriptionsData = await subscriptionsResponse.json();
                    document.getElementById('total-subscriptions-count').textContent = subscriptionsData.data.length;
                }

                // Load certificates count
                const certificatesResponse = await fetch('/api/certificates', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });
                if (certificatesResponse.ok) {
                    const certificatesData = await certificatesResponse.json();
                    document.getElementById('total-certificates-count').textContent = certificatesData.data.length;
                }

            } catch (error) {
                console.error('Error loading reports data:', error);
                showNotification('Error loading reports data', 'error');
            }
        }

        function exportReport() {
            // Create a simple report and download it
            const reportData = {
                generated: new Date().toISOString(),
                users: document.getElementById('total-users-count').textContent,
                courses: document.getElementById('total-courses-count').textContent,
                subscriptions: document.getElementById('total-subscriptions-count').textContent,
                certificates: document.getElementById('total-certificates-count').textContent
            };

            const reportContent = `Zoswa LMS System Report
Generated: ${new Date().toLocaleString()}

Summary:
- Total Users: ${reportData.users}
- Total Courses: ${reportData.courses}
- Active Subscriptions: ${reportData.subscriptions}
- Certificates Issued: ${reportData.certificates}

Report generated by Zoswa Learning Management System
`;

            const blob = new Blob([reportContent], { type: 'text/plain' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `zoswa-report-${new Date().toISOString().split('T')[0]}.txt`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);

            showNotification('Report exported successfully!', 'success');
        }

        // Student Progress Function
        function showMyProgress() {
            // Navigate to the certificates section to show progress
            showSection('certificates');
            showNotification('Your progress and certificates are shown below', 'info');
        }

        // Support Requests Functions
        async function loadSupportRequests() {
            if (user.role !== 'admin') {
                showNotification('Access denied. Admin privileges required.', 'error');
                return;
            }

            try {
                // Load support requests
                const response = await fetch('/api/support-requests', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (result.success) {
                    displaySupportRequests(result.data);
                } else {
                    showNotification('Failed to load support requests', 'error');
                }

                // Load stats
                await loadSupportRequestStats();

            } catch (error) {
                console.error('Error loading support requests:', error);
                showNotification('Error loading support requests', 'error');
            }
        }

        async function loadSupportRequestStats() {
            try {
                const response = await fetch('/api/support-requests/stats', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (result.success) {
                    const stats = result.data;
                    document.getElementById('pending-count').textContent = stats.pending;
                    document.getElementById('in-progress-count').textContent = stats.in_progress;
                    document.getElementById('completed-count').textContent = stats.completed;
                    document.getElementById('urgent-count').textContent = stats.urgent;
                    document.getElementById('total-support-count').textContent = stats.total;
                }
            } catch (error) {
                console.error('Error loading support request stats:', error);
            }
        }

        function displaySupportRequests(supportRequests) {
            const container = document.getElementById('support-requests-list');

            if (supportRequests.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-8">
                        <i class="fas fa-inbox text-gray-400 text-3xl mb-4"></i>
                        <p class="text-gray-500">No support requests found</p>
                    </div>
                `;
                return;
            }

            const html = supportRequests.map(request => {
                const statusBadge = getStatusBadge(request.status);
                const urgencyBadge = getUrgencyBadge(request.urgency);
                const projectTypeBadge = getProjectTypeBadge(request.project_type);

                return `
                    <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex-1">
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">${request.project_title}</h4>
                                <div class="flex items-center space-x-3 mb-2">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full ${statusBadge}">${request.status.replace('_', ' ').toUpperCase()}</span>
                                    <span class="px-2 py-1 text-xs font-medium rounded-full ${urgencyBadge}">${request.urgency.toUpperCase()}</span>
                                    <span class="px-2 py-1 text-xs font-medium rounded-full ${projectTypeBadge}">${request.project_type.replace('_', ' ').toUpperCase()}</span>
                                </div>
                                <div class="text-sm text-gray-600 mb-2">
                                    <strong>Client:</strong> ${request.name} (${request.email}) - ${request.country}
                                </div>
                                <div class="text-sm text-gray-600 mb-2">
                                    <strong>Timeline:</strong> ${request.expected_timeframe} | <strong>Duration:</strong> ${request.project_duration}
                                </div>
                                <p class="text-gray-700 text-sm mb-3">${request.project_description.substring(0, 200)}${request.project_description.length > 200 ? '...' : ''}</p>
                            </div>
                            <div class="flex items-center space-x-2 ml-4">
                                <button onclick="viewSupportRequest(${request.id})" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    <i class="fas fa-eye mr-1"></i>View
                                </button>
                                <button onclick="updateSupportRequestStatus(${request.id})" class="text-green-600 hover:text-green-800 text-sm font-medium">
                                    <i class="fas fa-edit mr-1"></i>Update
                                </button>
                            </div>
                        </div>
                        <div class="flex justify-between items-center text-xs text-gray-500">
                            <span>Submitted: ${new Date(request.created_at).toLocaleDateString()}</span>
                            ${request.attachments && request.attachments.length > 0 ?
                                `<span><i class="fas fa-paperclip mr-1"></i>${request.attachments.length} attachments</span>` :
                                ''
                            }
                        </div>
                    </div>
                `;
            }).join('');

            container.innerHTML = html;
        }

        function getStatusBadge(status) {
            const badges = {
                'pending': 'bg-yellow-100 text-yellow-800',
                'in_review': 'bg-blue-100 text-blue-800',
                'assigned': 'bg-purple-100 text-purple-800',
                'in_progress': 'bg-indigo-100 text-indigo-800',
                'completed': 'bg-green-100 text-green-800',
                'cancelled': 'bg-red-100 text-red-800'
            };
            return badges[status] || 'bg-gray-100 text-gray-800';
        }

        function getUrgencyBadge(urgency) {
            const badges = {
                'low': 'bg-green-100 text-green-800',
                'medium': 'bg-yellow-100 text-yellow-800',
                'high': 'bg-orange-100 text-orange-800',
                'urgent': 'bg-red-100 text-red-800'
            };
            return badges[urgency] || 'bg-gray-100 text-gray-800';
        }

        function getProjectTypeBadge(type) {
            const badges = {
                'web_development': 'bg-blue-100 text-blue-800',
                'mobile_app': 'bg-green-100 text-green-800',
                'desktop_app': 'bg-purple-100 text-purple-800',
                'api_development': 'bg-indigo-100 text-indigo-800',
                'database_design': 'bg-yellow-100 text-yellow-800',
                'bug_fixing': 'bg-red-100 text-red-800',
                'code_review': 'bg-orange-100 text-orange-800',
                'consulting': 'bg-pink-100 text-pink-800',
                'other': 'bg-gray-100 text-gray-800'
            };
            return badges[type] || 'bg-gray-100 text-gray-800';
        }

        function refreshSupportRequests() {
            loadSupportRequests();
            showNotification('Support requests refreshed', 'success');
        }

        function filterSupportRequests() {
            // This would filter the displayed requests based on status and urgency
            // For now, we'll just reload all requests
            loadSupportRequests();
        }

        function viewSupportRequest(id) {
            showNotification('Support request details viewer coming soon', 'info');
        }

        function updateSupportRequestStatus(id) {
            showNotification('Support request status update coming soon', 'info');
        }

        async function loadPayPalSettings() {
            try {
                const response = await fetch('/api/paypal/settings', {
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                });

                if (response.ok) {
                    const result = await response.json();
                    if (result.success && result.data) {
                        const settings = result.data;
                        document.getElementById('paypal-client-id').value = settings.client_id || '';
                        document.getElementById('paypal-sandbox').checked = settings.sandbox_mode;
                        document.getElementById('paypal-active').checked = settings.is_active;

                        // Don't populate client secret for security reasons
                        document.getElementById('paypal-client-secret').placeholder =
                            settings.has_client_secret ? 'Client secret is already set' : 'Enter PayPal Client Secret';
                    }
                }
            } catch (error) {
                console.error('Error loading PayPal settings:', error);
                showNotification('Error loading PayPal settings', 'error');
            }
        }

        async function savePayPalSettings(event) {
            event.preventDefault();

            const clientId = document.getElementById('paypal-client-id').value;
            const clientSecret = document.getElementById('paypal-client-secret').value;
            const sandboxMode = document.getElementById('paypal-sandbox').checked;
            const isActive = document.getElementById('paypal-active').checked;

            if (!clientId || !clientSecret) {
                showNotification('Please provide both Client ID and Client Secret', 'error');
                return;
            }

            try {
                const response = await fetch('/api/paypal/settings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + token
                    },
                    body: JSON.stringify({
                        client_id: clientId,
                        client_secret: clientSecret,
                        sandbox_mode: sandboxMode,
                        is_active: isActive
                    })
                });

                const result = await response.json();

                if (result.success) {
                    showNotification('PayPal settings saved successfully!', 'success');
                    closeSettingsModal();
                } else {
                    showNotification(result.message || 'Failed to save PayPal settings', 'error');
                }
            } catch (error) {
                console.error('Error saving PayPal settings:', error);
                showNotification('Error saving PayPal settings', 'error');
            }
        }

        // Updated subscription function with PayPal support
        async function subscribeToPayPalCourse(courseId) {
            try {
                const response = await fetch('/api/paypal/create-order', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + token
                    },
                    body: JSON.stringify({
                        course_id: courseId
                    })
                });

                const result = await response.json();

                if (result.success) {
                    // Redirect to PayPal for payment
                    window.location.href = result.approval_url;
                } else {
                    showNotification(result.message || 'Failed to create PayPal order', 'error');
                }
            } catch (error) {
                console.error('Error creating PayPal order:', error);
                showNotification('Error processing PayPal payment', 'error');
            }
        }

        // Mobile menu toggle (for future mobile responsiveness)
        function toggleMobileMenu() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        }

        // Certificate Management Functions
        let userCertificates = [];

        async function loadCertificates() {
            try {
                document.getElementById('certificates-loading').classList.remove('hidden');
                document.getElementById('no-certificates').classList.add('hidden');
                document.getElementById('certificates-grid').classList.add('hidden');

                const response = await fetch('/api/certificates', {
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                });

                if (response.ok) {
                    const result = await response.json();
                    userCertificates = result.data;
                    renderCertificates();
                } else {
                    showNotification('Failed to load certificates', 'error');
                }
            } catch (error) {
                console.error('Error loading certificates:', error);
                showNotification('Error loading certificates', 'error');
            } finally {
                document.getElementById('certificates-loading').classList.add('hidden');
            }
        }

        function renderCertificates() {
            const certificatesGrid = document.getElementById('certificates-grid');
            const noCertificates = document.getElementById('no-certificates');

            if (userCertificates.length === 0) {
                noCertificates.classList.remove('hidden');
                certificatesGrid.classList.add('hidden');
                return;
            }

            certificatesGrid.innerHTML = userCertificates.map(certificate => `
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 border border-yellow-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center">
                            <i class="fas fa-certificate text-2xl text-yellow-600 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">${certificate.course.title}</h4>
                                <p class="text-sm text-gray-600">${certificate.certificate_number}</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 text-xs rounded-full ${
                            certificate.status === 'active' ? 'bg-green-100 text-green-800' :
                            certificate.status === 'revoked' ? 'bg-red-100 text-red-800' :
                            'bg-gray-100 text-gray-800'
                        }">
                            ${certificate.status.charAt(0).toUpperCase() + certificate.status.slice(1)}
                        </span>
                    </div>

                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Completion:</span>
                            <span class="font-medium">${certificate.completion_percentage}%</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Score:</span>
                            <span class="font-medium">${certificate.final_score || 'N/A'}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Issued:</span>
                            <span class="font-medium">${new Date(certificate.issued_date).toLocaleDateString()}</span>
                        </div>
                    </div>

                    <div class="flex space-x-2">
                        <button onclick="viewCertificate(${certificate.id})"
                                class="flex-1 px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded-lg transition-colors">
                            <i class="fas fa-eye mr-1"></i>View
                        </button>
                        <button onclick="downloadCertificate(${certificate.id})"
                                class="flex-1 px-3 py-2 bg-green-500 hover:bg-green-600 text-white text-sm rounded-lg transition-colors">
                            <i class="fas fa-download mr-1"></i>Download
                        </button>
                        <button onclick="shareCertificate(${certificate.id})"
                                class="px-3 py-2 bg-purple-500 hover:bg-purple-600 text-white text-sm rounded-lg transition-colors">
                            <i class="fas fa-share-alt"></i>
                        </button>
                    </div>
                </div>
            `).join('');

            certificatesGrid.classList.remove('hidden');
            noCertificates.classList.add('hidden');
        }

        async function generateCertificate(courseId) {
            try {
                const response = await fetch(`/api/certificates/generate/${courseId}`, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Content-Type': 'application/json'
                    }
                });

                const result = await response.json();

                if (result.success) {
                    showNotification('Certificate generated successfully!', 'success');
                    loadCertificates();
                    closeGenerateCertificateModal();
                } else {
                    showNotification(result.message || 'Failed to generate certificate', 'error');
                }
            } catch (error) {
                console.error('Error generating certificate:', error);
                showNotification('Error generating certificate', 'error');
            }
        }

        async function viewCertificate(certificateId) {
            try {
                const certificate = userCertificates.find(cert => cert.id === certificateId);
                if (!certificate) return;

                const modal = document.getElementById('certificate-preview-modal');
                const content = document.getElementById('certificate-preview-content');

                content.innerHTML = `
                    <div class="certificate-template bg-gradient-to-br from-blue-50 to-purple-50 border-4 border-yellow-400 rounded-xl p-8 text-center">
                        <div class="mb-6">
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">Certificate of Completion</h1>
                            <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto rounded-full"></div>
                        </div>

                        <div class="mb-6">
                            <p class="text-lg text-gray-700 mb-2">This is to certify that</p>
                            <h2 class="text-3xl font-bold text-blue-600 mb-2">${certificate.user.name}</h2>
                            <p class="text-lg text-gray-700">has successfully completed the course</p>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-2xl font-bold text-purple-600 mb-4">${certificate.course.title}</h3>
                            <div class="grid grid-cols-2 gap-4 max-w-md mx-auto">
                                <div class="text-center">
                                    <p class="text-sm text-gray-600">Completion Date</p>
                                    <p class="font-semibold">${new Date(certificate.completion_date).toLocaleDateString()}</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-sm text-gray-600">Final Score</p>
                                    <p class="font-semibold">${certificate.final_score || 'N/A'}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <p class="text-sm text-gray-600 mb-2">Certificate Number</p>
                            <p class="font-mono text-lg font-semibold text-gray-900">${certificate.certificate_number}</p>
                        </div>

                        <div class="mb-6">
                            <p class="text-sm text-gray-600 mb-2">Verification Code</p>
                            <p class="font-mono text-sm text-gray-700">${certificate.verification_code}</p>
                        </div>

                        <div class="flex justify-center space-x-4 mt-8">
                            <button onclick="downloadCertificate(${certificate.id})"
                                    class="px-6 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors">
                                <i class="fas fa-download mr-2"></i>Download PDF
                            </button>
                            <button onclick="shareCertificate(${certificate.id})"
                                    class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors">
                                <i class="fas fa-share-alt mr-2"></i>Share
                            </button>
                        </div>
                    </div>
                `;

                modal.classList.remove('hidden');
            } catch (error) {
                console.error('Error viewing certificate:', error);
                showNotification('Error loading certificate preview', 'error');
            }
        }

        async function downloadCertificate(certificateId) {
            try {
                const response = await fetch(`/api/certificates/${certificateId}/download`, {
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                });

                if (response.ok) {
                    const result = await response.json();
                    if (result.success) {
                        // For now, we'll show a message. In a real app, you'd generate and download a PDF
                        showNotification('Certificate download feature coming soon!', 'info');
                    }
                } else {
                    showNotification('Failed to download certificate', 'error');
                }
            } catch (error) {
                console.error('Error downloading certificate:', error);
                showNotification('Error downloading certificate', 'error');
            }
        }

        function shareCertificate(certificateId) {
            const certificate = userCertificates.find(cert => cert.id === certificateId);
            if (!certificate) return;

            const verificationUrl = `${window.location.origin}/api/certificates/verify/${certificate.verification_code}`;

            if (navigator.share) {
                navigator.share({
                    title: `${certificate.user.name}'s Certificate - ${certificate.course.title}`,
                    text: `I've completed ${certificate.course.title} and earned a certificate!`,
                    url: verificationUrl
                });
            } else {
                // Fallback for browsers that don't support Web Share API
                navigator.clipboard.writeText(verificationUrl).then(() => {
                    showNotification('Verification link copied to clipboard!', 'success');
                }).catch(() => {
                    showNotification('Failed to copy verification link', 'error');
                });
            }
        }

        function refreshCertificates() {
            loadCertificates();
        }

        function closeGenerateCertificateModal() {
            document.getElementById('generate-certificate-modal').classList.add('hidden');
        }

        function closeCertificatePreviewModal() {
            document.getElementById('certificate-preview-modal').classList.add('hidden');
        }

        // Course Learning Functions
        let currentCourse = null;
        let currentLessonIndex = 0;
        let lessons = [];
        let completedLessons = new Set();
        let bookmarkedLessons = new Set();

        async function startLearning(courseId) {
            try {
                const response = await fetch(`/api/courses/${courseId}`, {
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                });

                if (response.ok) {
                    const result = await response.json();
                    currentCourse = result.data;
                    document.getElementById('learning-course-title').textContent = currentCourse.title;
                    document.getElementById('learning-course-subtitle').textContent = `${currentCourse.difficulty} • ${currentCourse.category.replace('_', ' ')}`;

                    generateLessons();
                    loadLesson(0);
                    showSection('course-learning');
                    loadUserProgress();
                } else {
                    showNotification('Failed to load course content', 'error');
                }
            } catch (error) {
                console.error('Error loading course:', error);
                showNotification('Error loading course content', 'error');
            }
        }

        function generateLessons() {
            const baseCategories = {
                'web_development': [
                    'Introduction to Web Development',
                    'HTML Fundamentals',
                    'CSS Styling and Layouts',
                    'JavaScript Basics',
                    'DOM Manipulation',
                    'Responsive Design',
                    'CSS Frameworks',
                    'JavaScript ES6+',
                    'API Integration',
                    'Project Development'
                ],
                'mobile_development': [
                    'Mobile Development Overview',
                    'Setup Development Environment',
                    'UI/UX Design Principles',
                    'Basic App Structure',
                    'Navigation Systems',
                    'State Management',
                    'API Integration',
                    'Local Storage',
                    'Testing and Debugging',
                    'App Deployment'
                ],
                'data_science': [
                    'Introduction to Data Science',
                    'Python for Data Science',
                    'Data Collection and Cleaning',
                    'Exploratory Data Analysis',
                    'Statistical Analysis',
                    'Data Visualization',
                    'Machine Learning Basics',
                    'Model Building',
                    'Model Evaluation',
                    'Real-world Projects'
                ]
            };

            const category = currentCourse.category || 'web_development';
            const lessonTitles = baseCategories[category] || baseCategories['web_development'];

            lessons = lessonTitles.map((title, index) => ({
                id: index + 1,
                title: title,
                content: generateLessonContent(title, category, index),
                estimatedTime: 45 + Math.floor(Math.random() * 30),
                exercises: []
            }));

            renderLessonList();
            updateProgress();
        }

        function generateLessonContent(title, category, index) {
            return `
                <h2 class="text-2xl font-bold mb-6 text-gray-900">${title}</h2>

                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Learning Objectives</h3>
                    <p class="mb-4 text-gray-700">In this lesson, you will learn about ${title.toLowerCase()} and how it applies to ${category.replace('_', ' ')} development.</p>

                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-4">
                        <h4 class="font-bold mb-2 text-blue-800">Key Topics Covered:</h4>
                        <ul class="list-disc list-inside space-y-1 text-blue-700">
                            <li>Core concepts and principles</li>
                            <li>Practical implementation techniques</li>
                            <li>Best practices and common patterns</li>
                            <li>Real-world examples and use cases</li>
                        </ul>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Detailed Content</h3>
                    <p class="mb-4 text-gray-700">This comprehensive lesson covers all aspects of ${title.toLowerCase()}, providing you with both theoretical knowledge and practical skills.</p>

                    <div class="space-y-4">
                        <div class="border-l-4 border-blue-500 pl-4">
                            <h4 class="font-semibold text-gray-800">Theory</h4>
                            <p class="text-sm text-gray-600">Understanding the fundamental concepts and principles</p>
                        </div>
                        <div class="border-l-4 border-green-500 pl-4">
                            <h4 class="font-semibold text-gray-800">Practice</h4>
                            <p class="text-sm text-gray-600">Hands-on exercises and coding challenges</p>
                        </div>
                        <div class="border-l-4 border-purple-500 pl-4">
                            <h4 class="font-semibold text-gray-800">Application</h4>
                            <p class="text-sm text-gray-600">Real-world projects and practical implementation</p>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Interactive Example</h3>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <code class="text-green-400 font-mono text-sm">
        // Example code for ${title}
        function example() {
            console.log("This is an example for ${title}");
            // Implementation details would go here
            return "Completed successfully";
        }

        example();
                        </code>
                    </div>
                </div>
            `;
        }

        function renderLessonList() {
            const lessonList = document.getElementById('lesson-list');
            lessonList.innerHTML = lessons.map((lesson, index) => `
                <div class="lesson-item flex items-center justify-between p-2 rounded-lg cursor-pointer transition-colors ${
                    index === currentLessonIndex ? 'bg-blue-100 border border-blue-300' : 'hover:bg-gray-100'
                }" onclick="loadLesson(${index})">
                    <div class="flex items-center space-x-2">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center text-xs ${
                            completedLessons.has(lesson.id) ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-600'
                        }">
                            ${completedLessons.has(lesson.id) ? '<i class="fas fa-check"></i>' : lesson.id}
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">${lesson.title}</p>
                            <p class="text-xs text-gray-500">${lesson.estimatedTime} min</p>
                        </div>
                    </div>
                    ${bookmarkedLessons.has(lesson.id) ? '<i class="fas fa-bookmark text-yellow-500 text-xs"></i>' : ''}
                </div>
            `).join('');

            document.getElementById('total-lessons').textContent = lessons.length;
        }

        function loadLesson(index) {
            if (index < 0 || index >= lessons.length) return;

            currentLessonIndex = index;
            const lesson = lessons[index];

            document.getElementById('lesson-content').innerHTML = lesson.content;

            // Update navigation buttons
            document.getElementById('prev-lesson').disabled = index === 0;
            document.getElementById('next-lesson').disabled = index === lessons.length - 1;

            renderLessonList();
            saveProgress();
        }

        function previousLesson() {
            if (currentLessonIndex > 0) {
                loadLesson(currentLessonIndex - 1);
            }
        }

        function nextLesson() {
            if (currentLessonIndex < lessons.length - 1) {
                loadLesson(currentLessonIndex + 1);
            }
        }

        function markAsCompleted() {
            const currentLesson = lessons[currentLessonIndex];
            completedLessons.add(currentLesson.id);
            renderLessonList();
            updateProgress();
            saveProgress();
            showNotification('Lesson marked as completed!', 'success');

            // Auto-advance to next lesson
            if (currentLessonIndex < lessons.length - 1) {
                setTimeout(() => nextLesson(), 1000);
            }
        }

        function toggleBookmark() {
            const currentLesson = lessons[currentLessonIndex];
            if (bookmarkedLessons.has(currentLesson.id)) {
                bookmarkedLessons.delete(currentLesson.id);
                showNotification('Bookmark removed', 'info');
            } else {
                bookmarkedLessons.add(currentLesson.id);
                showNotification('Lesson bookmarked!', 'success');
            }
            renderLessonList();
            saveProgress();
        }

        function updateProgress() {
            const completed = completedLessons.size;
            const total = lessons.length;
            const percentage = Math.round((completed / total) * 100);

            document.getElementById('progress-percentage').textContent = percentage + '%';
            document.getElementById('progress-bar').style.width = percentage + '%';
            document.getElementById('completed-lessons').textContent = completed;

            const remainingLessons = total - completed;
            const avgTime = 60; // Average minutes per lesson
            const remainingHours = Math.round((remainingLessons * avgTime) / 60);
            document.getElementById('time-remaining').textContent = remainingHours + ' hours';
        }

        function saveProgress() {
            if (!currentCourse) return;

            const progress = {
                courseId: currentCourse.id,
                currentLessonIndex: currentLessonIndex,
                completedLessons: Array.from(completedLessons),
                bookmarkedLessons: Array.from(bookmarkedLessons),
                lastAccessed: new Date().toISOString()
            };
            localStorage.setItem(`course_progress_${currentCourse.id}`, JSON.stringify(progress));
        }

        function loadUserProgress() {
            if (!currentCourse) return;

            const saved = localStorage.getItem(`course_progress_${currentCourse.id}`);
            if (saved) {
                const progress = JSON.parse(saved);
                currentLessonIndex = progress.currentLessonIndex || 0;
                completedLessons = new Set(progress.completedLessons || []);
                bookmarkedLessons = new Set(progress.bookmarkedLessons || []);
            }
        }

        // Tutor Bot functionality
        function toggleTutorBot() {
            const tutorBot = document.getElementById('tutor-bot');
            tutorBot.classList.toggle('hidden');
        }

        function sendMessage() {
            const input = document.getElementById('chat-input');
            const message = input.value.trim();
            if (!message) return;

            addMessage(message, 'user');
            input.value = '';

            // Simulate bot response
            setTimeout(() => {
                const response = generateBotResponse(message);
                addMessage(response, 'bot');
            }, 1000 + Math.random() * 2000);
        }

        function addMessage(text, sender) {
            const messagesContainer = document.getElementById('chat-messages');
            const messageDiv = document.createElement('div');
            messageDiv.className = 'flex items-start space-x-2';

            if (sender === 'user') {
                messageDiv.innerHTML = `
                    <div class="bg-blue-500 text-white rounded-lg p-3 max-w-xs ml-auto">
                        <p class="text-sm">${text}</p>
                    </div>
                `;
                messageDiv.classList.add('justify-end');
            } else {
                messageDiv.innerHTML = `
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-3 max-w-xs">
                        <p class="text-sm">${text}</p>
                    </div>
                `;
            }

            messagesContainer.appendChild(messageDiv);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        function generateBotResponse(message) {
            const responses = [
                "That's a great question! Let me help you with that.",
                "I understand what you're asking. Here's how I'd approach this...",
                "Good thinking! This is related to the concepts we covered in this lesson.",
                "Let me break this down for you step by step.",
                "That's exactly the kind of thinking that will make you a better developer!"
            ];
            return responses[Math.floor(Math.random() * responses.length)];
        }

        // Handle Enter key in chat input
        document.addEventListener('keypress', function(e) {
            if (e.target.id === 'chat-input' && e.key === 'Enter') {
                sendMessage();
            }
        });
    </script>
</body>
</html>