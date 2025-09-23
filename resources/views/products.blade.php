<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products - Zoswa</title>
    <meta name="description" content="Discover our premium development tools, templates, and software solutions to accelerate your projects.">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .product-card:hover { transform: translateY(-5px); }
        .feature-icon { transition: all 0.3s ease; }
        .feature-icon:hover { transform: scale(1.1) rotate(10deg); }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur-lg shadow-lg fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-blue-600">🚀 Zoswa</a>
                    <div class="ml-2 text-sm text-gray-600 font-medium">Expert Development Services</div>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <a href="/#support-form" class="text-gray-700 hover:text-blue-600 transition font-medium">
                        <i class="fas fa-headset mr-1"></i>Get Support
                    </a>
                    <a href="/courses" class="text-gray-700 hover:text-blue-600 transition font-medium">
                        <i class="fas fa-graduation-cap mr-1"></i>Learn & Enroll
                    </a>
                    <a href="/products" class="text-blue-600 font-semibold border-b-2 border-blue-600">
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

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 text-white pt-20 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-black mb-6">
                    🛒 <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">Premium</span>
                    <span class="bg-gradient-to-r from-green-400 to-blue-300 bg-clip-text text-transparent">Products</span>
                </h1>
                <p class="text-xl md:text-2xl text-purple-100 mb-8 max-w-3xl mx-auto">
                    Professional development tools, templates, and software solutions to accelerate your projects and boost productivity.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#tools" class="bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-bold py-3 px-8 rounded-full hover:shadow-lg transition">
                        🔧 Browse Tools
                    </a>
                    <a href="#templates" class="border-2 border-white text-white font-bold py-3 px-8 rounded-full hover:bg-white hover:text-purple-600 transition">
                        📄 View Templates
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Development Tools -->
    <section id="tools" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">🔧 Development Tools</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Professional tools and software to streamline your development workflow</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Code Generator Pro -->
                <div class="product-card bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl p-8 border border-blue-200 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-6xl mb-4">⚡</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Code Generator Pro</h3>
                        <p class="text-gray-600 mb-6">AI-powered code generation tool that creates clean, optimized code for multiple languages</p>

                        <div class="text-left mb-6 space-y-2">
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                Supports 20+ Programming Languages
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                AI-Powered Code Optimization
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                Built-in Testing & Documentation
                            </div>
                        </div>

                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-blue-600">$199</span>
                            <span class="text-sm text-gray-500 line-through">$299</span>
                        </div>
                        <button class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition w-full">
                            Buy Now
                        </button>
                    </div>
                </div>

                <!-- API Testing Suite -->
                <div class="product-card bg-gradient-to-br from-green-50 to-emerald-100 rounded-2xl p-8 border border-green-200 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-6xl mb-4">🔗</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">API Testing Suite</h3>
                        <p class="text-gray-600 mb-6">Comprehensive API testing and monitoring platform with advanced analytics</p>

                        <div class="text-left mb-6 space-y-2">
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                Automated API Testing
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                Real-time Monitoring
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                Performance Analytics
                            </div>
                        </div>

                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-green-600">$149</span>
                            <span class="text-sm text-gray-500 line-through">$199</span>
                        </div>
                        <button class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition w-full">
                            Buy Now
                        </button>
                    </div>
                </div>

                <!-- Database Designer -->
                <div class="product-card bg-gradient-to-br from-purple-50 to-violet-100 rounded-2xl p-8 border border-purple-200 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-6xl mb-4">🗄️</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Database Designer</h3>
                        <p class="text-gray-600 mb-6">Visual database design tool with automatic SQL generation and optimization</p>

                        <div class="text-left mb-6 space-y-2">
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                Visual Database Design
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                Auto SQL Generation
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                Multiple DB Support
                            </div>
                        </div>

                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-purple-600">$129</span>
                            <span class="text-sm text-gray-500 line-through">$179</span>
                        </div>
                        <button class="bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition w-full">
                            Buy Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Templates & Themes -->
    <section id="templates" class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">📄 Templates & Themes</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Ready-to-use templates and themes for faster project development</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- React Dashboard Templates -->
                <div class="product-card bg-white rounded-2xl p-8 border border-gray-200 transition-all duration-300 shadow-lg">
                    <div class="text-center">
                        <div class="text-6xl mb-4">⚛️</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">React Dashboard Pack</h3>
                        <p class="text-gray-600 mb-6">10 premium React dashboard templates with modern design and full responsiveness</p>

                        <div class="text-left mb-6 space-y-2">
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                10 Unique Dashboard Designs
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                React 18 + TypeScript
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                Tailwind CSS Included
                            </div>
                        </div>

                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-blue-600">$89</span>
                            <span class="text-sm text-gray-500 line-through">$129</span>
                        </div>
                        <button class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition w-full">
                            Buy Now
                        </button>
                    </div>
                </div>

                <!-- E-commerce Templates -->
                <div class="product-card bg-white rounded-2xl p-8 border border-gray-200 transition-all duration-300 shadow-lg">
                    <div class="text-center">
                        <div class="text-6xl mb-4">🛍️</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">E-commerce Templates</h3>
                        <p class="text-gray-600 mb-6">Complete e-commerce solutions with shopping cart, payment integration, and admin panel</p>

                        <div class="text-left mb-6 space-y-2">
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                5 E-commerce Templates
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                Payment Gateway Ready
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                Admin Dashboard Included
                            </div>
                        </div>

                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-green-600">$149</span>
                            <span class="text-sm text-gray-500 line-through">$199</span>
                        </div>
                        <button class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition w-full">
                            Buy Now
                        </button>
                    </div>
                </div>

                <!-- Mobile App UI Kits -->
                <div class="product-card bg-white rounded-2xl p-8 border border-gray-200 transition-all duration-300 shadow-lg">
                    <div class="text-center">
                        <div class="text-6xl mb-4">📱</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Mobile UI Kits</h3>
                        <p class="text-gray-600 mb-6">Professional mobile app UI kits for iOS and Android with Figma and code files</p>

                        <div class="text-left mb-6 space-y-2">
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                15+ App UI Designs
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                Figma + React Native Code
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                iOS & Android Compatible
                            </div>
                        </div>

                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-purple-600">$119</span>
                            <span class="text-sm text-gray-500 line-through">$159</span>
                        </div>
                        <button class="bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition w-full">
                            Buy Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Software Solutions -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">💻 Custom Software Solutions</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Enterprise-grade software solutions tailored to your business needs</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Project Management System -->
                <div class="bg-gradient-to-br from-indigo-50 to-blue-100 rounded-2xl p-8 border border-indigo-200">
                    <div class="flex items-center mb-6">
                        <div class="text-4xl mr-4">📊</div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Project Management System</h3>
                            <p class="text-gray-600">Complete project tracking with team collaboration tools</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="feature-icon bg-white p-3 rounded-lg text-center">
                            <i class="fas fa-tasks text-2xl text-blue-600 mb-2"></i>
                            <div class="text-sm font-semibold">Task Management</div>
                        </div>
                        <div class="feature-icon bg-white p-3 rounded-lg text-center">
                            <i class="fas fa-users text-2xl text-green-600 mb-2"></i>
                            <div class="text-sm font-semibold">Team Collaboration</div>
                        </div>
                        <div class="feature-icon bg-white p-3 rounded-lg text-center">
                            <i class="fas fa-chart-line text-2xl text-purple-600 mb-2"></i>
                            <div class="text-sm font-semibold">Analytics</div>
                        </div>
                        <div class="feature-icon bg-white p-3 rounded-lg text-center">
                            <i class="fas fa-calendar text-2xl text-orange-600 mb-2"></i>
                            <div class="text-sm font-semibold">Scheduling</div>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-indigo-600">Starting at $2,499</span>
                        <button class="bg-indigo-600 text-white px-6 py-2 rounded-full hover:bg-indigo-700 transition">
                            Get Quote
                        </button>
                    </div>
                </div>

                <!-- CRM Solution -->
                <div class="bg-gradient-to-br from-emerald-50 to-green-100 rounded-2xl p-8 border border-emerald-200">
                    <div class="flex items-center mb-6">
                        <div class="text-4xl mr-4">🤝</div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Custom CRM Solution</h3>
                            <p class="text-gray-600">Customer relationship management tailored to your business</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="feature-icon bg-white p-3 rounded-lg text-center">
                            <i class="fas fa-address-book text-2xl text-blue-600 mb-2"></i>
                            <div class="text-sm font-semibold">Contact Management</div>
                        </div>
                        <div class="feature-icon bg-white p-3 rounded-lg text-center">
                            <i class="fas fa-chart-pie text-2xl text-green-600 mb-2"></i>
                            <div class="text-sm font-semibold">Sales Pipeline</div>
                        </div>
                        <div class="feature-icon bg-white p-3 rounded-lg text-center">
                            <i class="fas fa-envelope text-2xl text-purple-600 mb-2"></i>
                            <div class="text-sm font-semibold">Email Integration</div>
                        </div>
                        <div class="feature-icon bg-white p-3 rounded-lg text-center">
                            <i class="fas fa-mobile-alt text-2xl text-orange-600 mb-2"></i>
                            <div class="text-sm font-semibold">Mobile App</div>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-emerald-600">Starting at $1,999</span>
                        <button class="bg-emerald-600 text-white px-6 py-2 rounded-full hover:bg-emerald-700 transition">
                            Get Quote
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bundle Offers -->
    <section class="py-16 bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">🎁 Bundle Offers</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">Save big with our product bundles and get everything you need</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Developer Bundle -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20">
                    <div class="text-center">
                        <div class="text-6xl mb-4">🔥</div>
                        <h3 class="text-2xl font-bold mb-4">Complete Developer Bundle</h3>
                        <p class="text-gray-300 mb-6">All development tools + templates + 3 months support</p>

                        <div class="text-left mb-6 space-y-2 text-sm">
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                Code Generator Pro ($199)
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                API Testing Suite ($149)
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                Database Designer ($129)
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                All Template Packs ($357)
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                3 Months Priority Support ($99)
                            </div>
                        </div>

                        <div class="text-center mb-6">
                            <div class="text-3xl font-bold text-yellow-400 mb-2">$599</div>
                            <div class="text-lg text-gray-400 line-through">$933</div>
                            <div class="text-green-400 font-semibold">Save $334 (36%)</div>
                        </div>

                        <button class="bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-bold py-3 px-8 rounded-full hover:shadow-lg transition w-full">
                            Get Bundle Now
                        </button>
                    </div>
                </div>

                <!-- Startup Bundle -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20">
                    <div class="text-center">
                        <div class="text-6xl mb-4">🚀</div>
                        <h3 class="text-2xl font-bold mb-4">Startup Essentials Bundle</h3>
                        <p class="text-gray-300 mb-6">Perfect starter pack for new businesses and entrepreneurs</p>

                        <div class="text-left mb-6 space-y-2 text-sm">
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                React Dashboard Pack ($89)
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                E-commerce Templates ($149)
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                Mobile UI Kits ($119)
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                API Testing Suite ($149)
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-400 mr-2"></i>
                                1 Month Support ($39)
                            </div>
                        </div>

                        <div class="text-center mb-6">
                            <div class="text-3xl font-bold text-yellow-400 mb-2">$399</div>
                            <div class="text-lg text-gray-400 line-through">$545</div>
                            <div class="text-green-400 font-semibold">Save $146 (27%)</div>
                        </div>

                        <button class="bg-gradient-to-r from-purple-500 to-pink-600 text-white font-bold py-3 px-8 rounded-full hover:shadow-lg transition w-full">
                            Get Bundle Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Boost Your Productivity? 🚀</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
                Get professional tools and templates that will save you hundreds of development hours.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/#support-form" class="bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-bold py-3 px-8 rounded-full hover:shadow-lg transition">
                    💬 Get Custom Quote
                </a>
                <button class="border-2 border-white text-white font-bold py-3 px-8 rounded-full hover:bg-white hover:text-blue-600 transition">
                    📞 Call Sales: +1 (555) 123-4567
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="text-2xl font-bold text-blue-400 mb-4">🚀 Zoswa</div>
                <p class="text-gray-400 mb-4">Expert Development Services & Premium Products</p>
                <p class="text-sm text-gray-500">&copy; 2024 Zoswa. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>