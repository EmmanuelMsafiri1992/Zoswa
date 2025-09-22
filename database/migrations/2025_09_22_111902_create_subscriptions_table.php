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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('course_id')->constrained('courses');
            $table->integer('project_count');
            $table->integer('duration_days');
            $table->decimal('amount_paid', 8, 2);
            $table->string('paypal_transaction_id')->nullable();
            $table->enum('status', ['active', 'expired', 'cancelled', 'pending']);
            $table->datetime('starts_at');
            $table->datetime('expires_at');
            $table->boolean('auto_renewal')->default(false);
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
