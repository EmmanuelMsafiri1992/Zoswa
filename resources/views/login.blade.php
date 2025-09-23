<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zoswa - Login | Expert Development Services</title>
    <meta name="description" content="Login to access your Zoswa account. Get coding help, manage projects, and access premium development services.">
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

        /* Gradient background */
        .hero-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }

        /* Particle effects */
        .particle {
            position: absolute;
            background: white;
            border-radius: 50%;
            opacity: 0.7;
            animation: particles 20s infinite linear;
        }

        @keyframes particles {
            0% { transform: translateY(100vh) rotate(0deg); }
            100% { transform: translateY(-10vh) rotate(720deg); }
        }
    </style>
</head>
<body class="bg-gray-50 overflow-x-hidden">
    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur-lg shadow-lg fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-blue-600">🚀 Zoswa</a>
                    <div class="ml-2 text-sm text-gray-600 font-medium">Expert Development Services</div>
                </div>

                <!-- Navigation Menu -->
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
                    <a href="/pricing" class="text-gray-700 hover:text-blue-600 transition font-medium">
                        <i class="fas fa-tag mr-1"></i>Pricing
                    </a>
                </div>

                <!-- Login Section -->
                <div class="flex items-center">
                    <a href="/" class="text-gray-700 hover:text-blue-600 transition font-medium mr-4">
                        <i class="fas fa-home mr-1"></i>Home
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Section -->
    <section class="hero-bg min-h-screen pt-16 relative flex items-center justify-center">
        <!-- Animated Particles -->
        <div class="particle" style="left: 10%; width: 4px; height: 4px; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; width: 6px; height: 6px; animation-delay: 2s;"></div>
        <div class="particle" style="left: 30%; width: 3px; height: 3px; animation-delay: 4s;"></div>
        <div class="particle" style="left: 40%; width: 5px; height: 5px; animation-delay: 6s;"></div>
        <div class="particle" style="left: 50%; width: 4px; height: 4px; animation-delay: 8s;"></div>
        <div class="particle" style="left: 60%; width: 5px; height: 5px; animation-delay: 10s;"></div>
        <div class="particle" style="left: 70%; width: 3px; height: 3px; animation-delay: 12s;"></div>
        <div class="particle" style="left: 80%; width: 6px; height: 6px; animation-delay: 14s;"></div>
        <div class="particle" style="left: 90%; width: 4px; height: 4px; animation-delay: 16s;"></div>

        <!-- Floating Programming Icons -->
        <div class="absolute top-20 left-20 text-white/20 floating">
            <i class="fab fa-react text-6xl"></i>
        </div>
        <div class="absolute top-40 right-20 text-white/20 floating-delayed">
            <i class="fab fa-python text-5xl"></i>
        </div>
        <div class="absolute bottom-40 left-32 text-white/20 floating-slow">
            <i class="fab fa-js-square text-4xl"></i>
        </div>
        <div class="absolute bottom-20 right-32 text-white/20 floating">
            <i class="fab fa-laravel text-5xl"></i>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-md mx-auto">
                <!-- Login Card -->
                <div class="bg-white/95 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white/20">
                    <div class="text-center mb-8">
                        <div class="text-4xl mb-4">🚀</div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h1>
                        <p class="text-gray-600">Login to access your Zoswa account</p>
                    </div>

                    <!-- Login Form -->
                    <form id="loginForm" class="space-y-6">
                        @csrf
                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope mr-1"></i>Email Address
                            </label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-gray-900 placeholder-gray-500"
                                   placeholder="Enter your email address">
                        </div>

                        <!-- Password Input -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-lock mr-1"></i>Password
                            </label>
                            <input type="password" id="password" name="password" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-gray-900 placeholder-gray-500"
                                   placeholder="Enter your password">
                        </div>

                        <!-- Login Button -->
                        <button type="submit" id="loginBtn"
                                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-6 rounded-xl font-semibold hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                        </button>
                    </form>

                    <!-- Demo Accounts -->
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
                            <button onclick="setTestAccount('admin@zoswa.com')"
                                    class="p-3 bg-red-50 border border-red-200 rounded-xl hover:bg-red-100 transition-all duration-200 text-left">
                                <div class="flex items-center space-x-2">
                                    <div class="w-6 h-6 bg-red-500 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-crown text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Admin</p>
                                        <p class="text-xs text-gray-500">Full Access</p>
                                    </div>
                                </div>
                            </button>

                            <!-- Teacher Account -->
                            <button onclick="setTestAccount('teacher@zoswa.com')"
                                    class="p-3 bg-blue-50 border border-blue-200 rounded-xl hover:bg-blue-100 transition-all duration-200 text-left">
                                <div class="flex items-center space-x-2">
                                    <div class="w-6 h-6 bg-blue-500 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-chalkboard-teacher text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Teacher</p>
                                        <p class="text-xs text-gray-500">Course Access</p>
                                    </div>
                                </div>
                            </button>

                            <!-- Client Account -->
                            <button onclick="setTestAccount('client@zoswa.com')"
                                    class="p-3 bg-green-50 border border-green-200 rounded-xl hover:bg-green-100 transition-all duration-200 text-left">
                                <div class="flex items-center space-x-2">
                                    <div class="w-6 h-6 bg-green-500 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-briefcase text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Client</p>
                                        <p class="text-xs text-gray-500">Project Access</p>
                                    </div>
                                </div>
                            </button>

                            <!-- Student Account -->
                            <button onclick="setTestAccount('student@zoswa.com')"
                                    class="p-3 bg-purple-50 border border-purple-200 rounded-xl hover:bg-purple-100 transition-all duration-200 text-left">
                                <div class="flex items-center space-x-2">
                                    <div class="w-6 h-6 bg-purple-500 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-graduation-cap text-white text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Student</p>
                                        <p class="text-xs text-gray-500">Learning Access</p>
                                    </div>
                                </div>
                            </button>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="text-xs text-gray-500">
                                <i class="fas fa-key mr-1"></i>
                                Password for all demo accounts: <span class="font-medium text-gray-700">password123</span>
                            </p>
                        </div>
                    </div>

                    <!-- Result Message -->
                    <div id="loginResult" class="mt-4 text-center text-sm"></div>

                    <!-- Back to Home -->
                    <div class="mt-6 text-center">
                        <a href="/" class="text-blue-600 hover:text-blue-700 transition font-medium">
                            <i class="fas fa-arrow-left mr-1"></i>Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Set CSRF token for all AJAX requests
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Login form handler
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const resultDiv = document.getElementById('loginResult');
            const loginBtn = document.getElementById('loginBtn');

            if (!email || !password) {
                resultDiv.innerHTML = '<span class="text-red-600 bg-red-50 px-3 py-2 rounded-lg"><i class="fas fa-exclamation-triangle mr-1"></i>Please enter both email and password</span>';
                return;
            }

            // Show loading state
            loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Signing In...';
            loginBtn.disabled = true;
            resultDiv.innerHTML = '';

            try {
                const response = await fetch('/api/auth/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password
                    })
                });

                const data = await response.json();

                if (data.success) {
                    resultDiv.innerHTML = `
                        <div class="text-green-600 bg-green-50 px-3 py-2 rounded-lg">
                            <div><i class="fas fa-check-circle mr-1"></i>Login successful! Redirecting...</div>
                            <div class="mt-1 text-xs">
                                <strong>Welcome:</strong> ${data.data.user.name} (${data.data.user.role})
                            </div>
                        </div>
                    `;

                    // Store authentication data
                    localStorage.setItem('token', data.data.access_token);
                    localStorage.setItem('user', JSON.stringify(data.data.user));

                    // Redirect to dashboard after a short delay
                    setTimeout(() => {
                        window.location.href = '/dashboard';
                    }, 1500);
                } else {
                    resultDiv.innerHTML = `<span class="text-red-600 bg-red-50 px-3 py-2 rounded-lg"><i class="fas fa-exclamation-circle mr-1"></i>${data.message}</span>`;

                    // Reset button
                    loginBtn.innerHTML = '<i class="fas fa-sign-in-alt mr-2"></i>Sign In';
                    loginBtn.disabled = false;
                }
            } catch (error) {
                resultDiv.innerHTML = `<span class="text-red-600 bg-red-50 px-3 py-2 rounded-lg"><i class="fas fa-exclamation-triangle mr-1"></i>Error: ${error.message}</span>`;

                // Reset button
                loginBtn.innerHTML = '<i class="fas fa-sign-in-alt mr-2"></i>Sign In';
                loginBtn.disabled = false;
            }
        });

        // Pre-fill demo accounts
        function setTestAccount(email) {
            document.getElementById('email').value = email;
            document.getElementById('password').value = 'password123';

            // Add visual feedback
            const button = event.currentTarget;
            button.style.transform = 'scale(0.95)';
            setTimeout(() => {
                button.style.transform = 'scale(1)';
            }, 150);
        }

        // Enter key support
        document.getElementById('password').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.getElementById('loginForm').dispatchEvent(new Event('submit'));
            }
        });

        // Input focus effects
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('transform', 'scale-105');
            });
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('transform', 'scale-105');
            });
        });
    </script>
</body>
</html>