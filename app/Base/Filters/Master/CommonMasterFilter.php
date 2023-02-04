<?php

namespace App\Base\Filters\Master;

use App\Base\Libraries\QueryFilter\FilterContract;
use Illuminate\Database\Eloquent\Builder;

/**
 * Test filter to demonstrate the custom filter usage.
 * Delete later.
 */
class CommonMasterFilter implements FilterContract
{
    /**
     * The available filters.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'name',
        ];
    }

    /**
    * Default column to sort.
    *
    * @return string
    */
    public function defaultSort()
    {
        return '-created_at';
    }

    /**
     * Just a name method to demonstrate the filter usage.
     *
     * @param Builder $builder
     * @param mixed|null $value
     */
    public function name($builder, $value = null)
    {
        $builder->where('name', $value);
    }
}
