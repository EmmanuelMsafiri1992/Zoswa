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
        $instructor = User::where('role', 'instructor')->first();

        // Web Development Course
        Course::create([
            'title' => 'Complete Web Development Bootcamp',
            'description' => 'Learn HTML, CSS, JavaScript, and modern web development frameworks. Build real-world projects and deploy them to production.',
            'category' => 'web_development',
            'difficulty' => 'beginner',
            'instructor_id' => $instructor->id,
            'price' => 299.99,
            'is_active' => true,
            'technologies' => ['HTML', 'CSS', 'JavaScript', 'React', 'Node.js', 'MongoDB'],
            'estimated_hours' => 120,
        ]);

        // Advanced Web Development
        Course::create([
            'title' => 'Advanced Full-Stack Development',
            'description' => 'Master advanced concepts in full-stack development including microservices, GraphQL, and cloud deployment.',
            'category' => 'web_development',
            'difficulty' => 'advanced',
            'instructor_id' => $instructor->id,
            'price' => 499.99,
            'is_active' => true,
            'technologies' => ['React', 'Node.js', 'GraphQL', 'Docker', 'AWS', 'TypeScript'],
            'estimated_hours' => 180,
        ]);

        // Data Analysis Course
        Course::create([
            'title' => 'Python Data Analysis Fundamentals',
            'description' => 'Learn data analysis with Python, Pandas, NumPy, and visualization libraries. Work with real datasets.',
            'category' => 'data_analysis',
            'difficulty' => 'intermediate',
            'instructor_id' => $instructor->id,
            'price' => 199.99,
            'is_active' => true,
            'technologies' => ['Python', 'Pandas', 'NumPy', 'Matplotlib', 'Seaborn', 'Jupyter'],
            'estimated_hours' => 80,
        ]);

        // Machine Learning Course
        Course::create([
            'title' => 'Machine Learning with Python',
            'description' => 'Introduction to machine learning algorithms, model training, and deployment using Python and scikit-learn.',
            'category' => 'ai_ml',
            'difficulty' => 'intermediate',
            'instructor_id' => $instructor->id,
            'price' => 399.99,
            'is_active' => true,
            'technologies' => ['Python', 'scikit-learn', 'TensorFlow', 'Keras', 'Matplotlib'],
            'estimated_hours' => 150,
        ]);

        // Advanced AI Course
        Course::create([
            'title' => 'Deep Learning and Neural Networks',
            'description' => 'Advanced course covering deep learning, neural networks, and AI model deployment.',
            'category' => 'ai_ml',
            'difficulty' => 'advanced',
            'instructor_id' => $instructor->id,
            'price' => 599.99,
            'is_active' => true,
            'technologies' => ['Python', 'TensorFlow', 'PyTorch', 'Keras', 'CUDA'],
            'estimated_hours' => 200,
        ]);
    }
}
