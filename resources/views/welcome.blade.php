<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zoswa - Get Coding Help & Data Analysis | Expert Development Services</title>
    <meta name="description" content="Get instant help with any programming language or data analysis project. Expert developers available 24/7 for coding assistance, web development, mobile apps, and data insights.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }

        /* Floating animations */
        .floating {
            animation: floating 6s ease-in-out infinite;
        }
        .floating-delayed {
            animation: floating 6s ease-in-out infinite;
            animation-delay: 2s;
        }
        .floating-slow {
            animation: floating 8s ease-in-out infinite;
            animation-delay: 4s;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(5deg); }
            66% { transform: translateY(-10px) rotate(-3deg); }
        }

        /* Language icon animations */
        .lang-icon {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .lang-icon:hover {
            transform: scale(1.2) rotate(10deg);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        /* Gradient background */
        .hero-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }

        /* Animated particles */
        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            animation: particle-float 20s infinite linear;
        }

        @keyframes particle-float {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
        }

        /* Form styling */
        .form-input {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            backdrop-filter: blur(10px);
        }
        .form-input::placeholder {
            color: rgba(255,255,255,0.7);
        }
        .form-input:focus {
            background: rgba(255,255,255,0.2);
            border-color: rgba(255,255,255,0.5);
            outline: none;
            box-shadow: 0 0 20px rgba(255,255,255,0.2);
        }

        /* Pulse animation */
        .pulse-grow {
            animation: pulse-grow 2s ease-in-out infinite;
        }

        @keyframes pulse-grow {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* Tech stack carousel */
        .tech-carousel {
            animation: scroll-horizontal 30s linear infinite;
        }

        @keyframes scroll-horizontal {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #667eea;
            border-radius: 4px;
        }

        /* Slider Styles */
        .expertise-slider-container {
            min-height: 600px;
        }
        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .slide.active {
            opacity: 1;
            transform: translateX(0);
            position: relative;
        }
        .slide.prev {
            transform: translateX(-100%);
        }

        /* Typing Animation */
        .typing-animation {
            overflow: hidden;
        }
        .typing-animation div {
            animation: typewriter 0.8s steps(30) forwards;
            opacity: 0;
            white-space: nowrap;
            overflow: hidden;
        }
        .typing-animation div:nth-child(1) { animation-delay: 0.2s; }
        .typing-animation div:nth-child(2) { animation-delay: 0.6s; }
        .typing-animation div:nth-child(3) { animation-delay: 1.0s; }
        .typing-animation div:nth-child(4) { animation-delay: 1.4s; }

        @keyframes typewriter {
            from {
                width: 0;
                opacity: 1;
            }
            to {
                width: 100%;
                opacity: 1;
            }
        }

        /* Chart Animation */
        .chart-bar {
            animation: chart-grow 1.5s ease-out forwards;
            transform-origin: bottom;
            transform: scaleY(0);
        }
        .chart-bar:nth-child(1) { animation-delay: 0.2s; }
        .chart-bar:nth-child(2) { animation-delay: 0.4s; }
        .chart-bar:nth-child(3) { animation-delay: 0.6s; }
        .chart-bar:nth-child(4) { animation-delay: 0.8s; }
        .chart-bar:nth-child(5) { animation-delay: 1.0s; }

        @keyframes chart-grow {
            to {
                transform: scaleY(1);
            }
        }

        /* Slide Dots */
        .slide-dot.active {
            background: white !important;
            transform: scale(1.2);
        }
    </style>
</head>
<body class="bg-gray-50 overflow-x-hidden">
    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur-lg shadow-lg fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="text-2xl font-bold text-blue-600">🚀 Zoswa</div>
                    <div class="ml-2 text-sm text-gray-600 font-medium">Expert Development Services</div>
                </div>

                <!-- Navigation Menu -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#support-form" onclick="scrollToForm()" class="text-gray-700 hover:text-blue-600 transition font-medium">
                        <i class="fas fa-headset mr-1"></i>Get Support
                    </a>
                    <a href="/courses" class="text-gray-700 hover:text-blue-600 transition font-medium">
                        <i class="fas fa-graduation-cap mr-1"></i>Learn & Enroll
                    </a>
                    <a href="/products" class="text-gray-700 hover:text-blue-600 transition font-medium">
                        <i class="fas fa-shopping-cart mr-1"></i>Products
                    </a>
                    <a href="/pricing" class="text-gray-700 hover:text-blue-600 transition font-medium">
                        <i class="fas fa-tag mr-1"></i>Pricing
                    </a>
                </div>

                <!-- Login Section -->
                <div class="flex items-center">
                    <a href="/login" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-200 font-medium">
                        <i class="fas fa-sign-in-alt mr-1"></i>Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Hero Section with Form -->
    <section class="hero-bg min-h-screen pt-16 relative">
        <!-- Animated Particles -->
        <div class="particle" style="left: 10%; width: 4px; height: 4px; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; width: 6px; height: 6px; animation-delay: 2s;"></div>
        <div class="particle" style="left: 30%; width: 3px; height: 3px; animation-delay: 4s;"></div>
        <div class="particle" style="left: 40%; width: 5px; height: 5px; animation-delay: 6s;"></div>
        <div class="particle" style="left: 50%; width: 4px; height: 4px; animation-delay: 8s;"></div>
        <div class="particle" style="left: 60%; width: 6px; height: 6px; animation-delay: 10s;"></div>
        <div class="particle" style="left: 70%; width: 3px; height: 3px; animation-delay: 12s;"></div>
        <div class="particle" style="left: 80%; width: 5px; height: 5px; animation-delay: 14s;"></div>
        <div class="particle" style="left: 90%; width: 4px; height: 4px; animation-delay: 16s;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-[calc(100vh-8rem)]">

                <!-- Professional Expertise Slider -->
                <div class="text-white relative">
                    <!-- Slider Container -->
                    <div class="expertise-slider-container relative overflow-hidden rounded-3xl">
                        <!-- Slide 1: Coding Expertise -->
                        <div class="slide active" id="slide1">
                            <div class="bg-gradient-to-br from-blue-600/30 to-purple-600/30 backdrop-blur-lg rounded-3xl p-8 border border-white/20">
                                <div class="text-center mb-6">
                                    <h2 class="text-4xl md:text-6xl font-black mb-4">
                                        🚀 <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">Master</span>
                                        <span class="bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent">Coding</span>
                                    </h2>
                                    <p class="text-xl text-blue-100 mb-6">Expert help with any programming language or framework</p>
                                </div>

                                <!-- Animated Code Display -->
                                <div class="bg-gray-900/80 rounded-2xl p-6 mb-6 font-mono text-sm">
                                    <div class="flex items-center mb-3">
                                        <div class="flex space-x-2">
                                            <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                            <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                        </div>
                                        <span class="ml-4 text-gray-400">expert_solutions.js</span>
                                    </div>
                                    <div class="typing-animation">
                                        <div class="text-blue-400">// Expert coding solutions</div>
                                        <div class="text-green-400">function <span class="text-yellow-400">solveProblem</span>() {</div>
                                        <div class="text-white ml-4">return <span class="text-orange-400">"Professional help 24/7"</span>;</div>
                                        <div class="text-green-400">}</div>
                                    </div>
                                </div>

                                <!-- Tech Stack Icons -->
                                <div class="grid grid-cols-6 gap-3 mb-6">
                                    <div class="lang-icon bg-yellow-500 p-2 rounded-lg text-center floating">
                                        <i class="fab fa-js-square text-xl text-black"></i>
                                    </div>
                                    <div class="lang-icon bg-blue-500 p-2 rounded-lg text-center floating-delayed">
                                        <i class="fab fa-react text-xl text-white"></i>
                                    </div>
                                    <div class="lang-icon bg-purple-600 p-2 rounded-lg text-center floating-slow">
                                        <i class="fab fa-php text-xl text-white"></i>
                                    </div>
                                    <div class="lang-icon bg-blue-500 p-2 rounded-lg text-center floating">
                                        <i class="fab fa-python text-xl text-white"></i>
                                    </div>
                                    <div class="lang-icon bg-red-500 p-2 rounded-lg text-center floating-delayed">
                                        <i class="fab fa-laravel text-xl text-white"></i>
                                    </div>
                                    <div class="lang-icon bg-green-600 p-2 rounded-lg text-center floating-slow">
                                        <i class="fab fa-node-js text-xl text-white"></i>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button onclick="scrollToForm()" class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-400 hover:to-red-500 text-white font-bold py-4 px-8 rounded-2xl text-lg transform hover:scale-105 transition-all duration-200 shadow-2xl pulse-grow">
                                        🆘 GET CODING HELP NOW!
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2: Data Analysis Expertise -->
                        <div class="slide" id="slide2">
                            <div class="bg-gradient-to-br from-green-600/30 to-teal-600/30 backdrop-blur-lg rounded-3xl p-8 border border-white/20">
                                <div class="text-center mb-6">
                                    <h2 class="text-4xl md:text-6xl font-black mb-4">
                                        📊 <span class="bg-gradient-to-r from-green-400 to-teal-500 bg-clip-text text-transparent">Data</span>
                                        <span class="bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">Analysis</span>
                                    </h2>
                                    <p class="text-xl text-blue-100 mb-6">Transform your data into actionable insights</p>
                                </div>

                                <!-- Animated Chart Display -->
                                <div class="bg-gray-900/80 rounded-2xl p-6 mb-6">
                                    <div class="flex items-center mb-3">
                                        <div class="flex space-x-2">
                                            <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                            <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                        </div>
                                        <span class="ml-4 text-gray-400">data_insights.py</span>
                                    </div>
                                    <!-- Animated Chart -->
                                    <div class="flex items-end space-x-2 h-20 mb-4">
                                        <div class="chart-bar bg-gradient-to-t from-blue-500 to-blue-400 w-8 rounded-t" style="height: 60%;"></div>
                                        <div class="chart-bar bg-gradient-to-t from-green-500 to-green-400 w-8 rounded-t" style="height: 80%;"></div>
                                        <div class="chart-bar bg-gradient-to-t from-yellow-500 to-yellow-400 w-8 rounded-t" style="height: 45%;"></div>
                                        <div class="chart-bar bg-gradient-to-t from-red-500 to-red-400 w-8 rounded-t" style="height: 70%;"></div>
                                        <div class="chart-bar bg-gradient-to-t from-purple-500 to-purple-400 w-8 rounded-t" style="height: 90%;"></div>
                                    </div>
                                    <div class="text-center text-green-400 font-mono">
                                        📈 Advanced Analytics • ML Models • Statistical Analysis
                                    </div>
                                </div>

                                <!-- Data Tools Icons -->
                                <div class="grid grid-cols-6 gap-3 mb-6">
                                    <div class="lang-icon bg-blue-400 p-2 rounded-lg text-center floating">
                                        <div class="text-lg text-white font-bold">R</div>
                                    </div>
                                    <div class="lang-icon bg-orange-500 p-2 rounded-lg text-center floating-delayed">
                                        <div class="text-lg">🐼</div>
                                    </div>
                                    <div class="lang-icon bg-blue-600 p-2 rounded-lg text-center floating-slow">
                                        <div class="text-lg">🧠</div>
                                    </div>
                                    <div class="lang-icon bg-green-500 p-2 rounded-lg text-center floating">
                                        <div class="text-lg">📊</div>
                                    </div>
                                    <div class="lang-icon bg-yellow-500 p-2 rounded-lg text-center floating-delayed">
                                        <div class="text-lg">⚡</div>
                                    </div>
                                    <div class="lang-icon bg-purple-500 p-2 rounded-lg text-center floating-slow">
                                        <div class="text-lg">🔬</div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button onclick="scrollToForm()" class="bg-gradient-to-r from-green-500 to-teal-600 hover:from-green-400 hover:to-teal-500 text-white font-bold py-4 px-8 rounded-2xl text-lg transform hover:scale-105 transition-all duration-200 shadow-2xl pulse-grow">
                                        📊 GET DATA ANALYSIS HELP!
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3: Full-Stack Solutions -->
                        <div class="slide" id="slide3">
                            <div class="bg-gradient-to-br from-purple-600/30 to-pink-600/30 backdrop-blur-lg rounded-3xl p-8 border border-white/20">
                                <div class="text-center mb-6">
                                    <h2 class="text-4xl md:text-6xl font-black mb-4">
                                        🌐 <span class="bg-gradient-to-r from-purple-400 to-pink-500 bg-clip-text text-transparent">Full-Stack</span>
                                        <span class="bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">Solutions</span>
                                    </h2>
                                    <p class="text-xl text-blue-100 mb-6">Complete web & mobile development expertise</p>
                                </div>

                                <!-- Animated Development Workflow -->
                                <div class="bg-gray-900/80 rounded-2xl p-6 mb-6">
                                    <div class="flex justify-between items-center">
                                        <div class="text-center">
                                            <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mb-2 mx-auto">
                                                <i class="fas fa-laptop-code text-2xl text-white"></i>
                                            </div>
                                            <div class="text-sm text-blue-300">Frontend</div>
                                        </div>
                                        <div class="flex-1 mx-4">
                                            <div class="h-1 bg-gradient-to-r from-blue-500 via-green-500 to-purple-500 rounded animate-pulse"></div>
                                        </div>
                                        <div class="text-center">
                                            <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mb-2 mx-auto">
                                                <i class="fas fa-server text-2xl text-white"></i>
                                            </div>
                                            <div class="text-sm text-green-300">Backend</div>
                                        </div>
                                        <div class="flex-1 mx-4">
                                            <div class="h-1 bg-gradient-to-r from-green-500 via-purple-500 to-orange-500 rounded animate-pulse"></div>
                                        </div>
                                        <div class="text-center">
                                            <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mb-2 mx-auto">
                                                <i class="fas fa-database text-2xl text-white"></i>
                                            </div>
                                            <div class="text-sm text-purple-300">Database</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Solution Types -->
                                <div class="grid grid-cols-3 gap-4 mb-6">
                                    <div class="text-center p-3 bg-white/10 rounded-xl">
                                        <div class="text-2xl mb-2">🌐</div>
                                        <div class="text-sm font-bold">Web Apps</div>
                                    </div>
                                    <div class="text-center p-3 bg-white/10 rounded-xl">
                                        <div class="text-2xl mb-2">📱</div>
                                        <div class="text-sm font-bold">Mobile Apps</div>
                                    </div>
                                    <div class="text-center p-3 bg-white/10 rounded-xl">
                                        <div class="text-2xl mb-2">🔗</div>
                                        <div class="text-sm font-bold">APIs</div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button onclick="scrollToForm()" class="bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-400 hover:to-pink-500 text-white font-bold py-4 px-8 rounded-2xl text-lg transform hover:scale-105 transition-all duration-200 shadow-2xl pulse-grow">
                                        🚀 GET DEVELOPMENT HELP!
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Slide Navigation Dots -->
                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-3">
                            <button class="slide-dot active w-3 h-3 bg-white rounded-full transition-all duration-300" onclick="currentSlide(1)"></button>
                            <button class="slide-dot w-3 h-3 bg-white/50 rounded-full transition-all duration-300" onclick="currentSlide(2)"></button>
                            <button class="slide-dot w-3 h-3 bg-white/50 rounded-full transition-all duration-300" onclick="currentSlide(3)"></button>
                        </div>

                        <!-- Navigation Arrows -->
                        <button class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/20 hover:bg-white/30 backdrop-blur-lg rounded-full p-3 transition-all duration-200" onclick="changeSlide(-1)">
                            <i class="fas fa-chevron-left text-white"></i>
                        </button>
                        <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/20 hover:bg-white/30 backdrop-blur-lg rounded-full p-3 transition-all duration-200" onclick="changeSlide(1)">
                            <i class="fas fa-chevron-right text-white"></i>
                        </button>
                    </div>

                    <!-- Emergency Support Banner -->
                    <div class="mt-8 bg-red-600/20 backdrop-blur-lg rounded-2xl p-6 border border-red-500/30 pulse-grow">
                        <div class="text-center">
                            <div class="text-2xl mb-2">🚨 NEED URGENT HELP? 🚨</div>
                            <div class="text-lg mb-4">Expert developers available 24/7 for emergency support</div>
                            <button onclick="scrollToForm()" class="bg-gradient-to-r from-red-500 to-red-700 hover:from-red-400 hover:to-red-600 text-white font-bold py-3 px-6 rounded-xl text-lg transform hover:scale-105 transition-all duration-200 shadow-xl">
                                🆘 GET EMERGENCY SUPPORT
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Support Request Form -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-3 shadow-2xl border border-white/20 max-h-[calc(100vh-8rem)] overflow-y-auto">
                    <div class="text-center mb-2">
                        <h2 class="text-xl font-bold text-white mb-1">🚀 Get Help Now!</h2>
                        <p class="text-blue-100 text-xs">Expert help within 24 hours</p>
                    </div>

                    <form action="/api/support-requests" method="POST" enctype="multipart/form-data" class="space-y-2" id="supportForm">
                        @csrf
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="block text-white text-xs font-semibold mb-0.5">👤 Name *</label>
                                <input type="text" name="name" required
                                       class="form-input w-full px-2 py-1.5 rounded-lg text-xs"
                                       placeholder="Your name">
                            </div>
                            <div>
                                <label class="block text-white text-xs font-semibold mb-0.5">📧 Email *</label>
                                <input type="email" name="email" required
                                       class="form-input w-full px-2 py-1.5 rounded-lg text-xs"
                                       placeholder="your@email.com">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="block text-white text-xs font-semibold mb-0.5">🌍 Country *</label>
                                <select name="country" required class="form-input w-full px-2 py-1.5 rounded-lg text-xs">
                                    <option value="">Select your country</option>
                                    <option value="Australia">🇦🇺 Australia</option>
                                    <option value="Austria">🇦🇹 Austria</option>
                                    <option value="Belgium">🇧🇪 Belgium</option>
                                    <option value="Canada">🇨🇦 Canada</option>
                                    <option value="Denmark">🇩🇰 Denmark</option>
                                    <option value="Finland">🇫🇮 Finland</option>
                                    <option value="Germany">🇩🇪 Germany</option>
                                    <option value="Ireland">🇮🇪 Ireland</option>
                                    <option value="Italy">🇮🇹 Italy</option>
                                    <option value="Netherlands">🇳🇱 Netherlands</option>
                                    <option value="New Zealand">🇳🇿 New Zealand</option>
                                    <option value="Norway">🇳🇴 Norway</option>
                                    <option value="Portugal">🇵🇹 Portugal</option>
                                    <option value="Spain">🇪🇸 Spain</option>
                                    <option value="Sweden">🇸🇪 Sweden</option>
                                    <option value="Switzerland">🇨🇭 Switzerland</option>
                                    <option value="United Kingdom">🇬🇧 United Kingdom</option>
                                    <option value="United States">🇺🇸 United States</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-white text-xs font-semibold mb-0.5">📞 Phone *</label>
                                <input type="tel" name="phone" required
                                       class="form-input w-full px-2 py-1.5 rounded-lg text-xs"
                                       placeholder="+1 (555) 123-4567"
                                       pattern="[+]?[0-9\s\-\(\)]{8,20}">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="block text-white text-xs font-semibold mb-0.5">🔧 Type *</label>
                                <select name="project_type" required class="form-input w-full px-2 py-1.5 rounded-lg text-xs">
                                    <option value="">Select service</option>
                                    <option value="web_development">🌐 Web Development</option>
                                    <option value="mobile_app">📱 Mobile App</option>
                                    <option value="desktop_app">💻 Desktop App</option>
                                    <option value="data_analysis">📊 Data Analysis</option>
                                    <option value="api_development">🔗 API Development</option>
                                    <option value="database_design">🗄️ Database Design</option>
                                    <option value="cloud_support_aws">☁️ AWS Cloud Support</option>
                                    <option value="cloud_support_azure">☁️ Microsoft Azure</option>
                                    <option value="robotics">🤖 Robotics</option>
                                    <option value="bug_fixing">🐛 Bug Fixing</option>
                                    <option value="code_review">🔍 Code Review</option>
                                    <option value="consulting">💡 Consulting</option>
                                    <option value="other">⚡ Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-white text-xs font-semibold mb-0.5">⚡ Urgency *</label>
                                <select name="urgency" required class="form-input w-full px-2 py-1.5 rounded-lg text-xs">
                                    <option value="">Select urgency</option>
                                    <option value="low">🟢 Low</option>
                                    <option value="medium">🟡 Medium</option>
                                    <option value="high">🟠 High</option>
                                    <option value="urgent">🔴 Urgent</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-white text-xs font-semibold mb-0.5">📝 Title *</label>
                            <input type="text" name="project_title" required
                                   class="form-input w-full px-2 py-1.5 rounded-lg text-xs"
                                   placeholder="Brief project title (min 10 chars)"
                                   minlength="10"
                                   maxlength="255">
                        </div>

                        <div>
                            <label class="block text-white text-xs font-semibold mb-0.5">📋 Description *</label>
                            <textarea name="project_description" rows="2" required
                                      class="form-input w-full px-2 py-1.5 rounded-lg text-xs"
                                      placeholder="Detailed description (min 50 chars) - requirements, tech, errors..."
                                      minlength="50"
                                      maxlength="2000"></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="block text-white text-xs font-semibold mb-0.5">⏰ Timeline *</label>
                                <input type="text" name="expected_timeframe" required
                                       class="form-input w-full px-2 py-1.5 rounded-lg text-xs"
                                       placeholder="1 week, ASAP">
                            </div>
                            <div>
                                <label class="block text-white text-xs font-semibold mb-0.5">🔄 Duration *</label>
                                <input type="text" name="project_duration" required
                                       class="form-input w-full px-2 py-1.5 rounded-lg text-xs"
                                       placeholder="One-time, Ongoing">
                            </div>
                        </div>

                        <div>
                            <label class="block text-white text-xs font-semibold mb-0.5">💰 Budget (USD)</label>
                            <div class="grid grid-cols-2 gap-2">
                                <input type="number" name="budget_min" min="0"
                                       class="form-input w-full px-2 py-1.5 rounded-lg text-xs"
                                       placeholder="Min ($)">
                                <input type="number" name="budget_max" min="0"
                                       class="form-input w-full px-2 py-1.5 rounded-lg text-xs"
                                       placeholder="Max ($)">
                            </div>
                        </div>

                        <div>
                            <label class="block text-white text-xs font-semibold mb-0.5">⚙️ Tech Requirements</label>
                            <textarea name="technical_requirements" rows="1"
                                      class="form-input w-full px-2 py-1.5 rounded-lg text-xs"
                                      placeholder="Technologies, frameworks (optional)"
                                      maxlength="1000"></textarea>
                        </div>

                        <!-- File Upload Section -->
                        <div>
                            <label class="block text-white text-xs font-semibold mb-0.5">📎 Files</label>
                            <div class="border border-dashed border-white/30 rounded-lg p-2 text-center hover:border-white/50">
                                <input type="file" name="attachments[]" multiple
                                       class="hidden" id="fileInput"
                                       accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.txt"
                                       onchange="updateFileList(this)">
                                <label for="fileInput" class="cursor-pointer">
                                    <div class="text-white/70 mb-1">
                                        <i class="fas fa-cloud-upload-alt text-lg"></i>
                                    </div>
                                    <div class="text-white text-xs mb-1">Upload files</div>
                                    <div class="text-white/60 text-xs">JPG, PNG, PDF, DOC, TXT (10MB max, 5 files)</div>
                                </label>
                                <div id="fileList" class="mt-1 text-left"></div>
                            </div>
                        </div>

                        <!-- Anti-Spam Verification -->
                        <div class="text-center">
                            <div class="bg-white/10 rounded-lg p-2 border border-white/20">
                                <label class="flex items-center justify-center space-x-2 cursor-pointer">
                                    <input type="checkbox" id="humanCheck" required class="w-3 h-3 text-blue-600 rounded">
                                    <span class="text-white text-xs">I'm not a robot and provide genuine details</span>
                                </label>
                            </div>
                        </div>

                        <div class="text-center pt-2">
                            <button type="submit" id="submitBtn"
                                    class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 hover:from-yellow-300 hover:via-orange-400 hover:to-red-400 text-white font-bold py-2 px-4 rounded-xl text-sm transform hover:scale-105 transition-all duration-200 shadow-xl disabled:opacity-50 disabled:cursor-not-allowed">
                                🚀 GET EXPERT HELP NOW! 🚀
                            </button>
                            <div class="text-xs text-blue-200 mt-1">⚡ Response within 24 hours!</div>
                            <div class="text-xs text-white/60 mt-1">* Required. Manually reviewed to prevent spam.</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Technologies Scrolling Banner -->
    <section class="bg-white py-4 border-t border-gray-200">
        <div class="overflow-hidden">
            <div class="tech-carousel flex space-x-8 whitespace-nowrap">
                <!-- First set -->
                <div class="flex space-x-8 items-center">
                    <span class="text-2xl">🌐 Web Development</span>
                    <span class="text-2xl">📱 Mobile Apps</span>
                    <span class="text-2xl">📊 Data Analysis</span>
                    <span class="text-2xl">🤖 AI & Machine Learning</span>
                    <span class="text-2xl">☁️ AWS & Azure</span>
                    <span class="text-2xl">🔗 API Development</span>
                    <span class="text-2xl">🗄️ Database Design</span>
                    <span class="text-2xl">🐛 Bug Fixing</span>
                    <span class="text-2xl">💡 Technical Consulting</span>
                    <span class="text-2xl">🔧 DevOps & Deployment</span>
                    <span class="text-2xl">🤖 Robotics</span>
                </div>
                <!-- Duplicate for seamless scroll -->
                <div class="flex space-x-8 items-center">
                    <span class="text-2xl">🌐 Web Development</span>
                    <span class="text-2xl">📱 Mobile Apps</span>
                    <span class="text-2xl">📊 Data Analysis</span>
                    <span class="text-2xl">🤖 AI & Machine Learning</span>
                    <span class="text-2xl">☁️ AWS & Azure</span>
                    <span class="text-2xl">🔗 API Development</span>
                    <span class="text-2xl">🗄️ Database Design</span>
                    <span class="text-2xl">🐛 Bug Fixing</span>
                    <span class="text-2xl">💡 Technical Consulting</span>
                    <span class="text-2xl">🔧 DevOps & Deployment</span>
                    <span class="text-2xl">🤖 Robotics</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="bg-gray-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold text-yellow-400 mb-2">50+</div>
                    <div class="text-gray-300">Programming Languages</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-green-400 mb-2">24/7</div>
                    <div class="text-gray-300">Expert Support</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-blue-400 mb-2">1000+</div>
                    <div class="text-gray-300">Projects Completed</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-red-400 mb-2">99%</div>
                    <div class="text-gray-300">Client Satisfaction</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="text-2xl font-bold text-blue-400 mb-4">🚀 Zoswa Development Services</div>
            <p class="text-gray-300 mb-4">Expert coding help and development services available 24/7</p>
            <div class="flex justify-center space-x-6 text-gray-400">
                <span><i class="fas fa-envelope mr-2"></i>support@zoswa.com</span>
                <span><i class="fas fa-clock mr-2"></i>24/7 Support</span>
                <span><i class="fas fa-globe mr-2"></i>Worldwide Service</span>
            </div>
            <div class="border-t border-gray-700 mt-6 pt-6 text-gray-400">
                <p>&copy; 2024 Zoswa Development Services. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Form submission handling
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();

            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;

            // Show loading state
            submitButton.innerHTML = '🔄 Submitting...';
            submitButton.disabled = true;

            const formData = new FormData(this);

            fetch('/api/support-requests', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Success animation
                    submitButton.innerHTML = '✅ SUCCESS! Check your email';
                    submitButton.className = submitButton.className.replace('from-yellow-400 via-orange-500 to-red-500', 'from-green-400 to-green-600');

                    // Show success message
                    alert('🎉 SUCCESS! Your request has been submitted successfully. We will get back to you within 24 hours. Check your email for confirmation!');
                    this.reset();

                    // Reset button after 3 seconds
                    setTimeout(() => {
                        submitButton.innerHTML = originalText;
                        submitButton.disabled = false;
                        submitButton.className = submitButton.className.replace('from-green-400 to-green-600', 'from-yellow-400 via-orange-500 to-red-500');
                    }, 3000);
                } else {
                    throw new Error('Submission failed');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                submitButton.innerHTML = '❌ Error - Try Again';
                submitButton.className = submitButton.className.replace('from-yellow-400 via-orange-500 to-red-500', 'from-red-500 to-red-700');

                alert('⚠️ There was an error submitting your request. Please try again or contact us directly.');

                // Reset button after 3 seconds
                setTimeout(() => {
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
                    submitButton.className = submitButton.className.replace('from-red-500 to-red-700', 'from-yellow-400 via-orange-500 to-red-500');
                }, 3000);
            });
        });

        // Add CSRF token to form
        if (!document.querySelector('meta[name="csrf-token"]')) {
            const meta = document.createElement('meta');
            meta.name = 'csrf-token';
            meta.content = '{{ csrf_token() }}';
            document.head.appendChild(meta);
        }

        // Language icon click effects
        document.querySelectorAll('.lang-icon').forEach(icon => {
            icon.addEventListener('click', function() {
                this.style.transform = 'scale(1.3) rotate(360deg)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 600);
            });
        });

        // Slider functionality
        let currentSlideIndex = 1;
        const totalSlides = 3;
        let autoSlideInterval;

        function showSlide(n) {
            const slides = document.querySelectorAll('.slide');
            const dots = document.querySelectorAll('.slide-dot');

            if (n > totalSlides) currentSlideIndex = 1;
            if (n < 1) currentSlideIndex = totalSlides;

            // Hide all slides
            slides.forEach((slide, index) => {
                slide.classList.remove('active', 'prev');
                if (index + 1 === currentSlideIndex) {
                    slide.classList.add('active');
                } else if (index + 1 < currentSlideIndex) {
                    slide.classList.add('prev');
                }
            });

            // Update dots
            dots.forEach((dot, index) => {
                dot.classList.remove('active');
                if (index + 1 === currentSlideIndex) {
                    dot.classList.add('active');
                }
            });

            // Restart animations for active slide
            restartAnimations();
        }

        function currentSlide(n) {
            showSlide(currentSlideIndex = n);
            resetAutoSlide();
        }

        function changeSlide(n) {
            showSlide(currentSlideIndex += n);
            resetAutoSlide();
        }

        function nextSlide() {
            showSlide(currentSlideIndex += 1);
        }

        function restartAnimations() {
            // Restart typing animations
            const activeSlide = document.querySelector('.slide.active');
            if (activeSlide) {
                const typingElements = activeSlide.querySelectorAll('.typing-animation div');
                typingElements.forEach(el => {
                    el.style.animation = 'none';
                    setTimeout(() => {
                        el.style.animation = '';
                    }, 10);
                });

                // Restart chart animations
                const chartBars = activeSlide.querySelectorAll('.chart-bar');
                chartBars.forEach(bar => {
                    bar.style.animation = 'none';
                    setTimeout(() => {
                        bar.style.animation = '';
                    }, 10);
                });
            }
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        function scrollToForm() {
            const form = document.querySelector('form');
            if (form) {
                form.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                // Add a subtle highlight effect to the form
                const formContainer = form.closest('.bg-white\\/10');
                if (formContainer) {
                    formContainer.style.boxShadow = '0 0 30px rgba(255, 255, 255, 0.3)';
                    setTimeout(() => {
                        formContainer.style.boxShadow = '';
                    }, 2000);
                }
            }
        }

        // Initialize slider when page loads
        document.addEventListener('DOMContentLoaded', function() {
            showSlide(currentSlideIndex);
            startAutoSlide();

            // Pause auto-slide on hover
            const sliderContainer = document.querySelector('.expertise-slider-container');
            if (sliderContainer) {
                sliderContainer.addEventListener('mouseenter', () => {
                    clearInterval(autoSlideInterval);
                });

                sliderContainer.addEventListener('mouseleave', () => {
                    startAutoSlide();
                });
            }

        // File upload functionality
        function updateFileList(input) {
            const fileList = document.getElementById('fileList');
            const files = Array.from(input.files);

            if (files.length === 0) {
                fileList.innerHTML = '';
                return;
            }

            if (files.length > 5) {
                alert('Maximum 5 files allowed');
                input.value = '';
                return;
            }

            let html = '<div class="text-white text-xs mt-2">Selected files:</div>';
            files.forEach((file, index) => {
                const size = (file.size / (1024 * 1024)).toFixed(2);
                if (file.size > 10 * 1024 * 1024) {
                    alert(`File "${file.name}" is too large. Maximum 10MB per file.`);
                    input.value = '';
                    return;
                }

                const icon = getFileIcon(file.type);
                html += `
                    <div class="flex items-center justify-between bg-white/10 rounded-lg p-2 mt-1">
                        <div class="flex items-center">
                            <span class="mr-2">${icon}</span>
                            <span class="text-white text-xs truncate max-w-[150px]">${file.name}</span>
                            <span class="text-white/60 text-xs ml-2">(${size}MB)</span>
                        </div>
                        <button type="button" onclick="removeFile(${index})" class="text-red-400 hover:text-red-300">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
            });
            fileList.innerHTML = html;
        }

        function getFileIcon(fileType) {
            if (fileType.startsWith('image/')) return '🖼️';
            if (fileType === 'application/pdf') return '📄';
            if (fileType.includes('word') || fileType.includes('document')) return '📝';
            return '📎';
        }

        function removeFile(index) {
            const input = document.getElementById('fileInput');
            const dt = new DataTransfer();
            const files = Array.from(input.files);

            files.forEach((file, i) => {
                if (i !== index) dt.items.add(file);
            });

            input.files = dt.files;
            updateFileList(input);
        }

        // Enhanced form validation
        function validateForm() {
            const form = document.getElementById('supportForm');
            const humanCheck = document.getElementById('humanCheck');

            // Check human verification
            if (!humanCheck.checked) {
                alert('Please confirm you are not a robot and agree to provide genuine project details.');
                humanCheck.focus();
                return false;
            }

            // Validate description length
            const description = form.project_description.value.trim();
            if (description.length < 50) {
                alert('Project description must be at least 50 characters. Please provide more details about your project.');
                form.project_description.focus();
                return false;
            }

            // Validate title length
            const title = form.project_title.value.trim();
            if (title.length < 10) {
                alert('Project title must be at least 10 characters.');
                form.project_title.focus();
                return false;
            }

            // Check for spam keywords
            const spamKeywords = ['bitcoin', 'crypto', 'investment', 'loan', 'casino', 'gambling', 'pharmacy', 'viagra'];
            const fullText = (title + ' ' + description).toLowerCase();

            for (let keyword of spamKeywords) {
                if (fullText.includes(keyword)) {
                    alert('Your message contains prohibited content. Please revise and try again.');
                    return false;
                }
            }

            return true;
        }

        // Update form submission to include validation
        document.getElementById('supportForm').addEventListener('submit', function(e) {
            e.preventDefault();

            if (!validateForm()) {
                return false;
            }

            const submitButton = document.getElementById('submitBtn');
            const originalText = submitButton.innerHTML;

            // Show loading state
            submitButton.innerHTML = '🔄 Submitting...';
            submitButton.disabled = true;

            const formData = new FormData(this);

            fetch('/api/support-requests', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    submitButton.innerHTML = '✅ SUCCESS! Check your email';
                    submitButton.className = submitButton.className.replace('from-yellow-400 via-orange-500 to-red-500', 'from-green-400 to-green-600');

                    alert('🎉 SUCCESS! Your request has been submitted successfully. We will get back to you within 24 hours. Check your email for confirmation!');
                    this.reset();
                    document.getElementById('fileList').innerHTML = '';
                    document.getElementById('humanCheck').checked = false;

                    setTimeout(() => {
                        submitButton.innerHTML = originalText;
                        submitButton.disabled = false;
                        submitButton.className = submitButton.className.replace('from-green-400 to-green-600', 'from-yellow-400 via-orange-500 to-red-500');
                    }, 3000);
                } else {
                    throw new Error(data.message || 'Submission failed');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                submitButton.innerHTML = '❌ Error - Try Again';
                submitButton.className = submitButton.className.replace('from-yellow-400 via-orange-500 to-red-500', 'from-red-500 to-red-700');

                alert('⚠️ There was an error submitting your request. Please try again or contact us directly.');

                setTimeout(() => {
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
                    submitButton.className = submitButton.className.replace('from-red-500 to-red-700', 'from-yellow-400 via-orange-500 to-red-500');
                }, 3000);
            });
        });
        });
    </script>
</body>
</html>