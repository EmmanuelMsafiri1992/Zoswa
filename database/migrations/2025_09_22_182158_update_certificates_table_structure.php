<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('certificates', function (Blueprint $table) {
            // Add new columns
            $table->string('title')->nullable()->after('certificate_number');
            $table->text('description')->nullable()->after('title');
            $table->date('issued_date')->nullable()->after('description');
            $table->date('completion_date')->nullable()->after('issued_date');
            $table->integer('completion_percentage')->default(100)->after('completion_date');
            $table->string('status')->default('active')->after('final_score');
            $table->text('skills_acquired')->nullable()->after('status');
            $table->string('verification_code')->unique()->nullable()->after('skills_acquired');
            $table->timestamp('expires_at')->nullable()->after('verification_code');

            // Modify existing columns
            $table->decimal('final_score', 5, 2)->nullable()->change();

            // Rename columns
            $table->renameColumn('issued_at', 'temp_issued_at');

            // Add indexes
            $table->index(['user_id', 'course_id']);
            $table->index('verification_code');
        });

        // Update issued_date from temp_issued_at
        DB::statement('UPDATE certificates SET issued_date = DATE(temp_issued_at) WHERE temp_issued_at IS NOT NULL');
        DB::statement('UPDATE certificates SET completion_date = DATE(temp_issued_at) WHERE temp_issued_at IS NOT NULL');

        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn('temp_issued_at');
            $table->dropColumn('certificate_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn([
                'title', 'description', 'issued_date', 'completion_date',
                'completion_percentage', 'status', 'skills_acquired',
                'verification_code', 'expires_at'
            ]);
            $table->timestamp('issued_at')->nullable();
            $table->string('certificate_url')->nullable();
            $table->integer('final_score')->change();
        });
    }
};
