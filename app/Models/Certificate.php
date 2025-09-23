<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Certificate extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'certificate_number',
        'title',
        'description',
        'issued_date',
        'completion_date',
        'completion_percentage',
        'final_score',
        'status',
        'skills_acquired',
        'verification_code',
        'expires_at',
    ];

    protected $casts = [
        'issued_date' => 'date',
        'completion_date' => 'date',
        'expires_at' => 'datetime',
        'skills_acquired' => 'array',
        'final_score' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($certificate) {
            $certificate->certificate_number = 'CERT-' . strtoupper(Str::random(8));
            $certificate->verification_code = Str::random(16);
        });
    }

    public function getVerificationUrlAttribute()
    {
        return url("/certificates/verify/{$this->verification_code}");
    }

    public function isExpired()
    {
        return $this->expires_at && $this->expires_at->isPast();
    }

    public function isActive()
    {
        return $this->status === 'active' && !$this->isExpired();
    }
}
