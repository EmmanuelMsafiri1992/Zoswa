<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'instructions',
        'course_id',
        'order',
        'difficulty',
        'requirements',
        'starter_files',
        'expected_outputs',
        'max_score',
        'is_published',
    ];

    protected $casts = [
        'requirements' => 'array',
        'starter_files' => 'array',
        'expected_outputs' => 'array',
        'is_published' => 'boolean',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
