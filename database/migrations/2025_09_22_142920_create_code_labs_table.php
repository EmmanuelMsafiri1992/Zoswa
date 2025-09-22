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
        Schema::create('code_labs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('instructions');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->enum('programming_language', ['javascript', 'python', 'php', 'java', 'cpp', 'html', 'css']);
            $table->json('starter_code')->nullable();
            $table->json('solution_code')->nullable();
            $table->json('test_cases')->nullable();
            $table->json('files')->nullable();
            $table->enum('difficulty', ['beginner', 'intermediate', 'advanced']);
            $table->integer('estimated_time')->default(30);
            $table->integer('max_score')->default(100);
            $table->boolean('is_published')->default(false);
            $table->integer('order')->default(0);
            $table->json('hints')->nullable();
            $table->json('resources')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('code_labs');
    }
};
