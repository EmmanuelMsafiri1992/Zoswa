<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('🌱 Starting comprehensive database seeding...');
        $this->command->newLine();

        $this->call([
            // 1. First seed users (all roles: admin, instructor, client, student)
            DemoUsersSeeder::class,

            // 2. Then seed courses (requires instructors to exist)
            CourseSeeder::class,

            // 3. Seed subscriptions (requires users and courses to exist)
            SubscriptionSeeder::class,

            // 4. Seed support requests (requires clients to exist)
            SupportRequestSeeder::class,
        ]);

        $this->command->newLine();
        $this->command->info('✅ Database seeding completed successfully!');
        $this->command->info('🚀 You can now login with any of the demo users:');
        $this->command->newLine();

        $this->command->info('👤 ADMIN ACCOUNTS:');
        $this->command->info('   • admin@zoswa.com (Admin User)');
        $this->command->info('   • sarah@zoswa.com (Sarah Admin)');
        $this->command->newLine();

        $this->command->info('👨‍🏫 INSTRUCTOR ACCOUNTS:');
        $this->command->info('   • teacher@zoswa.com (Dr. Michael Johnson)');
        $this->command->info('   • emily.instructor@zoswa.com (Prof. Emily Davis)');
        $this->command->info('   • james.instructor@zoswa.com (James Wilson)');
        $this->command->newLine();

        $this->command->info('👔 CLIENT ACCOUNTS:');
        $this->command->info('   • client@zoswa.com (Robert Smith)');
        $this->command->info('   • lisa@techcorp.com (Lisa Corporate)');
        $this->command->info('   • mark@startup.io (Mark Startup)');
        $this->command->newLine();

        $this->command->info('🎓 STUDENT ACCOUNTS:');
        $this->command->info('   • student@zoswa.com (Alex Brown)');
        $this->command->info('   • jessica@student.edu (Jessica Learn)');
        $this->command->info('   • david@coder.dev (David Coder)');
        $this->command->info('   • maria@data.science (Maria Analytics)');
        $this->command->newLine();

        $this->command->info('🔑 All accounts use password: password123');
        $this->command->info('💾 Database now contains realistic demo data for development and testing.');
    }
}
