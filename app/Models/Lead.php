<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'message',
        'source',
        'status',
        'priority',
        'type',
        'service_id',
        'service_name',
        'notes',
        'assigned_to',
        'contacted_at',
        'follow_up_at',
        'metadata',
    ];

    protected $casts = [
        'contacted_at' => 'datetime',
        'follow_up_at' => 'datetime',
        'metadata' => 'array',
    ];

    /**
     * Get the admin assigned to this lead
     */
    public function assignedAdmin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'assigned_to');
    }

    /**
     * Get the service/product this lead is about
     */
    public function service()
    {
        if ($this->type === 'service') {
            return $this->belongsTo(Service::class, 'service_id');
        } elseif ($this->type === 'product') {
            return $this->belongsTo(Product::class, 'service_id');
        }
        return null;
    }

    /**
     * Scope for new leads
     */
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    /**
     * Scope for contacted leads
     */
    public function scopeContacted($query)
    {
        return $query->where('status', 'contacted');
    }

    /**
     * Scope for qualified leads
     */
    public function scopeQualified($query)
    {
        return $query->where('status', 'qualified');
    }

    /**
     * Scope for converted leads
     */
    public function scopeConverted($query)
    {
        return $query->where('status', 'converted');
    }

    /**
     * Scope for high priority leads
     */
    public function scopeHighPriority($query)
    {
        return $query->where('priority', 'high');
    }

    /**
     * Scope for urgent leads
     */
    public function scopeUrgent($query)
    {
        return $query->where('priority', 'urgent');
    }

    /**
     * Scope for leads needing follow-up
     */
    public function scopeNeedsFollowUp($query)
    {
        return $query->where('follow_up_at', '<=', now())
                    ->where('status', '!=', 'converted')
                    ->where('status', '!=', 'lost');
    }

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'new' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
            'contacted' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
            'qualified' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200',
            'converted' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
            'lost' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
            default => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200',
        };
    }

    /**
     * Get priority badge color
     */
    public function getPriorityColorAttribute()
    {
        return match($this->priority) {
            'low' => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200',
            'medium' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
            'high' => 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200',
            'urgent' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
            default => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200',
        };
    }

    /**
     * Get source badge color
     */
    public function getSourceColorAttribute()
    {
        return match($this->source) {
            'website' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
            'phone' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
            'email' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200',
            'social' => 'bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-200',
            'referral' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200',
            default => 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200',
        };
    }
}
