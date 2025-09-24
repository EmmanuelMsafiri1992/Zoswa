<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DemoUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $demoUsers = [
            // Admin Users
            [
                'name' => 'Admin User',
                'email' => 'admin@zoswa.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'phone' => '+1-555-0101',
                'bio' => 'System Administrator with full access to all features and user management.',
                'is_active' => true,
                'preferences' => json_encode([
                    'notifications' => true,
                    'dashboard_layout' => 'admin',
                    'theme' => 'default'
                ])
            ],
            [
                'name' => 'Sarah Admin',
                'email' => 'sarah@zoswa.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'phone' => '+1-555-0201',
                'bio' => 'Senior Administrator handling user support and system maintenance.',
                'is_active' => true,
                'preferences' => json_encode([
                    'notifications' => true,
                    'dashboard_layout' => 'admin',
                    'theme' => 'default'
                ])
            ],

            // Instructors/Teachers
            [
                'name' => 'Dr. Michael Johnson',
                'email' => 'teacher@zoswa.com',
                'password' => Hash::make('password123'),
                'role' => 'instructor',
                'phone' => '+1-555-0102',
                'bio' => 'Experienced instructor specializing in web development and data analysis courses with 10+ years of industry experience.',
                'is_active' => true,
                'preferences' => json_encode([
                    'notifications' => true,
                    'dashboard_layout' => 'instructor',
                    'theme' => 'default'
                ])
            ],
            [
                'name' => 'Prof. Emily Davis',
                'email' => 'emily.instructor@zoswa.com',
                'password' => Hash::make('password123'),
                'role' => 'instructor',
                'phone' => '+1-555-0302',
                'bio' => 'AI/ML specialist and university professor. Expert in machine learning, deep learning, and data science.',
                'is_active' => true,
                'preferences' => json_encode([
                    'notifications' => true,
                    'dashboard_layout' => 'instructor',
                    'theme' => 'default'
                ])
            ],
            [
                'name' => 'James Wilson',
                'email' => 'james.instructor@zoswa.com',
                'password' => Hash::make('password123'),
                'role' => 'instructor',
                'phone' => '+1-555-0402',
                'bio' => 'Full-stack developer and coding bootcamp instructor. Specializes in React, Node.js, and modern web technologies.',
                'is_active' => true,
                'preferences' => json_encode([
                    'notifications' => true,
                    'dashboard_layout' => 'instructor',
                    'theme' => 'default'
                ])
            ],

            // Clients
            [
                'name' => 'Robert Smith',
                'email' => 'client@zoswa.com',
                'password' => Hash::make('password123'),
                'role' => 'client',
                'phone' => '+1-555-0103',
                'bio' => 'Business client seeking professional development services for various projects.',
                'is_active' => true,
                'preferences' => json_encode([
                    'notifications' => true,
                    'dashboard_layout' => 'client',
                    'theme' => 'default'
                ])
            ],
            [
                'name' => 'Lisa Corporate',
                'email' => 'lisa@techcorp.com',
                'password' => Hash::make('password123'),
                'role' => 'client',
                'phone' => '+1-555-0503',
                'bio' => 'CTO at TechCorp, looking for custom development solutions and team training programs.',
                'is_active' => true,
                'preferences' => json_encode([
                    'notifications' => true,
                    'dashboard_layout' => 'client',
                    'theme' => 'default'
                ])
            ],
            [
                'name' => 'Mark Startup',
                'email' => 'mark@startup.io',
                'password' => Hash::make('password123'),
                'role' => 'client',
                'phone' => '+1-555-0603',
                'bio' => 'Startup founder needing MVP development and technical consulting.',
                'is_active' => true,
                'preferences' => json_encode([
                    'notifications' => true,
                    'dashboard_layout' => 'client',
                    'theme' => 'default'
                ])
            ],

            // Students
            [
                'name' => 'Alex Brown',
                'email' => 'student@zoswa.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
                'phone' => '+1-555-0104',
                'bio' => 'Dedicated student learning programming and data analysis skills.',
                'is_active' => true,
                'preferences' => json_encode([
                    'notifications' => true,
                    'dashboard_layout' => 'student',
                    'theme' => 'default'
                ])
            ],
            [
                'name' => 'Jessica Learn',
                'email' => 'jessica@student.edu',
                'password' => Hash::make('password123'),
                'role' => 'student',
                'phone' => '+1-555-0504',
                'bio' => 'Computer Science student interested in web development and AI.',
                'is_active' => true,
                'preferences' => json_encode([
                    'notifications' => true,
                    'dashboard_layout' => 'student',
                    'theme' => 'default'
                ])
            ],
            [
                'name' => 'David Coder',
                'email' => 'david@coder.dev',
                'password' => Hash::make('password123'),
                'role' => 'student',
                'phone' => '+1-555-0604',
                'bio' => 'Self-taught developer looking to formalize skills through structured courses.',
                'is_active' => true,
                'preferences' => json_encode([
                    'notifications' => true,
                    'dashboard_layout' => 'student',
                    'theme' => 'default'
                ])
            ],
            [
                'name' => 'Maria Analytics',
                'email' => 'maria@data.science',
                'password' => Hash::make('password123'),
                'role' => 'student',
                'phone' => '+1-555-0704',
                'bio' => 'Data analyst transitioning to machine learning and AI.',
                'is_active' => true,
                'preferences' => json_encode([
                    'notifications' => true,
                    'dashboard_layout' => 'student',
                    'theme' => 'default'
                ])
            ],
        ];

        foreach ($demoUsers as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }

        $this->command->info('Demo users created successfully!');
        $this->command->info('Login credentials (all use password: password123):');
        $this->command->info('');
        $this->command->info('ADMIN ACCOUNTS:');
        $this->command->info('- admin@zoswa.com (Admin User)');
        $this->command->info('- sarah@zoswa.com (Sarah Admin)');
        $this->command->info('');
        $this->command->info('INSTRUCTOR ACCOUNTS:');
        $this->command->info('- teacher@zoswa.com (Dr. Michael Johnson)');
        $this->command->info('- emily.instructor@zoswa.com (Prof. Emily Davis)');
        $this->command->info('- james.instructor@zoswa.com (James Wilson)');
        $this->command->info('');
        $this->command->info('CLIENT ACCOUNTS:');
        $this->command->info('- client@zoswa.com (Robert Smith)');
        $this->command->info('- lisa@techcorp.com (Lisa Corporate)');
        $this->command->info('- mark@startup.io (Mark Startup)');
        $this->command->info('');
        $this->command->info('STUDENT ACCOUNTS:');
        $this->command->info('- student@zoswa.com (Alex Brown)');
        $this->command->info('- jessica@student.edu (Jessica Learn)');
        $this->command->info('- david@coder.dev (David Coder)');
        $this->command->info('- maria@data.science (Maria Analytics)');
    }
}