<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait UserAccessScopeTrait
{
    /**
     * Scope a query to check if the user belongs to the role using its name.
     *
     * @param Builder $query
     * @param array $roleSlugs
     * @return Builder
     */
    public function scopeBelongsToRole($query, ...$roleSlugs)
    {
        if (is_array($roleSlugs[0])) {
            $roleSlugs = $roleSlugs[0];
        }

        return $query->whereHas('roles', function ($query) use ($roleSlugs) {
            $query->whereIn('slug', $roleSlugs);
        });
    }

    /**
     * Scope a query to check if the user doesn't belong to the role using its name.
     *
     * @param Builder $query
     * @param array $roleSlugs
     * @return Builder
     */
    public function scopeDoesNotBelongToRole($query, ...$roleSlugs)
    {
        if (is_array($roleSlugs[0])) {
            $roleSlugs = $roleSlugs[0];
        }

        return $query->whereHas('roles', function ($query) use ($roleSlugs) {
            $query->whereNotIn('slug', $roleSlugs);
        });
    }
}
