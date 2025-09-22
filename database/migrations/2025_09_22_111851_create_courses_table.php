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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('category', ['web_development', 'data_analysis', 'ai_ml']);
            $table->enum('difficulty', ['beginner', 'intermediate', 'advanced']);
            $table->foreignId('instructor_id')->constrained('users');
            $table->decimal('price', 8, 2);
            $table->boolean('is_active')->default(true);
            $table->json('technologies')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('estimated_hours')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
