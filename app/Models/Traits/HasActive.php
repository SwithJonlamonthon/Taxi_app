<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasActive
{
    /**
     * Scope a query to add the active condition.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Scope a query to add the inactive condition.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInactive($query)
    {
        return $query->where('active', false);
    }

    /**
     * Check if active.
     *
     * @return bool
     */
    public function isActive()
    {
        return (bool) $this->active;
    }
}
