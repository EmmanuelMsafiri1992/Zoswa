<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = User::where('role', 'student')->pluck('id')->toArray();
        $courses = Course::pluck('id')->toArray();

        if (empty($students)) {
            $this->command->error('No students found! Please run DemoUsersSeeder first.');
            return;
        }

        if (empty($courses)) {
            $this->command->error('No courses found! Please run CourseSeeder first.');
            return;
        }

        $subscriptions = [
            // Active subscriptions for Alex Brown (student@zoswa.com)
            [
                'user_id' => $students[0], // Alex Brown
                'course_id' => $courses[0], // Web Development Bootcamp
                'project_count' => 5,
                'duration_days' => 90,
                'amount_paid' => 299.99,
                'paypal_transaction_id' => 'TXN_WEB_' . uniqid(),
                'status' => 'active',
                'starts_at' => Carbon::now()->subDays(15),
                'expires_at' => Carbon::now()->addDays(75),
                'auto_renewal' => true,
                'metadata' => json_encode([
                    'progress' => 45,
                    'completed_projects' => 2,
                    'last_activity' => Carbon::now()->subDays(2)->toISOString()
                ])
            ],
            [
                'user_id' => $students[0], // Alex Brown
                'course_id' => $courses[6], // SQL for Data Analysis
                'project_count' => 3,
                'duration_days' => 60,
                'amount_paid' => 149.99,
                'paypal_transaction_id' => 'TXN_SQL_' . uniqid(),
                'status' => 'active',
                'starts_at' => Carbon::now()->subWeeks(3),
                'expires_at' => Carbon::now()->addWeeks(5),
                'auto_renewal' => false,
                'metadata' => json_encode([
                    'progress' => 78,
                    'completed_projects' => 2,
                    'last_activity' => Carbon::now()->subDays(1)->toISOString()
                ])
            ],

            // Subscriptions for Jessica Learn (jessica@student.edu)
            [
                'user_id' => $students[1], // Jessica Learn
                'course_id' => $courses[8], // Machine Learning with Python
                'project_count' => 6,
                'duration_days' => 120,
                'amount_paid' => 399.99,
                'paypal_transaction_id' => 'TXN_ML_' . uniqid(),
                'status' => 'active',
                'starts_at' => Carbon::now()->subWeeks(2),
                'expires_at' => Carbon::now()->addWeeks(15),
                'auto_renewal' => true,
                'metadata' => json_encode([
                    'progress' => 25,
                    'completed_projects' => 1,
                    'last_activity' => Carbon::now()->subHours(6)->toISOString()
                ])
            ],
            [
                'user_id' => $students[1], // Jessica Learn
                'course_id' => $courses[11], // Computer Vision with OpenCV
                'project_count' => 4,
                'duration_days' => 90,
                'amount_paid' => 329.99,
                'paypal_transaction_id' => 'TXN_CV_' . uniqid(),
                'status' => 'pending',
                'starts_at' => Carbon::now()->addDays(5),
                'expires_at' => Carbon::now()->addDays(95),
                'auto_renewal' => false,
                'metadata' => json_encode([
                    'progress' => 0,
                    'completed_projects' => 0,
                    'enrollment_date' => Carbon::now()->toISOString()
                ])
            ],

            // Subscriptions for David Coder (david@coder.dev)
            [
                'user_id' => $students[2], // David Coder
                'course_id' => $courses[1], // Advanced Full-Stack Development
                'project_count' => 8,
                'duration_days' => 150,
                'amount_paid' => 499.99,
                'paypal_transaction_id' => 'TXN_ADV_' . uniqid(),
                'status' => 'active',
                'starts_at' => Carbon::now()->subMonth(),
                'expires_at' => Carbon::now()->addMonths(4),
                'auto_renewal' => true,
                'metadata' => json_encode([
                    'progress' => 65,
                    'completed_projects' => 5,
                    'last_activity' => Carbon::now()->subHours(3)->toISOString()
                ])
            ],
            [
                'user_id' => $students[2], // David Coder
                'course_id' => $courses[12], // DevOps and Cloud Infrastructure
                'project_count' => 7,
                'duration_days' => 120,
                'amount_paid' => 429.99,
                'paypal_transaction_id' => 'TXN_DEVOPS_' . uniqid(),
                'status' => 'active',
                'starts_at' => Carbon::now()->subWeeks(6),
                'expires_at' => Carbon::now()->addWeeks(11),
                'auto_renewal' => false,
                'metadata' => json_encode([
                    'progress' => 35,
                    'completed_projects' => 2,
                    'last_activity' => Carbon::now()->subDays(4)->toISOString()
                ])
            ],

            // Subscriptions for Maria Analytics (maria@data.science)
            [
                'user_id' => $students[3], // Maria Analytics
                'course_id' => $courses[4], // Python Data Analysis Fundamentals
                'project_count' => 4,
                'duration_days' => 75,
                'amount_paid' => 199.99,
                'paypal_transaction_id' => 'TXN_DATA_' . uniqid(),
                'status' => 'expired',
                'starts_at' => Carbon::now()->subMonths(3),
                'expires_at' => Carbon::now()->subWeeks(1),
                'auto_renewal' => false,
                'metadata' => json_encode([
                    'progress' => 100,
                    'completed_projects' => 4,
                    'completion_date' => Carbon::now()->subWeeks(1)->toISOString(),
                    'certificate_generated' => true
                ])
            ],
            [
                'user_id' => $students[3], // Maria Analytics
                'course_id' => $courses[5], // Advanced Data Visualization
                'project_count' => 5,
                'duration_days' => 90,
                'amount_paid' => 279.99,
                'paypal_transaction_id' => 'TXN_VIZ_' . uniqid(),
                'status' => 'active',
                'starts_at' => Carbon::now()->subDays(10),
                'expires_at' => Carbon::now()->addDays(80),
                'auto_renewal' => true,
                'metadata' => json_encode([
                    'progress' => 20,
                    'completed_projects' => 1,
                    'last_activity' => Carbon::now()->subHours(12)->toISOString()
                ])
            ],
            [
                'user_id' => $students[3], // Maria Analytics
                'course_id' => $courses[7], // Big Data Analytics with Apache Spark
                'project_count' => 6,
                'duration_days' => 120,
                'amount_paid' => 449.99,
                'paypal_transaction_id' => 'TXN_SPARK_' . uniqid(),
                'status' => 'active',
                'starts_at' => Carbon::now()->subWeeks(1),
                'expires_at' => Carbon::now()->addWeeks(16),
                'auto_renewal' => false,
                'metadata' => json_encode([
                    'progress' => 12,
                    'completed_projects' => 0,
                    'last_activity' => Carbon::now()->subDays(1)->toISOString()
                ])
            ],

            // Some expired subscriptions for variety
            [
                'user_id' => $students[0], // Alex Brown
                'course_id' => $courses[2], // React Native Mobile Development
                'project_count' => 4,
                'duration_days' => 60,
                'amount_paid' => 349.99,
                'paypal_transaction_id' => 'TXN_RN_' . uniqid(),
                'status' => 'expired',
                'starts_at' => Carbon::now()->subMonths(4),
                'expires_at' => Carbon::now()->subMonths(2),
                'auto_renewal' => false,
                'metadata' => json_encode([
                    'progress' => 85,
                    'completed_projects' => 3,
                    'expiry_reason' => 'natural_expiry'
                ])
            ],
            [
                'user_id' => $students[1], // Jessica Learn
                'course_id' => $courses[3], // Vue.js Complete Guide
                'project_count' => 3,
                'duration_days' => 75,
                'amount_paid' => 249.99,
                'paypal_transaction_id' => 'TXN_VUE_' . uniqid(),
                'status' => 'cancelled',
                'starts_at' => Carbon::now()->subMonths(2),
                'expires_at' => Carbon::now()->addWeeks(8),
                'auto_renewal' => false,
                'metadata' => json_encode([
                    'progress' => 40,
                    'completed_projects' => 1,
                    'cancellation_reason' => 'user_request',
                    'cancelled_at' => Carbon::now()->subWeeks(3)->toISOString()
                ])
            ],

            // Additional subscriptions to showcase variety
            [
                'user_id' => $students[2], // David Coder
                'course_id' => $courses[13], // Cybersecurity Fundamentals
                'project_count' => 4,
                'duration_days' => 90,
                'amount_paid' => 379.99,
                'paypal_transaction_id' => 'TXN_SEC_' . uniqid(),
                'status' => 'active',
                'starts_at' => Carbon::now()->subDays(20),
                'expires_at' => Carbon::now()->addDays(70),
                'auto_renewal' => true,
                'metadata' => json_encode([
                    'progress' => 55,
                    'completed_projects' => 2,
                    'last_activity' => Carbon::now()->subDays(1)->toISOString()
                ])
            ]
        ];

        foreach ($subscriptions as $subscriptionData) {
            Subscription::create($subscriptionData);
        }

        $this->command->info('Subscriptions seeded successfully!');
        $this->command->info('Created ' . count($subscriptions) . ' subscriptions with various statuses.');
        $this->command->info('Status breakdown:');
        $this->command->info('- Active: ' . collect($subscriptions)->where('status', 'active')->count());
        $this->command->info('- Expired: ' . collect($subscriptions)->where('status', 'expired')->count());
        $this->command->info('- Cancelled: ' . collect($subscriptions)->where('status', 'cancelled')->count());
        $this->command->info('- Pending: ' . collect($subscriptions)->where('status', 'pending')->count());
    }
}