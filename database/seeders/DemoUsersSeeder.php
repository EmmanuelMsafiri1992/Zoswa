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
                'name' => 'Teacher Jones',
                'email' => 'teacher@zoswa.com',
                'password' => Hash::make('password123'),
                'role' => 'instructor',
                'phone' => '+1-555-0102',
                'bio' => 'Experienced instructor specializing in web development and data analysis courses.',
                'is_active' => true,
                'preferences' => json_encode([
                    'notifications' => true,
                    'dashboard_layout' => 'instructor',
                    'theme' => 'default'
                ])
            ],
            [
                'name' => 'Client Smith',
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
                'name' => 'Student Brown',
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
            ]
        ];

        foreach ($demoUsers as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }

        $this->command->info('Demo users created successfully!');
        $this->command->info('Login credentials:');
        $this->command->info('- admin@zoswa.com / password123 (Admin)');
        $this->command->info('- teacher@zoswa.com / password123 (Teacher)');
        $this->command->info('- client@zoswa.com / password123 (Client)');
        $this->command->info('- student@zoswa.com / password123 (Student)');
    }
}