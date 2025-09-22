<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'difficulty',
        'instructor_id',
        'price',
        'is_active',
        'technologies',
        'thumbnail',
        'estimated_hours',
    ];

    protected $casts = [
        'technologies' => 'array',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function codeLabs(): HasMany
    {
        return $this->hasMany(CodeLab::class);
    }
}
