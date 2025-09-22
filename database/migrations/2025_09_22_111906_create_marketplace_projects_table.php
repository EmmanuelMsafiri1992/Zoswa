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
        Schema::create('marketplace_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->foreignId('client_id')->constrained('users');
            $table->foreignId('freelancer_id')->nullable()->constrained('users');
            $table->decimal('budget_min', 8, 2);
            $table->decimal('budget_max', 8, 2);
            $table->integer('deadline_days');
            $table->enum('status', ['open', 'assigned', 'in_progress', 'completed', 'disputed', 'cancelled']);
            $table->json('required_skills');
            $table->json('attachments')->nullable();
            $table->longText('requirements');
            $table->decimal('escrow_amount', 8, 2)->nullable();
            $table->string('paypal_transaction_id')->nullable();
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });

        Schema::create('marketplace_bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('marketplace_projects');
            $table->foreignId('freelancer_id')->constrained('users');
            $table->decimal('amount', 8, 2);
            $table->integer('delivery_days');
            $table->text('proposal');
            $table->enum('status', ['pending', 'accepted', 'rejected']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketplace_bids');
        Schema::dropIfExists('marketplace_projects');
    }
};
