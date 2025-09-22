<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@zoswa.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'phone' => '+1234567890',
            'bio' => 'System Administrator',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Create Instructor User
        User::create([
            'name' => 'John Instructor',
            'email' => 'instructor@zoswa.com',
            'password' => Hash::make('password123'),
            'role' => 'instructor',
            'phone' => '+1234567891',
            'bio' => 'Experienced web development instructor with 10+ years of teaching experience.',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Create Student User
        User::create([
            'name' => 'Jane Student',
            'email' => 'student@zoswa.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
            'phone' => '+1234567892',
            'bio' => 'Computer science student passionate about learning new technologies.',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Create Client User
        User::create([
            'name' => 'Bob Client',
            'email' => 'client@zoswa.com',
            'password' => Hash::make('password123'),
            'role' => 'client',
            'phone' => '+1234567893',
            'bio' => 'Business owner looking for development services.',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Create additional students
        User::create([
            'name' => 'Alice Developer',
            'email' => 'alice@zoswa.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
            'phone' => '+1234567894',
            'bio' => 'Junior developer looking to improve skills.',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Mike Coder',
            'email' => 'mike@zoswa.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
            'phone' => '+1234567895',
            'bio' => 'Self-taught programmer seeking structured learning.',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
    }
}
