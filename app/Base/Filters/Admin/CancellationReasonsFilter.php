<?php

namespace App\Base\Filters\Admin;

use App\Base\Libraries\QueryFilter\FilterContract;
use Illuminate\Database\Eloquent\Builder;

/**
 * Test filter to demonstrate the custom filter usage.
 * Delete later.
 */
class CancellationReasonsFilter implements FilterContract
{
    /**
     * The available filters.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'arrived',
        ];
    }

    /**
     * Just a name method to demonstrate the filter usage.
     *
     * @param Builder $builder
     * @param mixed|null $value
     */
    public function arrived($builder, $value = null)
    {
        $builder->where('arrival_status', $value);
    }
}
