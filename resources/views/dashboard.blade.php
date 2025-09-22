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
                        <button class="relative p-2 text-gray-600 hover:text-gray-900 transition-colors">
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
                        <button class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:from-blue-600 hover:to-blue-700 transition-all duration-200 transform hover:scale-105">
                            <i class="fas fa-plus text-2xl mb-2"></i>
                            <span class="text-sm font-medium">Add Course</span>
                        </button>
                        <button class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-green-500 to-green-600 text-white hover:from-green-600 hover:to-green-700 transition-all duration-200 transform hover:scale-105">
                            <i class="fas fa-user-plus text-2xl mb-2"></i>
                            <span class="text-sm font-medium">Add User</span>
                        </button>
                        <button class="flex flex-col items-center p-4 rounded-xl bg-gradient-to-r from-purple-500 to-purple-600 text-white hover:from-purple-600 hover:to-purple-700 transition-all duration-200 transform hover:scale-105">
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

                    <!-- Users Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded-lg">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="users-table-body" class="divide-y divide-gray-200">
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                        <i class="fas fa-spinner fa-spin text-2xl mb-3"></i>
                                        <p>Loading users...</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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

            <div id="certificates-section" class="content-section hidden">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Certificates</h3>
                    <div class="text-center py-12">
                        <i class="fas fa-certificate text-4xl text-yellow-500 mb-4"></i>
                        <p class="text-gray-600">Certificate management coming soon</p>
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
                'marketplace': 'Marketplace',
                'labs': 'Code Labs',
                'certificates': 'Certificates'
            };

            const subtitles = {
                'dashboard': 'Welcome back! Here\'s what\'s happening today.',
                'courses': 'Manage and browse available courses',
                'analytics': 'View detailed analytics and reports',
                'users': 'Manage platform users and permissions',
                'marketplace': 'Browse and manage marketplace projects',
                'labs': 'Access browser-based development environments',
                'certificates': 'View and manage course certificates'
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

        // Load users data
        async function loadUsers() {
            try {
                // Simulate API call - in real implementation, this would be an actual endpoint
                const users = [
                    {
                        id: 1,
                        name: 'Admin User',
                        email: 'admin@zoswa.com',
                        role: 'admin',
                        phone: '+1 234-567-8901',
                        bio: 'System administrator',
                        is_active: true,
                        created_at: '2024-01-15T10:30:00Z'
                    },
                    {
                        id: 2,
                        name: 'John Instructor',
                        email: 'instructor@zoswa.com',
                        role: 'instructor',
                        phone: '+1 234-567-8902',
                        bio: 'Senior web development instructor',
                        is_active: true,
                        created_at: '2024-02-20T14:15:00Z'
                    },
                    {
                        id: 3,
                        name: 'Jane Student',
                        email: 'student@zoswa.com',
                        role: 'student',
                        phone: '+1 234-567-8903',
                        bio: 'Aspiring web developer',
                        is_active: true,
                        created_at: '2024-03-10T09:45:00Z'
                    },
                    {
                        id: 4,
                        name: 'Bob Client',
                        email: 'client@zoswa.com',
                        role: 'client',
                        phone: '+1 234-567-8904',
                        bio: 'Looking for development services',
                        is_active: true,
                        created_at: '2024-03-25T16:20:00Z'
                    },
                    {
                        id: 5,
                        name: 'Alice Johnson',
                        email: 'alice@example.com',
                        role: 'student',
                        phone: '+1 555-123-4567',
                        bio: 'Data science enthusiast',
                        is_active: true,
                        created_at: '2024-04-01T11:30:00Z'
                    },
                    {
                        id: 6,
                        name: 'Michael Brown',
                        email: 'michael@example.com',
                        role: 'instructor',
                        phone: '+1 555-987-6543',
                        bio: 'Machine learning expert',
                        is_active: false,
                        created_at: '2024-04-05T13:45:00Z'
                    }
                ];

                allUsers = users;
                displayUsers(allUsers);

            } catch (error) {
                console.error('Error loading users:', error);
                document.getElementById('users-table-body').innerHTML = `
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-red-500">
                            <i class="fas fa-exclamation-triangle text-2xl mb-3"></i>
                            <p>Error loading users</p>
                        </td>
                    </tr>
                `;
            }
        }

        function displayUsers(users) {
            const tableBody = document.getElementById('users-table-body');

            if (!users || users.length === 0) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            <i class="fas fa-users text-4xl mb-4"></i>
                            <p>No users found</p>
                        </td>
                    </tr>
                `;
                return;
            }

            const usersHTML = users.map(user => {
                const initials = user.name.split(' ').map(n => n[0]).join('');
                const roleColors = {
                    'admin': 'bg-red-500',
                    'instructor': 'bg-green-500',
                    'student': 'bg-blue-500',
                    'client': 'bg-purple-500'
                };
                const roleColor = roleColors[user.role] || 'bg-gray-500';

                const joinedDate = new Date(user.created_at).toLocaleDateString();
                const statusBadge = user.is_active
                    ? '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>'
                    : '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Inactive</span>';

                return `
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 ${roleColor} rounded-full flex items-center justify-center text-white text-sm font-bold mr-3">
                                    ${initials}
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">${user.name}</div>
                                    <div class="text-sm text-gray-500">${user.email}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 capitalize">
                                ${user.role}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            ${statusBadge}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            ${joinedDate}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button onclick="editUser(${user.id})" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="deleteUser(${user.id})" class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            }).join('');

            tableBody.innerHTML = usersHTML;
            document.getElementById('users-count').textContent = users.length;
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

            displayUsers(filteredUsers);
        }

        function searchUsers() {
            const searchTerm = document.getElementById('user-search').value.toLowerCase();

            if (!searchTerm) {
                displayUsers(allUsers);
                return;
            }

            const filteredUsers = allUsers.filter(user =>
                user.name.toLowerCase().includes(searchTerm) ||
                user.email.toLowerCase().includes(searchTerm) ||
                user.role.toLowerCase().includes(searchTerm)
            );

            displayUsers(filteredUsers);
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
                displayUsers(allUsers);

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
                displayUsers(allUsers);
                showNotification('User deleted successfully!', 'success');

            } catch (error) {
                console.error('Error deleting user:', error);
                showNotification('Error deleting user', 'error');
            }
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
                                <button onclick="window.open('/learn/${course.id}', '_blank')" class="px-6 py-2 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-lg hover:from-purple-600 hover:to-purple-700 transition-all duration-200 transform hover:scale-105 text-sm font-medium">
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
    </script>
</body>
</html>