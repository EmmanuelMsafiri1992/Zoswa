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
        Schema::create('support_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('country');
            $table->string('project_title');
            $table->text('project_description');
            $table->enum('project_type', [
                'web_development',
                'mobile_app',
                'desktop_app',
                'api_development',
                'database_design',
                'bug_fixing',
                'code_review',
                'consulting',
                'other'
            ]);
            $table->enum('urgency', ['low', 'medium', 'high', 'urgent']);
            $table->string('expected_timeframe');
            $table->string('project_duration');
            $table->decimal('budget_min', 10, 2)->nullable();
            $table->decimal('budget_max', 10, 2)->nullable();
            $table->text('technical_requirements')->nullable();
            $table->json('attachments')->nullable(); // Store file paths as JSON array
            $table->enum('status', ['pending', 'in_review', 'assigned', 'in_progress', 'completed', 'cancelled'])->default('pending');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null');
            $table->text('admin_notes')->nullable();
            $table->timestamp('responded_at')->nullable();
            $table->timestamps();

            $table->index(['status', 'created_at']);
            $table->index(['country']);
            $table->index(['urgency']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_requests');
    }
};
