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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->longText('instructions');
            $table->foreignId('course_id')->constrained('courses');
            $table->integer('order');
            $table->enum('difficulty', ['beginner', 'intermediate', 'advanced']);
            $table->json('requirements');
            $table->json('starter_files')->nullable();
            $table->json('expected_outputs')->nullable();
            $table->integer('max_score')->default(100);
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
