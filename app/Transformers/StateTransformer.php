<?php

namespace App\Transformers;

use App\Models\State;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\NullResource;

class StateTransformer extends Transformer {
	/**
	 * Resources that can be included if requested.
	 *
	 * @var array
	 */
	protected array $availableIncludes = [
		'cities',
	];

	/**
	 * A Fractal transformer.
	 *
	 * @param State $state
	 * @return array
	 */
	public function transform(State $state) {
		return [
			'id' => $state->id,
			'slug' => $state->slug,
			'name' => $state->name,
		];
	}

	/**
	 * Include the cities of the state.
	 *
	 * @param State $state
	 * @return Collection|NullResource
	 */
	public function includeCities(State $state) {
		$cities = $state->cities;

		return $cities
		? $this->collection($cities, new CityTransformer)
		: $this->null();
	}
}
