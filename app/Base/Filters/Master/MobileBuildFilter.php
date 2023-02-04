<?php

namespace App\Base\Filters\Master;

use App\Base\Libraries\QueryFilter\FilterContract;
use Illuminate\Database\Eloquent\Builder;

/**
 * Test filter to demonstrate the custom filter usage.
 * Delete later.
 */
class MobileBuildFilter implements FilterContract
{
    /**
     * The available filters.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'team',
        ];
    }

    /**
     * Just a team method to demonstrate the filter usage.
     *
     * @param Builder $builder
     * @param mixed|null $value
     */
    public function team($builder, $value = null)
    {
        $builder->where('team', $value);
    }
}
