<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learn & Enroll - Zoswa</title>
    <meta name="description" content="Learn programming, data analysis, and development skills with expert-led courses and hands-on projects.">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .course-card:hover { transform: translateY(-5px); }
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
                    <a href="/courses" class="text-blue-600 font-semibold border-b-2 border-blue-600">
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

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white pt-20 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-black mb-6">
                    🎓 <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">Learn</span>
                    <span class="bg-gradient-to-r from-green-400 to-blue-300 bg-clip-text text-transparent">& Grow</span>
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-3xl mx-auto">
                    Master programming, data analysis, and development skills with expert-led courses, hands-on projects, and real-world experience.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#courses" class="bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-bold py-3 px-8 rounded-full hover:shadow-lg transition">
                        🚀 Browse Courses
                    </a>
                    <a href="#mentorship" class="border-2 border-white text-white font-bold py-3 px-8 rounded-full hover:bg-white hover:text-blue-600 transition">
                        👨‍🏫 Get Mentorship
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Categories -->
    <section id="courses" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">🎯 Course Categories</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Choose from our comprehensive range of courses designed to take you from beginner to expert</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Web Development -->
                <div class="course-card bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl p-8 border border-blue-200 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-6xl mb-4">🌐</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Web Development</h3>
                        <p class="text-gray-600 mb-6">Learn HTML, CSS, JavaScript, React, Node.js, and build full-stack web applications</p>
                        <ul class="text-left text-sm text-gray-700 mb-6 space-y-2">
                            <li>✅ Frontend Development (React, Vue, Angular)</li>
                            <li>✅ Backend Development (Node.js, PHP, Python)</li>
                            <li>✅ Database Design & Management</li>
                            <li>✅ Responsive Design & UX/UI</li>
                            <li>✅ Real-world Projects & Portfolio</li>
                        </ul>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-blue-600">$299</span>
                            <button class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition">
                                Enroll Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile App Development -->
                <div class="course-card bg-gradient-to-br from-green-50 to-emerald-100 rounded-2xl p-8 border border-green-200 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-6xl mb-4">📱</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Mobile App Development</h3>
                        <p class="text-gray-600 mb-6">Build iOS and Android apps using React Native, Flutter, and native development</p>
                        <ul class="text-left text-sm text-gray-700 mb-6 space-y-2">
                            <li>✅ React Native & Flutter</li>
                            <li>✅ iOS Development (Swift)</li>
                            <li>✅ Android Development (Kotlin)</li>
                            <li>✅ App Store Publishing</li>
                            <li>✅ Mobile UI/UX Best Practices</li>
                        </ul>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-green-600">$399</span>
                            <button class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition">
                                Enroll Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Data Analysis -->
                <div class="course-card bg-gradient-to-br from-purple-50 to-violet-100 rounded-2xl p-8 border border-purple-200 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-6xl mb-4">📊</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Data Analysis</h3>
                        <p class="text-gray-600 mb-6">Master Python, R, SQL, and data visualization tools for data-driven insights</p>
                        <ul class="text-left text-sm text-gray-700 mb-6 space-y-2">
                            <li>✅ Python for Data Science</li>
                            <li>✅ SQL & Database Analytics</li>
                            <li>✅ Data Visualization (Tableau, PowerBI)</li>
                            <li>✅ Statistical Analysis & Machine Learning</li>
                            <li>✅ Real Business Case Studies</li>
                        </ul>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-purple-600">$349</span>
                            <button class="bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition">
                                Enroll Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Cloud Computing -->
                <div class="course-card bg-gradient-to-br from-orange-50 to-red-100 rounded-2xl p-8 border border-orange-200 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-6xl mb-4">☁️</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Cloud Computing</h3>
                        <p class="text-gray-600 mb-6">Learn AWS, Microsoft Azure, and Google Cloud Platform for scalable solutions</p>
                        <ul class="text-left text-sm text-gray-700 mb-6 space-y-2">
                            <li>✅ AWS Fundamentals & Certification</li>
                            <li>✅ Microsoft Azure Services</li>
                            <li>✅ DevOps & CI/CD Pipelines</li>
                            <li>✅ Serverless Architecture</li>
                            <li>✅ Cloud Security Best Practices</li>
                        </ul>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-orange-600">$449</span>
                            <button class="bg-orange-600 text-white px-6 py-2 rounded-full hover:bg-orange-700 transition">
                                Enroll Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- AI & Machine Learning -->
                <div class="course-card bg-gradient-to-br from-pink-50 to-rose-100 rounded-2xl p-8 border border-pink-200 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-6xl mb-4">🤖</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">AI & Machine Learning</h3>
                        <p class="text-gray-600 mb-6">Dive into artificial intelligence, neural networks, and advanced ML algorithms</p>
                        <ul class="text-left text-sm text-gray-700 mb-6 space-y-2">
                            <li>✅ Machine Learning Fundamentals</li>
                            <li>✅ Deep Learning & Neural Networks</li>
                            <li>✅ Natural Language Processing</li>
                            <li>✅ Computer Vision Projects</li>
                            <li>✅ TensorFlow & PyTorch</li>
                        </ul>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-pink-600">$599</span>
                            <button class="bg-pink-600 text-white px-6 py-2 rounded-full hover:bg-pink-700 transition">
                                Enroll Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Robotics -->
                <div class="course-card bg-gradient-to-br from-cyan-50 to-teal-100 rounded-2xl p-8 border border-cyan-200 transition-all duration-300">
                    <div class="text-center">
                        <div class="text-6xl mb-4">🦾</div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Robotics</h3>
                        <p class="text-gray-600 mb-6">Build and program robots using Arduino, Raspberry Pi, and advanced robotics frameworks</p>
                        <ul class="text-left text-sm text-gray-700 mb-6 space-y-2">
                            <li>✅ Arduino & Raspberry Pi Programming</li>
                            <li>✅ Sensor Integration & Control Systems</li>
                            <li>✅ Robot Operating System (ROS)</li>
                            <li>✅ Computer Vision for Robots</li>
                            <li>✅ Build Your Own Robot Project</li>
                        </ul>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-cyan-600">$499</span>
                            <button class="bg-cyan-600 text-white px-6 py-2 rounded-full hover:bg-cyan-700 transition">
                                Enroll Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mentorship Section -->
    <section id="mentorship" class="py-16 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">👨‍🏫 Personal Mentorship</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">Get one-on-one guidance from industry experts and accelerate your learning journey</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20">
                    <div class="text-center">
                        <div class="text-4xl mb-4">🎯</div>
                        <h3 class="text-xl font-bold mb-4">Career Guidance</h3>
                        <p class="text-gray-300 mb-6">Get personalized advice on career paths, skill development, and industry insights</p>
                        <div class="text-2xl font-bold text-blue-400 mb-4">$99/hour</div>
                        <button class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition w-full">
                            Book Session
                        </button>
                    </div>
                </div>

                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20">
                    <div class="text-center">
                        <div class="text-4xl mb-4">💻</div>
                        <h3 class="text-xl font-bold mb-4">Code Review</h3>
                        <p class="text-gray-300 mb-6">Have your code reviewed by experts and get feedback on best practices</p>
                        <div class="text-2xl font-bold text-green-400 mb-4">$79/hour</div>
                        <button class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition w-full">
                            Book Session
                        </button>
                    </div>
                </div>

                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20">
                    <div class="text-center">
                        <div class="text-4xl mb-4">🚀</div>
                        <h3 class="text-xl font-bold mb-4">Project Support</h3>
                        <p class="text-gray-300 mb-6">Get help with your personal projects and bring your ideas to life</p>
                        <div class="text-2xl font-bold text-purple-400 mb-4">$119/hour</div>
                        <button class="bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition w-full">
                            Book Session
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Learning Path -->
    <section class="py-16 bg-gradient-to-br from-blue-50 to-indigo-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">🛤️ Your Learning Journey</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Follow our structured path from beginner to expert</p>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-center space-y-8 md:space-y-0 md:space-x-8">
                <div class="bg-white rounded-2xl p-8 shadow-lg text-center max-w-sm">
                    <div class="text-6xl mb-4">📚</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">1. Learn Fundamentals</h3>
                    <p class="text-gray-600">Start with core concepts and build a strong foundation in your chosen field</p>
                </div>

                <div class="hidden md:block text-4xl text-blue-600">→</div>

                <div class="bg-white rounded-2xl p-8 shadow-lg text-center max-w-sm">
                    <div class="text-6xl mb-4">💻</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">2. Build Projects</h3>
                    <p class="text-gray-600">Apply your knowledge by building real-world projects and portfolio pieces</p>
                </div>

                <div class="hidden md:block text-4xl text-blue-600">→</div>

                <div class="bg-white rounded-2xl p-8 shadow-lg text-center max-w-sm">
                    <div class="text-6xl mb-4">🚀</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">3. Get Hired</h3>
                    <p class="text-gray-600">Launch your career with job placement assistance and interview preparation</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Start Your Learning Journey? 🚀</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
                Join thousands of students who have transformed their careers with our expert-led courses and mentorship programs.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/#support-form" class="bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-bold py-3 px-8 rounded-full hover:shadow-lg transition">
                    💬 Get Free Consultation
                </a>
                <button class="border-2 border-white text-white font-bold py-3 px-8 rounded-full hover:bg-white hover:text-blue-600 transition">
                    📞 Call Us: +1 (555) 123-4567
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="text-2xl font-bold text-blue-400 mb-4">🚀 Zoswa</div>
                <p class="text-gray-400 mb-4">Expert Development Services & Learning Platform</p>
                <p class="text-sm text-gray-500">&copy; 2024 Zoswa. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>