<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::with('instructor')->where('is_active', true);

        // Filter by category
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // Filter by difficulty
        if ($request->has('difficulty')) {
            $query->where('difficulty', $request->difficulty);
        }

        // Search by title or description
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $courses = $query->orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $courses
        ]);
    }

    public function show(Course $course)
    {
        $course->load('instructor', 'projects');

        return response()->json([
            'success' => true,
            'data' => $course
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:web_development,data_analysis,ai_ml',
            'difficulty' => 'required|in:beginner,intermediate,advanced',
            'price' => 'required|numeric|min:0',
            'technologies' => 'sometimes|array',
            'estimated_hours' => 'sometimes|integer|min:1',
        ]);

        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'difficulty' => $request->difficulty,
            'instructor_id' => $request->user()->id,
            'price' => $request->price,
            'technologies' => $request->technologies ?? [],
            'estimated_hours' => $request->estimated_hours,
            'is_active' => true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Course created successfully',
            'data' => $course
        ], 201);
    }

    public function update(Request $request, Course $course)
    {
        // Check if user is instructor of this course or admin
        if ($course->instructor_id !== $request->user()->id && !$request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'category' => 'sometimes|in:web_development,data_analysis,ai_ml',
            'difficulty' => 'sometimes|in:beginner,intermediate,advanced',
            'price' => 'sometimes|numeric|min:0',
            'technologies' => 'sometimes|array',
            'estimated_hours' => 'sometimes|integer|min:1',
            'is_active' => 'sometimes|boolean',
        ]);

        $course->update($request->only([
            'title', 'description', 'category', 'difficulty',
            'price', 'technologies', 'estimated_hours', 'is_active'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Course updated successfully',
            'data' => $course
        ]);
    }

    public function destroy(Request $request, Course $course)
    {
        // Check if user is instructor of this course or admin
        if ($course->instructor_id !== $request->user()->id && !$request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $course->delete();

        return response()->json([
            'success' => true,
            'message' => 'Course deleted successfully'
        ]);
    }
}
