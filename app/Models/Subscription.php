<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'project_count',
        'duration_days',
        'amount_paid',
        'paypal_transaction_id',
        'status',
        'starts_at',
        'expires_at',
        'auto_renewal',
        'metadata',
    ];

    protected $casts = [
        'amount_paid' => 'decimal:2',
        'metadata' => 'array',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
        'auto_renewal' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function isActive(): bool
    {
        return $this->status === 'active' &&
               $this->starts_at->isPast() &&
               $this->expires_at->isFuture();
    }

    public function isExpired(): bool
    {
        return $this->expires_at->isPast() && $this->status !== 'cancelled';
    }
}
