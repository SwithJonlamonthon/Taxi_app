<?php

namespace App\Base\Libraries\QueryFilter;

use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use League\Fractal\Serializer\SerializerAbstract;
use League\Fractal\TransformerAbstract;
use Spatie\Fractal\Fractal;

interface QueryFilterContract {
	/**
	 * Set the Query Builder.
	 *
	 * @param Builder $builder
	 * @return $this
	 */
	public function builder(Builder $builder);

	/**
	 * Set the custom filter.
	 *
	 * @param FilterContract $filter
	 * @return $this
	 */
	public function customFilter(FilterContract $filter);

	/**
	 * Set the transformer and serializer to be used for data transformation.
	 * Setting the transformer enables the data transformation.
	 *
	 * @param TransformerAbstract|callable $transformer
	 * @param SerializerAbstract|null $serializer
	 * @return $this
	 */
	public function transformWith($transformer, $serializer = null);

	/**
	 * Set the default sort order if none are provided in the query string.
	 *
	 * @param string $sort
	 * @return $this
	 */
	public function defaultSort($sort);

	/**
	 * Manually specify additional relations to add to includes.
	 * The relations can be an array or string or multiple string inputs.
	 *
	 * @param string|array $includes
	 * @return $this
	 */
	public function customIncludes($includes);

	/**
	 * Lazy eager load all the requested relationships.
	 *
	 * @param Model|Collection|null $modelOrCollection
	 * @return Model|Collection|Fractal|null
	 * @throws Exception
	 */
	public function loadIncludes($modelOrCollection);

	/**
	 * Apply the filters and get the first result.
	 *
	 * @param array $columns
	 * @return Model|Fractal|null
	 */
	public function first($columns = ['*']);

	/**
	 * Apply the filters and get the result.
	 *
	 * @param array $columns
	 * @return Collection|LengthAwarePaginator|Fractal|null
	 */
	public function get($columns = ['*']);

	/**
	 * Apply the filters and paginate the result.
	 *
	 * @param array $columns
	 * @return LengthAwarePaginator|Fractal
	 */
	public function paginate($columns = ['*']);
}
