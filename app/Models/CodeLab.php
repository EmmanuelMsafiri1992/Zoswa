<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CodeLab extends Model
{
    protected $fillable = [
        'title',
        'description',
        'instructions',
        'course_id',
        'programming_language',
        'starter_code',
        'solution_code',
        'test_cases',
        'files',
        'difficulty',
        'estimated_time',
        'max_score',
        'is_published',
        'order',
        'hints',
        'resources',
    ];

    protected $casts = [
        'starter_code' => 'array',
        'solution_code' => 'array',
        'test_cases' => 'array',
        'files' => 'array',
        'hints' => 'array',
        'resources' => 'array',
        'is_published' => 'boolean',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
