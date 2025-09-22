<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoswa - Learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .learning-content {
            max-height: 70vh;
            overflow-y: auto;
        }

        .learning-content::-webkit-scrollbar {
            width: 8px;
        }

        .learning-content::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        .learning-content::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 4px;
        }

        .learning-content::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        .code-block {
            background: #1a1a1a;
            border-radius: 8px;
            padding: 1rem;
            margin: 1rem 0;
            overflow-x: auto;
        }

        .code-block code {
            color: #f8f8f2;
            font-family: 'Courier New', monospace;
        }

        .lesson-nav {
            position: fixed;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 40;
        }

        @media (max-width: 1024px) {
            .lesson-nav {
                position: static;
                transform: none;
                margin-bottom: 2rem;
            }
        }

        .chat-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 350px;
            height: 500px;
            z-index: 50;
        }

        .chat-messages {
            max-height: 350px;
            overflow-y: auto;
        }

        .typing-indicator {
            display: none;
        }

        .typing-indicator.show {
            display: block;
        }
    </style>
</head>
<body class="gradient-bg min-h-screen">
    <!-- Navigation -->
    <nav class="glass-effect border-b border-white/20 p-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="/dashboard" class="text-white hover:text-blue-200 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
                </a>
                <div class="text-white">
                    <h1 class="text-xl font-bold" id="course-title">Loading Course...</h1>
                    <p class="text-sm opacity-75" id="lesson-progress">Lesson 1 of 10</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button onclick="toggleTutorBot()" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-robot mr-2"></i>Tutor Bot
                </button>
                <button onclick="logout()" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </button>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-6">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Lesson Navigation -->
            <div class="lg:col-span-1">
                <div class="glass-effect rounded-xl p-6 mb-6">
                    <h3 class="text-white text-lg font-bold mb-4">
                        <i class="fas fa-list mr-2"></i>Course Content
                    </h3>
                    <div id="lesson-list" class="space-y-2">
                        <!-- Lessons will be loaded here -->
                    </div>
                </div>

                <!-- Progress Card -->
                <div class="glass-effect rounded-xl p-6">
                    <h3 class="text-white text-lg font-bold mb-4">
                        <i class="fas fa-chart-line mr-2"></i>Your Progress
                    </h3>
                    <div class="space-y-3">
                        <div>
                            <div class="flex justify-between text-white text-sm mb-1">
                                <span>Course Progress</span>
                                <span id="progress-percentage">0%</span>
                            </div>
                            <div class="bg-white/20 rounded-full h-2">
                                <div id="progress-bar" class="bg-green-500 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                            </div>
                        </div>
                        <div class="text-white text-sm">
                            <p><span id="completed-lessons">0</span> of <span id="total-lessons">0</span> lessons completed</p>
                            <p>Estimated time remaining: <span id="time-remaining">-- hours</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Learning Content -->
            <div class="lg:col-span-3">
                <div class="glass-effect rounded-xl p-8">
                    <div id="lesson-content" class="learning-content text-white">
                        <!-- Lesson content will be loaded here -->
                        <div class="text-center py-12">
                            <i class="fas fa-spinner fa-spin text-4xl text-white/50 mb-4"></i>
                            <p class="text-white/70">Loading lesson content...</p>
                        </div>
                    </div>

                    <!-- Lesson Navigation -->
                    <div class="flex justify-between items-center mt-8 pt-6 border-t border-white/20">
                        <button id="prev-lesson" onclick="previousLesson()" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                            <i class="fas fa-arrow-left mr-2"></i>Previous
                        </button>

                        <div class="flex items-center space-x-4">
                            <button onclick="markAsCompleted()" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition-colors">
                                <i class="fas fa-check mr-2"></i>Mark Complete
                            </button>
                            <button onclick="toggleBookmark()" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-bookmark"></i>
                            </button>
                        </div>

                        <button id="next-lesson" onclick="nextLesson()" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors">
                            Next<i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tutor Bot Chat -->
    <div id="tutor-bot" class="chat-container glass-effect rounded-xl hidden">
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

        <div class="bg-white p-4 chat-messages">
            <div id="chat-messages" class="space-y-3">
                <div class="flex items-start space-x-2">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-3 max-w-xs">
                        <p class="text-sm">Hi! I'm your tutor bot. I'm here to help you with any questions about this course. How can I assist you today?</p>
                    </div>
                </div>
            </div>
            <div id="typing-indicator" class="typing-indicator flex items-center space-x-2 mt-3">
                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="bg-gray-100 rounded-lg p-3">
                    <div class="flex space-x-1">
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
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

    <script>
        const courseId = {{ $course }};
        let currentCourse = null;
        let currentLessonIndex = 0;
        let lessons = [];
        let completedLessons = new Set();
        let bookmarkedLessons = new Set();

        // Load user data and course content on page load
        document.addEventListener('DOMContentLoaded', function() {
            const token = localStorage.getItem('token');
            if (!token) {
                window.location.href = '/login';
                return;
            }
            loadCourseContent();
            loadUserProgress();
        });

        async function loadCourseContent() {
            try {
                const token = localStorage.getItem('token');
                const response = await fetch(`/api/courses/${courseId}`, {
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                });

                if (response.ok) {
                    const result = await response.json();
                    currentCourse = result.data;
                    document.getElementById('course-title').textContent = currentCourse.title;
                    generateLessons();
                    loadLesson(0);
                } else {
                    showNotification('Failed to load course content', 'error');
                }
            } catch (error) {
                console.error('Error loading course:', error);
                showNotification('Error loading course content', 'error');
            }
        }

        function generateLessons() {
            // Generate comprehensive lessons based on course content
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
                estimatedTime: 45 + Math.floor(Math.random() * 30), // 45-75 minutes
                exercises: generateExercises(title, category)
            }));

            renderLessonList();
            updateProgress();
        }

        function generateLessonContent(title, category, index) {
            const contentTemplates = {
                'Introduction to Web Development': `
                    <h2 class="text-2xl font-bold mb-6">${title}</h2>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3">What is Web Development?</h3>
                        <p class="mb-4">Web development is the process of creating websites and web applications. It involves both the visual aspects (frontend) and the server-side logic (backend) that make websites functional and interactive.</p>

                        <h4 class="text-lg font-semibold mb-2">Key Components:</h4>
                        <ul class="list-disc list-inside space-y-2 mb-4">
                            <li><strong>Frontend:</strong> HTML, CSS, JavaScript - what users see and interact with</li>
                            <li><strong>Backend:</strong> Server logic, databases, APIs - what happens behind the scenes</li>
                            <li><strong>Full-stack:</strong> Combination of both frontend and backend development</li>
                        </ul>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3">Technologies You'll Learn</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-orange-500/20 p-4 rounded-lg">
                                <h4 class="font-bold text-orange-300">HTML</h4>
                                <p class="text-sm">Structure and content</p>
                            </div>
                            <div class="bg-blue-500/20 p-4 rounded-lg">
                                <h4 class="font-bold text-blue-300">CSS</h4>
                                <p class="text-sm">Styling and layout</p>
                            </div>
                            <div class="bg-yellow-500/20 p-4 rounded-lg">
                                <h4 class="font-bold text-yellow-300">JavaScript</h4>
                                <p class="text-sm">Interactivity and logic</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3">Learning Path</h3>
                        <p>This course is designed to take you from beginner to proficient web developer through hands-on projects and practical exercises. Each lesson builds upon the previous one, ensuring you develop a solid foundation.</p>
                    </div>
                `,

                'HTML Fundamentals': `
                    <h2 class="text-2xl font-bold mb-6">${title}</h2>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3">What is HTML?</h3>
                        <p class="mb-4">HTML (HyperText Markup Language) is the standard language for creating web pages. It describes the structure and content of a webpage using markup tags.</p>

                        <h4 class="text-lg font-semibold mb-2">Basic HTML Structure:</h4>
                        <div class="code-block">
                            <code>
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;My First Webpage&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Welcome to My Website&lt;/h1&gt;
    &lt;p&gt;This is my first paragraph.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;
                            </code>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3">Common HTML Elements</h3>
                        <div class="space-y-4">
                            <div>
                                <h4 class="font-semibold">Headings (h1-h6):</h4>
                                <div class="code-block">
                                    <code>&lt;h1&gt;Main Title&lt;/h1&gt;
&lt;h2&gt;Subtitle&lt;/h2&gt;
&lt;h3&gt;Section Header&lt;/h3&gt;</code>
                                </div>
                            </div>

                            <div>
                                <h4 class="font-semibold">Paragraphs and Text:</h4>
                                <div class="code-block">
                                    <code>&lt;p&gt;This is a paragraph.&lt;/p&gt;
&lt;strong&gt;Bold text&lt;/strong&gt;
&lt;em&gt;Italic text&lt;/em&gt;</code>
                                </div>
                            </div>

                            <div>
                                <h4 class="font-semibold">Lists:</h4>
                                <div class="code-block">
                                    <code>&lt;ul&gt;
    &lt;li&gt;Unordered list item&lt;/li&gt;
    &lt;li&gt;Another item&lt;/li&gt;
&lt;/ul&gt;

&lt;ol&gt;
    &lt;li&gt;Ordered list item&lt;/li&gt;
    &lt;li&gt;Second item&lt;/li&gt;
&lt;/ol&gt;</code>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3">Practice Exercise</h3>
                        <div class="bg-blue-500/20 p-4 rounded-lg">
                            <p class="mb-2">Create a simple HTML page with:</p>
                            <ul class="list-disc list-inside space-y-1">
                                <li>A main heading with your name</li>
                                <li>A paragraph about yourself</li>
                                <li>A list of your hobbies</li>
                                <li>A link to your favorite website</li>
                            </ul>
                        </div>
                    </div>
                `,

                'CSS Styling and Layouts': `
                    <h2 class="text-2xl font-bold mb-6">${title}</h2>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3">Introduction to CSS</h3>
                        <p class="mb-4">CSS (Cascading Style Sheets) is used to style and layout web pages. It controls colors, fonts, spacing, positioning, and much more.</p>

                        <h4 class="text-lg font-semibold mb-2">CSS Syntax:</h4>
                        <div class="code-block">
                            <code>
selector {
    property: value;
    property: value;
}

/* Example */
h1 {
    color: blue;
    font-size: 24px;
    text-align: center;
}
                            </code>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3">CSS Selectors</h3>
                        <div class="space-y-4">
                            <div>
                                <h4 class="font-semibold">Element Selector:</h4>
                                <div class="code-block">
                                    <code>p { color: black; }</code>
                                </div>
                            </div>

                            <div>
                                <h4 class="font-semibold">Class Selector:</h4>
                                <div class="code-block">
                                    <code>.my-class { background-color: yellow; }</code>
                                </div>
                            </div>

                            <div>
                                <h4 class="font-semibold">ID Selector:</h4>
                                <div class="code-block">
                                    <code>#my-id { font-weight: bold; }</code>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3">Layout Techniques</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-purple-500/20 p-4 rounded-lg">
                                <h4 class="font-bold mb-2">Flexbox</h4>
                                <p class="text-sm">One-dimensional layout method for arranging items in rows or columns</p>
                            </div>
                            <div class="bg-green-500/20 p-4 rounded-lg">
                                <h4 class="font-bold mb-2">CSS Grid</h4>
                                <p class="text-sm">Two-dimensional layout system for complex grid-based designs</p>
                            </div>
                        </div>
                    </div>
                `
            };

            // Generate default content for lessons not in template
            return contentTemplates[title] || `
                <h2 class="text-2xl font-bold mb-6">${title}</h2>

                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-3">Learning Objectives</h3>
                    <p class="mb-4">In this lesson, you will learn about ${title.toLowerCase()} and how it applies to ${category.replace('_', ' ')} development.</p>

                    <div class="bg-blue-500/20 p-4 rounded-lg mb-4">
                        <h4 class="font-bold mb-2">Key Topics Covered:</h4>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Core concepts and principles</li>
                            <li>Practical implementation techniques</li>
                            <li>Best practices and common patterns</li>
                            <li>Real-world examples and use cases</li>
                        </ul>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-3">Detailed Content</h3>
                    <p class="mb-4">This comprehensive lesson covers all aspects of ${title.toLowerCase()}, providing you with both theoretical knowledge and practical skills.</p>

                    <div class="space-y-4">
                        <div class="border-l-4 border-blue-500 pl-4">
                            <h4 class="font-semibold">Theory</h4>
                            <p class="text-sm opacity-75">Understanding the fundamental concepts and principles</p>
                        </div>
                        <div class="border-l-4 border-green-500 pl-4">
                            <h4 class="font-semibold">Practice</h4>
                            <p class="text-sm opacity-75">Hands-on exercises and coding challenges</p>
                        </div>
                        <div class="border-l-4 border-purple-500 pl-4">
                            <h4 class="font-semibold">Application</h4>
                            <p class="text-sm opacity-75">Real-world projects and practical implementation</p>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-3">Interactive Example</h3>
                    <div class="code-block">
                        <code>
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

        function generateExercises(title, category) {
            return [
                {
                    type: 'quiz',
                    question: `What is the main concept covered in ${title}?`,
                    options: ['Option A', 'Option B', 'Option C', 'Option D'],
                    correct: 0
                },
                {
                    type: 'coding',
                    prompt: `Write code to demonstrate ${title} concepts`,
                    starter: '// Write your code here\n',
                    solution: '// Solution code would be provided'
                }
            ];
        }

        function renderLessonList() {
            const lessonList = document.getElementById('lesson-list');
            lessonList.innerHTML = lessons.map((lesson, index) => `
                <div class="lesson-item flex items-center justify-between p-3 rounded-lg cursor-pointer transition-colors ${
                    index === currentLessonIndex ? 'bg-blue-500/30' : 'hover:bg-white/10'
                }" onclick="loadLesson(${index})">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm ${
                            completedLessons.has(lesson.id) ? 'bg-green-500' : 'bg-gray-500'
                        }">
                            ${completedLessons.has(lesson.id) ? '<i class="fas fa-check"></i>' : lesson.id}
                        </div>
                        <div>
                            <p class="text-white text-sm font-medium">${lesson.title}</p>
                            <p class="text-white/60 text-xs">${lesson.estimatedTime} min</p>
                        </div>
                    </div>
                    ${bookmarkedLessons.has(lesson.id) ? '<i class="fas fa-bookmark text-yellow-400"></i>' : ''}
                </div>
            `).join('');

            document.getElementById('total-lessons').textContent = lessons.length;
        }

        function loadLesson(index) {
            if (index < 0 || index >= lessons.length) return;

            currentLessonIndex = index;
            const lesson = lessons[index];

            document.getElementById('lesson-content').innerHTML = lesson.content;
            document.getElementById('lesson-progress').textContent = `Lesson ${index + 1} of ${lessons.length}`;

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
            const progress = {
                courseId: courseId,
                currentLessonIndex: currentLessonIndex,
                completedLessons: Array.from(completedLessons),
                bookmarkedLessons: Array.from(bookmarkedLessons),
                lastAccessed: new Date().toISOString()
            };
            localStorage.setItem(`course_progress_${courseId}`, JSON.stringify(progress));
        }

        function loadUserProgress() {
            const saved = localStorage.getItem(`course_progress_${courseId}`);
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

            // Show typing indicator
            showTypingIndicator();

            // Simulate bot response
            setTimeout(() => {
                hideTypingIndicator();
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

        function showTypingIndicator() {
            document.getElementById('typing-indicator').classList.add('show');
            const messagesContainer = document.getElementById('chat-messages');
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        function hideTypingIndicator() {
            document.getElementById('typing-indicator').classList.remove('show');
        }

        function generateBotResponse(message) {
            const responses = {
                'help': "I'm here to help! You can ask me about any topic in this course, request explanations, or get hints for exercises.",
                'hint': "Here's a hint: Break down the problem into smaller steps and tackle each one individually.",
                'explain': "I'd be happy to explain! Could you be more specific about which concept you'd like me to clarify?",
                'stuck': "It's normal to feel stuck sometimes! Try reviewing the previous lesson, checking the documentation, or breaking the problem into smaller parts.",
                'example': "Here's a practical example that might help you understand the concept better...",
                'default': [
                    "That's a great question! Let me help you with that.",
                    "I understand what you're asking. Here's how I'd approach this...",
                    "Good thinking! This is related to the concepts we covered in this lesson.",
                    "Let me break this down for you step by step.",
                    "That's exactly the kind of thinking that will make you a better developer!"
                ]
            };

            const lowerMessage = message.toLowerCase();

            for (const key in responses) {
                if (lowerMessage.includes(key)) {
                    return Array.isArray(responses[key])
                        ? responses[key][Math.floor(Math.random() * responses[key].length)]
                        : responses[key];
                }
            }

            return responses.default[Math.floor(Math.random() * responses.default.length)];
        }

        // Handle Enter key in chat input
        document.addEventListener('keypress', function(e) {
            if (e.target.id === 'chat-input' && e.key === 'Enter') {
                sendMessage();
            }
        });

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

            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

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
    </script>
</body>
</html>