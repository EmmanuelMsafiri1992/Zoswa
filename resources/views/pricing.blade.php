<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pricing - Zoswa</title>
    <meta name="description" content="Transparent pricing for our development services, courses, products, and support plans. Find the perfect plan for your needs.">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .pricing-card:hover { transform: translateY(-5px); }
        .popular-badge {
            animation: pulse 2s infinite;
        }
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
                    <a href="/products" class="text-gray-700 hover:text-blue-600 transition font-medium">
                        <i class="fas fa-shopping-cart mr-1"></i>Products
                    </a>
                    <a href="/pricing" class="text-blue-600 font-semibold border-b-2 border-blue-600">
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
    <section class="bg-gradient-to-br from-emerald-600 via-teal-600 to-cyan-600 text-white pt-20 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-black mb-6">
                    💰 <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">Simple</span>
                    <span class="bg-gradient-to-r from-pink-400 to-red-400 bg-clip-text text-transparent">Pricing</span>
                </h1>
                <p class="text-xl md:text-2xl text-teal-100 mb-8 max-w-3xl mx-auto">
                    Transparent, fair pricing for all our services. No hidden fees, no surprises. Choose what works best for you.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#development" class="bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-bold py-3 px-8 rounded-full hover:shadow-lg transition">
                        🔧 Development Services
                    </a>
                    <a href="#courses" class="border-2 border-white text-white font-bold py-3 px-8 rounded-full hover:bg-white hover:text-teal-600 transition">
                        📚 Course Pricing
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Development Services Pricing -->
    <section id="development" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">🔧 Development Services</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Professional development services with transparent hourly rates and project-based pricing</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Basic Support -->
                <div class="pricing-card bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl p-8 border border-blue-200 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-4xl mb-4">🛠️</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Basic Support</h3>
                        <p class="text-gray-600 mb-6">Perfect for small fixes and quick consultations</p>

                        <div class="text-4xl font-black text-blue-600 mb-6">
                            $75<span class="text-lg font-normal text-gray-500">/hour</span>
                        </div>

                        <ul class="text-left space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Bug fixes and small features
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Code review and optimization
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Technical consultation
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Email support
                            </li>
                        </ul>

                        <button class="bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition w-full font-semibold">
                            Get Started
                        </button>
                    </div>
                </div>

                <!-- Professional Development -->
                <div class="pricing-card bg-gradient-to-br from-purple-50 to-indigo-100 rounded-2xl p-8 border-2 border-purple-300 transition-all duration-300 relative">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="popular-badge bg-gradient-to-r from-purple-600 to-pink-600 text-white px-4 py-2 rounded-full text-sm font-bold">
                            🌟 MOST POPULAR
                        </span>
                    </div>

                    <div class="text-center">
                        <div class="text-4xl mb-4">🚀</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Professional</h3>
                        <p class="text-gray-600 mb-6">Full-scale development projects and ongoing support</p>

                        <div class="text-4xl font-black text-purple-600 mb-6">
                            $120<span class="text-lg font-normal text-gray-500">/hour</span>
                        </div>

                        <ul class="text-left space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Full application development
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Database design & optimization
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                API development & integration
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Priority support (4 hours response)
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Video consultations included
                            </li>
                        </ul>

                        <button class="bg-purple-600 text-white px-6 py-3 rounded-full hover:bg-purple-700 transition w-full font-semibold">
                            Get Started
                        </button>
                    </div>
                </div>

                <!-- Enterprise -->
                <div class="pricing-card bg-gradient-to-br from-orange-50 to-red-100 rounded-2xl p-8 border border-orange-200 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-4xl mb-4">🏢</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Enterprise</h3>
                        <p class="text-gray-600 mb-6">Large-scale projects with dedicated team support</p>

                        <div class="text-4xl font-black text-orange-600 mb-6">
                            $200<span class="text-lg font-normal text-gray-500">/hour</span>
                        </div>

                        <ul class="text-left space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Dedicated development team
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Enterprise-grade solutions
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                24/7 priority support
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Project management included
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Custom SLA agreements
                            </li>
                        </ul>

                        <button class="bg-orange-600 text-white px-6 py-3 rounded-full hover:bg-orange-700 transition w-full font-semibold">
                            Contact Sales
                        </button>
                    </div>
                </div>
            </div>

            <!-- Project-Based Pricing -->
            <div class="mt-16 bg-gray-100 rounded-2xl p-8">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">📋 Project-Based Pricing</h3>
                    <p class="text-gray-600">Fixed pricing for common project types</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white rounded-lg p-6 text-center">
                        <div class="text-3xl mb-2">🌐</div>
                        <h4 class="font-bold text-gray-900 mb-2">Simple Website</h4>
                        <div class="text-2xl font-bold text-blue-600 mb-2">$2,500</div>
                        <p class="text-sm text-gray-600">5-10 pages, responsive design</p>
                    </div>

                    <div class="bg-white rounded-lg p-6 text-center">
                        <div class="text-3xl mb-2">🛍️</div>
                        <h4 class="font-bold text-gray-900 mb-2">E-commerce Site</h4>
                        <div class="text-2xl font-bold text-green-600 mb-2">$8,500</div>
                        <p class="text-sm text-gray-600">Full online store with payment</p>
                    </div>

                    <div class="bg-white rounded-lg p-6 text-center">
                        <div class="text-3xl mb-2">📱</div>
                        <h4 class="font-bold text-gray-900 mb-2">Mobile App</h4>
                        <div class="text-2xl font-bold text-purple-600 mb-2">$15,000</div>
                        <p class="text-sm text-gray-600">iOS & Android app development</p>
                    </div>

                    <div class="bg-white rounded-lg p-6 text-center">
                        <div class="text-3xl mb-2">🤖</div>
                        <h4 class="font-bold text-gray-900 mb-2">Custom Software</h4>
                        <div class="text-2xl font-bold text-orange-600 mb-2">$25,000+</div>
                        <p class="text-sm text-gray-600">Enterprise business solutions</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Pricing -->
    <section id="courses" class="py-16 bg-gradient-to-br from-indigo-50 to-purple-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">📚 Course Pricing</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Comprehensive learning packages to advance your skills</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Individual Course -->
                <div class="pricing-card bg-white rounded-2xl p-8 border border-gray-200 transition-all duration-300 shadow-lg">
                    <div class="text-center">
                        <div class="text-4xl mb-4">📖</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Single Course</h3>
                        <p class="text-gray-600 mb-6">Perfect for learning specific skills</p>

                        <div class="text-4xl font-black text-blue-600 mb-6">
                            $299<span class="text-lg font-normal text-gray-500"> - $599</span>
                        </div>

                        <ul class="text-left space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Complete course content
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Hands-on projects
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Certificate of completion
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                6 months access
                            </li>
                        </ul>

                        <button class="bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition w-full font-semibold">
                            Browse Courses
                        </button>
                    </div>
                </div>

                <!-- Course Bundle -->
                <div class="pricing-card bg-gradient-to-br from-purple-50 to-pink-100 rounded-2xl p-8 border-2 border-purple-300 transition-all duration-300 relative">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="popular-badge bg-gradient-to-r from-purple-600 to-pink-600 text-white px-4 py-2 rounded-full text-sm font-bold">
                            🎓 BEST VALUE
                        </span>
                    </div>

                    <div class="text-center">
                        <div class="text-4xl mb-4">📚</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Course Bundle</h3>
                        <p class="text-gray-600 mb-6">3-5 related courses with mentorship</p>

                        <div class="text-4xl font-black text-purple-600 mb-6">
                            $899<span class="text-lg font-normal text-gray-500"> - $1,499</span>
                        </div>

                        <ul class="text-left space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                3-5 comprehensive courses
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Personal mentorship sessions
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Career guidance & job prep
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                12 months access
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Save up to 40%
                            </li>
                        </ul>

                        <button class="bg-purple-600 text-white px-6 py-3 rounded-full hover:bg-purple-700 transition w-full font-semibold">
                            View Bundles
                        </button>
                    </div>
                </div>

                <!-- Full Program -->
                <div class="pricing-card bg-gradient-to-br from-emerald-50 to-teal-100 rounded-2xl p-8 border border-emerald-200 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-4xl mb-4">🎯</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Full Program</h3>
                        <p class="text-gray-600 mb-6">Complete career transformation program</p>

                        <div class="text-4xl font-black text-emerald-600 mb-6">
                            $2,999<span class="text-lg font-normal text-gray-500"> - $4,999</span>
                        </div>

                        <ul class="text-left space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                All courses in specialization
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Weekly 1-on-1 mentorship
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Portfolio development
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Job placement assistance
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Lifetime access & updates
                            </li>
                        </ul>

                        <button class="bg-emerald-600 text-white px-6 py-3 rounded-full hover:bg-emerald-700 transition w-full font-semibold">
                            Learn More
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support Plans -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">🛠️ Support Plans</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Ongoing support and maintenance for your applications</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Basic Support Plan -->
                <div class="pricing-card bg-gradient-to-br from-gray-50 to-slate-100 rounded-2xl p-8 border border-gray-200 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-4xl mb-4">📞</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Basic Support</h3>
                        <p class="text-gray-600 mb-6">Essential support for small projects</p>

                        <div class="text-4xl font-black text-gray-600 mb-6">
                            $199<span class="text-lg font-normal text-gray-500">/month</span>
                        </div>

                        <ul class="text-left space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Email support (24h response)
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Bug fixes & minor updates
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                5 hours of support per month
                            </li>
                        </ul>

                        <button class="bg-gray-600 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition w-full font-semibold">
                            Get Started
                        </button>
                    </div>
                </div>

                <!-- Professional Support Plan -->
                <div class="pricing-card bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl p-8 border-2 border-blue-300 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-4xl mb-4">🚀</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Professional</h3>
                        <p class="text-gray-600 mb-6">Comprehensive support with priority access</p>

                        <div class="text-4xl font-black text-blue-600 mb-6">
                            $499<span class="text-lg font-normal text-gray-500">/month</span>
                        </div>

                        <ul class="text-left space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Priority support (4h response)
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Phone & video consultation
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                15 hours of support per month
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Monthly health check reports
                            </li>
                        </ul>

                        <button class="bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition w-full font-semibold">
                            Get Started
                        </button>
                    </div>
                </div>

                <!-- Enterprise Support Plan -->
                <div class="pricing-card bg-gradient-to-br from-purple-50 to-violet-100 rounded-2xl p-8 border border-purple-200 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-4xl mb-4">🏢</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Enterprise</h3>
                        <p class="text-gray-600 mb-6">24/7 support with dedicated team</p>

                        <div class="text-4xl font-black text-purple-600 mb-6">
                            $1,299<span class="text-lg font-normal text-gray-500">/month</span>
                        </div>

                        <ul class="text-left space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                24/7 critical support
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Dedicated support team
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                40 hours of support per month
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                Custom SLA agreements
                            </li>
                        </ul>

                        <button class="bg-purple-600 text-white px-6 py-3 rounded-full hover:bg-purple-700 transition w-full font-semibold">
                            Contact Sales
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">❓ Frequently Asked Questions</h2>
                <p class="text-xl text-gray-600">Get answers to common pricing questions</p>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Do you offer custom pricing for large projects?</h3>
                    <p class="text-gray-600">Yes! For enterprise projects over $50,000, we provide custom pricing and dedicated project management. Contact our sales team for a personalized quote.</p>
                </div>

                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">What payment methods do you accept?</h3>
                    <p class="text-gray-600">We accept all major credit cards, PayPal, bank transfers, and for enterprise clients, we can work with purchase orders and invoicing.</p>
                </div>

                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Is there a money-back guarantee?</h3>
                    <p class="text-gray-600">Yes! We offer a 30-day money-back guarantee for all courses and a satisfaction guarantee for development work. If you're not happy, we'll make it right.</p>
                </div>

                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Can I upgrade or downgrade my support plan?</h3>
                    <p class="text-gray-600">Absolutely! You can change your support plan at any time. Upgrades take effect immediately, and downgrades will take effect at your next billing cycle.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-br from-teal-600 via-cyan-600 to-blue-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Get Started? 🚀</h2>
            <p class="text-xl text-teal-100 mb-8 max-w-3xl mx-auto">
                Choose the plan that's right for you, or contact us for a custom solution tailored to your specific needs.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/#support-form" class="bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-bold py-3 px-8 rounded-full hover:shadow-lg transition">
                    💬 Get Free Consultation
                </a>
                <button class="border-2 border-white text-white font-bold py-3 px-8 rounded-full hover:bg-white hover:text-teal-600 transition">
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
                <p class="text-gray-400 mb-4">Expert Development Services with Transparent Pricing</p>
                <p class="text-sm text-gray-500">&copy; 2024 Zoswa. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>