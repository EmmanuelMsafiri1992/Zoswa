<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoswa - Master Coding & Data Analysis Through Real Projects</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .glass-effect {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .hover-lift {
            transition: transform 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen relative overflow-x-hidden">
    <!-- Fixed Header -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-effect border-b border-white/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-lg"></i>
                    </div>
                    <span class="text-2xl font-bold text-gray-900">Zoswa</span>
                </div>
                <div class="flex items-center space-x-6">
                    <nav class="hidden md:flex space-x-6">
                        <a href="#courses" class="text-gray-700 hover:text-blue-600 transition-colors">Courses</a>
                        <a href="#marketplace" class="text-gray-700 hover:text-blue-600 transition-colors">Marketplace</a>
                        <a href="#pricing" class="text-gray-700 hover:text-blue-600 transition-colors">Pricing</a>
                        <a href="#about" class="text-gray-700 hover:text-blue-600 transition-colors">About</a>
                    </nav>
                    <button onclick="openLoginModal()" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all transform hover:scale-105">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Background Elements -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-10 left-10 w-20 h-20 bg-blue-200 rounded-full opacity-20 floating-animation"></div>
        <div class="absolute top-40 right-20 w-16 h-16 bg-purple-200 rounded-full opacity-20 floating-animation" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-20 left-20 w-24 h-24 bg-indigo-200 rounded-full opacity-20 floating-animation" style="animation-delay: -4s;"></div>
        <div class="absolute bottom-40 right-10 w-12 h-12 bg-pink-200 rounded-full opacity-20 floating-animation" style="animation-delay: -1s;"></div>
    </div>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto text-center">
            <div class="fade-in">
                <h1 class="text-5xl md:text-7xl font-bold text-gray-900 mb-6 leading-tight">
                    Master <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Coding</span> &
                    <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Data Analysis</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-600 mb-8 max-w-4xl mx-auto">
                    Master in-demand skills through comprehensive self-paced learning. Access detailed materials, interactive exercises,
                    and AI-powered tutor bot assistance - everything you need to succeed independently.
                </p>
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6 max-w-4xl mx-auto mb-8">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-info-circle text-yellow-600 text-xl mr-3"></i>
                        <h3 class="text-lg font-semibold text-yellow-800">Self-Learning Platform</h3>
                    </div>
                    <p class="text-yellow-700 text-center">
                        <strong>Please note:</strong> We do not provide one-on-one support or mentorship. Our platform is designed for self-directed learning
                        with comprehensive resources, detailed documentation, and an AI tutor bot to help when you're stuck. All materials are available
                        online for independent study.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <button onclick="scrollToSection('courses')" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-8 py-4 rounded-xl text-lg font-semibold hover:from-blue-600 hover:to-purple-700 transition-all transform hover:scale-105 shadow-lg">
                        <i class="fas fa-rocket mr-2"></i>Start Learning Today
                    </button>
                    <button onclick="scrollToSection('marketplace')" class="glass-effect text-gray-700 px-8 py-4 rounded-xl text-lg font-semibold hover:shadow-lg transition-all transform hover:scale-105">
                        <i class="fas fa-handshake mr-2"></i>Find Expert Help
                    </button>
                </div>
                <div class="mt-8 flex justify-center items-center space-x-8 text-sm text-gray-500">
                    <div class="flex items-center">
                        <i class="fas fa-users text-blue-500 mr-2"></i>
                        <span>10,000+ Students</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-project-diagram text-purple-500 mr-2"></i>
                        <span>500+ Real Projects</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-star text-yellow-500 mr-2"></i>
                        <span>4.9/5 Rating</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="courses" class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Why Choose <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Zoswa?</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Experience learning that goes beyond theory. Build real applications, work on industry projects, and get personalized mentorship.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <div class="glass-effect rounded-2xl p-8 hover-lift">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-project-diagram text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Project-Based Learning</h3>
                    <p class="text-gray-600">Learn by building real applications. Every course includes hands-on projects that mirror industry challenges.</p>
                </div>

                <div class="glass-effect rounded-2xl p-8 hover-lift">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-laptop-code text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Browser-Based IDE</h3>
                    <p class="text-gray-600">Code directly in your browser with our advanced IDE. No setup required, just start coding immediately.</p>
                </div>

                <div class="glass-effect rounded-2xl p-8 hover-lift">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-robot text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">AI Tutor Bot</h3>
                    <p class="text-gray-600">Get instant help when you're stuck. Our AI tutor provides explanations, hints, and guidance 24/7 for self-directed learning.</p>
                </div>
            </div>

            <!-- Course Categories -->
            <div class="grid md:grid-cols-2 gap-8">
                <div class="glass-effect rounded-2xl p-8 hover-lift border border-blue-100">
                    <div class="flex items-start space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-code text-white text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Web Development</h3>
                            <p class="text-gray-600 mb-4">Master modern web technologies including React, Vue, Node.js, and full-stack development.</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">JavaScript</span>
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">React</span>
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Node.js</span>
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Laravel</span>
                            </div>
                            <button onclick="scrollToSection('pricing')" class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                                Explore Courses <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-2xl p-8 hover-lift border border-purple-100">
                    <div class="flex items-start space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Data Analysis & AI</h3>
                            <p class="text-gray-600 mb-4">Learn Python, machine learning, data visualization, and AI development with real datasets.</p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">Python</span>
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">Pandas</span>
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">TensorFlow</span>
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">Jupyter</span>
                            </div>
                            <button onclick="scrollToSection('pricing')" class="text-purple-600 font-semibold hover:text-purple-700 transition-colors">
                                Explore Courses <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Development Services Section -->
    <section id="marketplace" class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-blue-50 to-purple-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Professional <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Development Services</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-6">
                    Need custom software development? Submit your project requirements and get professional solutions delivered efficiently.
                    From web applications to data analysis systems - I handle complex development projects for businesses and individuals.
                </p>
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 max-w-4xl mx-auto">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-lightbulb text-blue-600 text-xl mr-3"></i>
                        <h3 class="text-lg font-semibold text-blue-800">How It Works</h3>
                    </div>
                    <div class="grid md:grid-cols-3 gap-6 text-center">
                        <div>
                            <div class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="font-bold">1</span>
                            </div>
                            <h4 class="font-semibold text-blue-800 mb-2">Submit Requirements</h4>
                            <p class="text-sm text-blue-700">Describe your project needs, timeline, and budget through our platform</p>
                        </div>
                        <div>
                            <div class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="font-bold">2</span>
                            </div>
                            <h4 class="font-semibold text-blue-800 mb-2">Get Proposal</h4>
                            <p class="text-sm text-blue-700">Receive detailed proposal with timeline and pricing within 24 hours</p>
                        </div>
                        <div>
                            <div class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="font-bold">3</span>
                            </div>
                            <h4 class="font-semibold text-blue-800 mb-2">Professional Delivery</h4>
                            <p class="text-sm text-blue-700">High-quality development with documentation and ongoing support</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-edit text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Submit Your Requirements</h3>
                                <p class="text-gray-600">Describe your project needs, timeline, and budget through our simple form.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-comments text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Free Consultation</h3>
                                <p class="text-gray-600">Get a detailed proposal with timeline and pricing within 24 hours.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-code text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Professional Development</h3>
                                <p class="text-gray-600">High-quality code delivery with ongoing support and documentation.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 space-y-4">
                        <button onclick="openLoginModal()" class="bg-gradient-to-r from-green-500 to-blue-500 text-white px-8 py-4 rounded-xl text-lg font-semibold hover:from-green-600 hover:to-blue-600 transition-all transform hover:scale-105 shadow-lg block w-full sm:w-auto">
                            <i class="fas fa-paper-plane mr-2"></i>Submit Your Project Requirements
                        </button>
                        <div class="text-sm text-gray-600">
                            <p><i class="fas fa-clock text-green-500 mr-2"></i>Get proposal within 24 hours</p>
                            <p><i class="fas fa-shield-alt text-blue-500 mr-2"></i>No upfront costs - pay only when satisfied</p>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-2xl p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Recent Projects</h3>
                    <div class="space-y-4">
                        <div class="p-4 bg-white rounded-xl border-l-4 border-green-500">
                            <div>
                                <p class="font-semibold text-gray-900">E-commerce Platform</p>
                                <p class="text-sm text-gray-600">React + Laravel • 6 weeks</p>
                                <p class="text-xs text-green-600 mt-1">✓ Delivered on time</p>
                            </div>
                        </div>
                        <div class="p-4 bg-white rounded-xl border-l-4 border-blue-500">
                            <div>
                                <p class="font-semibold text-gray-900">Data Analytics Dashboard</p>
                                <p class="text-sm text-gray-600">Python + Django • 4 weeks</p>
                                <p class="text-xs text-blue-600 mt-1">🚀 Exceeded expectations</p>
                            </div>
                        </div>
                        <div class="p-4 bg-white rounded-xl border-l-4 border-purple-500">
                            <div>
                                <p class="font-semibold text-gray-900">API Integration System</p>
                                <p class="text-sm text-gray-600">Node.js + Express • 3 weeks</p>
                                <p class="text-xs text-purple-600 mt-1">⭐ 5-star client review</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 p-4 bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl">
                        <div class="text-center">
                            <p class="text-sm font-semibold text-gray-900">Starting from</p>
                            <p class="text-2xl font-bold text-blue-600">$50/hour</p>
                            <p class="text-xs text-gray-600">Fixed-price projects available</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Grid -->
            <div class="mt-16 grid md:grid-cols-3 gap-8">
                <div class="glass-effect rounded-2xl p-6 text-center hover-lift">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-globe text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Web Development</h3>
                    <p class="text-gray-600 text-sm mb-4">Full-stack web applications, APIs, and modern frontend interfaces</p>
                    <ul class="text-xs text-gray-500 space-y-1">
                        <li>• React, Vue, Angular</li>
                        <li>• Laravel, Node.js, Django</li>
                        <li>• Database design & optimization</li>
                    </ul>
                </div>

                <div class="glass-effect rounded-2xl p-6 text-center hover-lift">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-bar text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Data Analysis</h3>
                    <p class="text-gray-600 text-sm mb-4">Data processing, visualization, and machine learning solutions</p>
                    <ul class="text-xs text-gray-500 space-y-1">
                        <li>• Python, R, SQL</li>
                        <li>• Pandas, NumPy, TensorFlow</li>
                        <li>• Interactive dashboards</li>
                    </ul>
                </div>

                <div class="glass-effect rounded-2xl p-6 text-center hover-lift">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-blue-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-cogs text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">System Integration</h3>
                    <p class="text-gray-600 text-sm mb-4">API development, third-party integrations, and automation</p>
                    <ul class="text-xs text-gray-500 space-y-1">
                        <li>• RESTful & GraphQL APIs</li>
                        <li>• Payment gateway integration</li>
                        <li>• Process automation</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Choose Your <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Learning Path</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Flexible pricing options to fit your learning goals and budget. Start free or unlock premium features.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Free Plan -->
                <div class="glass-effect rounded-2xl p-8 hover-lift border border-gray-200">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Free Explorer</h3>
                        <div class="mb-6">
                            <span class="text-4xl font-bold text-gray-900">$0</span>
                            <span class="text-gray-600">/month</span>
                        </div>
                        <ul class="space-y-3 mb-8 text-left">
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span>Access to 3 beginner courses</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span>Basic browser IDE</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span>Community support</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span>Basic project templates</span>
                            </li>
                        </ul>
                        <button onclick="openLoginModal()" class="w-full bg-gradient-to-r from-gray-500 to-gray-600 text-white py-3 rounded-xl font-semibold hover:from-gray-600 hover:to-gray-700 transition-all">
                            Get Started Free
                        </button>
                    </div>
                </div>

                <!-- Pro Plan -->
                <div class="glass-effect rounded-2xl p-8 hover-lift border-2 border-blue-500 relative">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-2 rounded-full text-sm font-semibold">Most Popular</span>
                    </div>
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Pro Developer</h3>
                        <div class="mb-6">
                            <span class="text-4xl font-bold text-gray-900">$29</span>
                            <span class="text-gray-600">/month</span>
                        </div>
                        <ul class="space-y-3 mb-8 text-left">
                            <li class="flex items-center">
                                <i class="fas fa-check text-blue-500 mr-3"></i>
                                <span>All courses and projects</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-blue-500 mr-3"></i>
                                <span>Advanced IDE with debugging</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-blue-500 mr-3"></i>
                                <span>Advanced AI tutor assistance</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-blue-500 mr-3"></i>
                                <span>Priority marketplace access</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-blue-500 mr-3"></i>
                                <span>Certificates & badges</span>
                            </li>
                        </ul>
                        <button onclick="openLoginModal()" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-3 rounded-xl font-semibold hover:from-blue-600 hover:to-purple-700 transition-all">
                            Start Pro Trial
                        </button>
                    </div>
                </div>

                <!-- Enterprise Plan -->
                <div class="glass-effect rounded-2xl p-8 hover-lift border border-purple-200">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Enterprise</h3>
                        <div class="mb-6">
                            <span class="text-4xl font-bold text-gray-900">$99</span>
                            <span class="text-gray-600">/month</span>
                        </div>
                        <ul class="space-y-3 mb-8 text-left">
                            <li class="flex items-center">
                                <i class="fas fa-check text-purple-500 mr-3"></i>
                                <span>Everything in Pro</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-purple-500 mr-3"></i>
                                <span>Custom learning tracks</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-purple-500 mr-3"></i>
                                <span>Team collaboration tools</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-purple-500 mr-3"></i>
                                <span>Advanced analytics</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-purple-500 mr-3"></i>
                                <span>Dedicated support</span>
                            </li>
                        </ul>
                        <button onclick="openLoginModal()" class="w-full bg-gradient-to-r from-purple-500 to-pink-600 text-white py-3 rounded-xl font-semibold hover:from-purple-600 hover:to-pink-700 transition-all">
                            Contact Sales
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-purple-50 to-blue-50">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8">
                Ready to <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Transform</span> Your Career?
            </h2>
            <p class="text-xl text-gray-600 mb-12 max-w-3xl mx-auto">
                Join thousands of developers who have accelerated their careers with Zoswa's project-based learning approach.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <button onclick="openLoginModal()" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-10 py-4 rounded-xl text-lg font-semibold hover:from-blue-600 hover:to-purple-700 transition-all transform hover:scale-105 shadow-lg">
                    <i class="fas fa-rocket mr-2"></i>Start Your Journey
                </button>
                <button onclick="scrollToSection('marketplace')" class="glass-effect text-gray-700 px-10 py-4 rounded-xl text-lg font-semibold hover:shadow-lg transition-all transform hover:scale-105">
                    <i class="fas fa-question-circle mr-2"></i>Learn More
                </button>
            </div>
        </div>
    </section>

    <!-- Login Modal -->
    <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="glass-effect rounded-3xl p-8 shadow-2xl max-w-md w-full max-h-screen overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Welcome Back</h3>
                <button onclick="closeLoginModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="space-y-6">
                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input id="email" name="email" type="email" required
                               class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-gray-900 placeholder-gray-500"
                               placeholder="Enter your email">
                    </div>
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input id="password" name="password" type="password" required
                               class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-gray-900 placeholder-gray-500"
                               placeholder="Enter your password">
                    </div>
                </div>

                <!-- Login Button -->
                <div>
                    <button type="button" onclick="login()"
                            class="w-full flex justify-center items-center py-3 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Sign in to Dashboard
                    </button>
                </div>
            </div>

            <!-- Test Accounts Section -->
            <div class="mt-8">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-600 font-medium">Demo Accounts</span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3">
                    <!-- Admin Account -->
                    <div onclick="setTestAccount('admin@zoswa.com')"
                         class="cursor-pointer p-4 glass-effect rounded-2xl hover:shadow-lg transition-all duration-200 transform hover:scale-105 border border-red-100">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-crown text-white text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Admin</p>
                                <p class="text-xs text-gray-500">admin@zoswa.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- Instructor Account -->
                    <div onclick="setTestAccount('instructor@zoswa.com')"
                         class="cursor-pointer p-4 glass-effect rounded-2xl hover:shadow-lg transition-all duration-200 transform hover:scale-105 border border-blue-100">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chalkboard-teacher text-white text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Instructor</p>
                                <p class="text-xs text-gray-500">instructor@zoswa.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- Student Account -->
                    <div onclick="setTestAccount('student@zoswa.com')"
                         class="cursor-pointer p-4 glass-effect rounded-2xl hover:shadow-lg transition-all duration-200 transform hover:scale-105 border border-green-100">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-white text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Student</p>
                                <p class="text-xs text-gray-500">student@zoswa.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- Client Account -->
                    <div onclick="setTestAccount('client@zoswa.com')"
                         class="cursor-pointer p-4 glass-effect rounded-2xl hover:shadow-lg transition-all duration-200 transform hover:scale-105 border border-purple-100">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-briefcase text-white text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Client</p>
                                <p class="text-xs text-gray-500">client@zoswa.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <p class="text-xs text-gray-500">
                        <i class="fas fa-key mr-1"></i>
                        Password for all demo accounts: <span class="font-medium">password123</span>
                    </p>
                </div>
            </div>

            <div id="result" class="mt-4 text-center text-sm"></div>
        </div>
    </div>

    <script>
        // Modal Functions
        function openLoginModal() {
            document.getElementById('loginModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Smooth scrolling function
        function scrollToSection(sectionId) {
            const element = document.getElementById(sectionId);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        }

        // Login function
        async function login() {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const resultDiv = document.getElementById('result');

            if (!email || !password) {
                resultDiv.innerHTML = '<span class="text-red-600">Please enter both email and password</span>';
                return;
            }

            try {
                const response = await fetch('/api/auth/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password
                    })
                });

                const data = await response.json();

                if (data.success) {
                    resultDiv.innerHTML = `
                        <div class="text-green-600">
                            <div>Login successful! Redirecting...</div>
                            <div class="mt-2 text-xs">
                                <strong>User:</strong> ${data.data.user.name} (${data.data.user.role})
                            </div>
                        </div>
                    `;
                    localStorage.setItem('token', data.data.access_token);
                    localStorage.setItem('user', JSON.stringify(data.data.user));

                    // Redirect to dashboard after a short delay
                    setTimeout(() => {
                        window.location.href = '/dashboard';
                    }, 1000);
                } else {
                    resultDiv.innerHTML = `<span class="text-red-600">${data.message}</span>`;
                }
            } catch (error) {
                resultDiv.innerHTML = `<span class="text-red-600">Error: ${error.message}</span>`;
            }
        }

        // Pre-fill for testing
        function setTestAccount(email) {
            document.getElementById('email').value = email;
            document.getElementById('password').value = 'password123';

            // Add visual feedback
            const button = event.currentTarget;
            const originalTransform = button.style.transform;
            button.style.transform = 'scale(0.95)';
            setTimeout(() => {
                button.style.transform = originalTransform;
            }, 150);
        }

        // Close modal when clicking outside
        document.addEventListener('click', function(e) {
            const modal = document.getElementById('loginModal');
            if (e.target === modal) {
                closeLoginModal();
            }
        });

        // Escape key to close modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLoginModal();
            }
        });

        // Enhance form interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Add enter key support to login modal
            const passwordInput = document.getElementById('password');
            if (passwordInput) {
                passwordInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        login();
                    }
                });
            }

            // Add loading states
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-blue-500');
                });
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-blue-500');
                });
            });

            // Add parallax effect to background elements
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const parallax = document.querySelectorAll('.floating-animation');
                const speed = 0.1;

                parallax.forEach(function(element) {
                    const yPos = -(scrolled * speed);
                    element.style.transform = 'translateY(' + yPos + 'px)';
                });
            });
        });
    </script>
</body>
</html>