<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructors = User::where('role', 'instructor')->pluck('id')->toArray();

        if (empty($instructors)) {
            $this->command->error('No instructors found! Please run DemoUsersSeeder first.');
            return;
        }

        $courses = [
            // Web Development Courses
            [
                'title' => 'Complete Web Development Bootcamp',
                'description' => 'Learn HTML, CSS, JavaScript, and modern web development frameworks. Build real-world projects and deploy them to production. Perfect for beginners who want to become full-stack developers.',
                'category' => 'web_development',
                'difficulty' => 'beginner',
                'instructor_id' => $instructors[array_rand($instructors)],
                'price' => 299.99,
                'is_active' => true,
                'technologies' => json_encode(['HTML', 'CSS', 'JavaScript', 'React', 'Node.js', 'MongoDB']),
                'estimated_hours' => 120,
            ],
            [
                'title' => 'Advanced Full-Stack Development',
                'description' => 'Master advanced concepts in full-stack development including microservices, GraphQL, and cloud deployment. Learn enterprise-level architecture patterns.',
                'category' => 'web_development',
                'difficulty' => 'advanced',
                'instructor_id' => $instructors[array_rand($instructors)],
                'price' => 499.99,
                'is_active' => true,
                'technologies' => json_encode(['React', 'Node.js', 'GraphQL', 'Docker', 'AWS', 'TypeScript']),
                'estimated_hours' => 180,
            ],
            [
                'title' => 'React Native Mobile Development',
                'description' => 'Build cross-platform mobile applications using React Native. Learn to create iOS and Android apps with a single codebase.',
                'category' => 'web_development',
                'difficulty' => 'intermediate',
                'instructor_id' => $instructors[array_rand($instructors)],
                'price' => 349.99,
                'is_active' => true,
                'technologies' => json_encode(['React Native', 'JavaScript', 'Redux', 'Firebase', 'Expo']),
                'estimated_hours' => 100,
            ],
            [
                'title' => 'Vue.js Complete Guide',
                'description' => 'Comprehensive Vue.js course covering Vue 3, Composition API, Vuex, Vue Router, and modern development practices.',
                'category' => 'web_development',
                'difficulty' => 'intermediate',
                'instructor_id' => $instructors[array_rand($instructors)],
                'price' => 249.99,
                'is_active' => true,
                'technologies' => json_encode(['Vue.js', 'Vuex', 'Vue Router', 'TypeScript', 'Vite']),
                'estimated_hours' => 90,
            ],

            // Data Analysis Courses
            [
                'title' => 'Python Data Analysis Fundamentals',
                'description' => 'Learn data analysis with Python, Pandas, NumPy, and visualization libraries. Work with real datasets and solve business problems.',
                'category' => 'data_analysis',
                'difficulty' => 'intermediate',
                'instructor_id' => $instructors[array_rand($instructors)],
                'price' => 199.99,
                'is_active' => true,
                'technologies' => json_encode(['Python', 'Pandas', 'NumPy', 'Matplotlib', 'Seaborn', 'Jupyter']),
                'estimated_hours' => 80,
            ],
            [
                'title' => 'Advanced Data Visualization',
                'description' => 'Create stunning data visualizations using Python, R, and modern visualization tools. Learn storytelling with data.',
                'category' => 'data_analysis',
                'difficulty' => 'advanced',
                'instructor_id' => $instructors[array_rand($instructors)],
                'price' => 279.99,
                'is_active' => true,
                'technologies' => json_encode(['Python', 'R', 'D3.js', 'Plotly', 'Tableau', 'Power BI']),
                'estimated_hours' => 70,
            ],
            [
                'title' => 'SQL for Data Analysis',
                'description' => 'Master SQL for data analysis. Learn complex queries, data manipulation, and database optimization techniques.',
                'category' => 'data_analysis',
                'difficulty' => 'beginner',
                'instructor_id' => $instructors[array_rand($instructors)],
                'price' => 149.99,
                'is_active' => true,
                'technologies' => json_encode(['SQL', 'PostgreSQL', 'MySQL', 'SQLite', 'Database Design']),
                'estimated_hours' => 60,
            ],
            [
                'title' => 'Big Data Analytics with Apache Spark',
                'description' => 'Learn to process and analyze large datasets using Apache Spark, Hadoop, and distributed computing concepts.',
                'category' => 'data_analysis',
                'difficulty' => 'advanced',
                'instructor_id' => $instructors[array_rand($instructors)],
                'price' => 449.99,
                'is_active' => true,
                'technologies' => json_encode(['Apache Spark', 'Hadoop', 'Scala', 'Python', 'Kafka']),
                'estimated_hours' => 140,
            ],

            // AI/ML Courses
            [
                'title' => 'Machine Learning with Python',
                'description' => 'Introduction to machine learning algorithms, model training, and deployment using Python and scikit-learn. Build predictive models.',
                'category' => 'ai_ml',
                'difficulty' => 'intermediate',
                'instructor_id' => $instructors[array_rand($instructors)],
                'price' => 399.99,
                'is_active' => true,
                'technologies' => json_encode(['Python', 'scikit-learn', 'TensorFlow', 'Keras', 'Matplotlib']),
                'estimated_hours' => 150,
            ],
            [
                'title' => 'Deep Learning and Neural Networks',
                'description' => 'Advanced course covering deep learning, neural networks, and AI model deployment. Work on computer vision and NLP projects.',
                'category' => 'ai_ml',
                'difficulty' => 'advanced',
                'instructor_id' => $instructors[array_rand($instructors)],
                'price' => 599.99,
                'is_active' => true,
                'technologies' => json_encode(['Python', 'TensorFlow', 'PyTorch', 'Keras', 'CUDA']),
                'estimated_hours' => 200,
            ],
            [
                'title' => 'Natural Language Processing',
                'description' => 'Comprehensive NLP course covering text processing, sentiment analysis, chatbots, and language models.',
                'category' => 'ai_ml',
                'difficulty' => 'advanced',
                'instructor_id' => $instructors[array_rand($instructors)],
                'price' => 479.99,
                'is_active' => true,
                'technologies' => json_encode(['Python', 'NLTK', 'spaCy', 'Transformers', 'BERT', 'GPT']),
                'estimated_hours' => 130,
            ],
            [
                'title' => 'Computer Vision with OpenCV',
                'description' => 'Learn computer vision techniques using OpenCV and Python. Build image recognition and object detection systems.',
                'category' => 'ai_ml',
                'difficulty' => 'intermediate',
                'instructor_id' => $instructors[array_rand($instructors)],
                'price' => 329.99,
                'is_active' => true,
                'technologies' => json_encode(['Python', 'OpenCV', 'TensorFlow', 'YOLO', 'CNN']),
                'estimated_hours' => 110,
            ],

            // Additional Specialized Courses
            [
                'title' => 'DevOps and Cloud Infrastructure',
                'description' => 'Learn modern DevOps practices, CI/CD pipelines, containerization, and cloud deployment strategies.',
                'category' => 'web_development',
                'difficulty' => 'advanced',
                'instructor_id' => $instructors[array_rand($instructors)],
                'price' => 429.99,
                'is_active' => true,
                'technologies' => json_encode(['Docker', 'Kubernetes', 'AWS', 'Jenkins', 'Terraform']),
                'estimated_hours' => 160,
            ],
            [
                'title' => 'Cybersecurity Fundamentals',
                'description' => 'Essential cybersecurity concepts, threat analysis, and security implementation strategies for modern applications.',
                'category' => 'web_development',
                'difficulty' => 'intermediate',
                'instructor_id' => $instructors[array_rand($instructors)],
                'price' => 379.99,
                'is_active' => true,
                'technologies' => json_encode(['Security', 'Penetration Testing', 'Cryptography', 'Network Security']),
                'estimated_hours' => 95,
            ]
        ];

        foreach ($courses as $courseData) {
            Course::create($courseData);
        }

        $this->command->info('Courses seeded successfully!');
        $this->command->info('Created ' . count($courses) . ' courses across all categories.');
        $this->command->info('Categories: Web Development (' . collect($courses)->where('category', 'web_development')->count() . '), Data Analysis (' . collect($courses)->where('category', 'data_analysis')->count() . '), AI/ML (' . collect($courses)->where('category', 'ai_ml')->count() . ')');
    }
}
