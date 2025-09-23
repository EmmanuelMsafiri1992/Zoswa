<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupportRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'project_title',
        'project_description',
        'project_type',
        'urgency',
        'expected_timeframe',
        'project_duration',
        'budget_min',
        'budget_max',
        'technical_requirements',
        'attachments',
        'status',
        'assigned_to',
        'admin_notes',
        'responded_at',
    ];

    protected $casts = [
        'attachments' => 'array',
        'budget_min' => 'decimal:2',
        'budget_max' => 'decimal:2',
        'responded_at' => 'datetime',
    ];

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function getUrgencyBadgeAttribute()
    {
        return match($this->urgency) {
            'low' => 'bg-green-100 text-green-800',
            'medium' => 'bg-yellow-100 text-yellow-800',
            'high' => 'bg-orange-100 text-orange-800',
            'urgent' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'in_review' => 'bg-blue-100 text-blue-800',
            'assigned' => 'bg-purple-100 text-purple-800',
            'in_progress' => 'bg-indigo-100 text-indigo-800',
            'completed' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    public function getBudgetRangeAttribute()
    {
        if (!$this->budget_min && !$this->budget_max) {
            return 'Not specified';
        }

        if ($this->budget_min && $this->budget_max) {
            return '$' . number_format($this->budget_min, 2) . ' - $' . number_format($this->budget_max, 2);
        }

        if ($this->budget_min) {
            return 'From $' . number_format($this->budget_min, 2);
        }

        return 'Up to $' . number_format($this->budget_max, 2);
    }
}
