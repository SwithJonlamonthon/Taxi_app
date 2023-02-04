<?php

namespace App\Base\Filters;

use App\Base\Libraries\QueryFilter\FilterContract;
use Illuminate\Database\Eloquent\Builder;

/**
 * Test filter to demonstrate the custom filter usage.
 * Delete later.
 */
class TestFilter implements FilterContract {
	/**
	 * The available filters.
	 *
	 * @return array
	 */
	public function filters() {
		return [
			'dummy',
		];
	}

	/**
	 * Just a dummy method to demonstrate the filter usage.
	 *
	 * @param Builder $builder
	 * @param mixed|null $value
	 */
	public function dummy($builder, $value = null) {
		$builder->where('example', $value);
	}
}
