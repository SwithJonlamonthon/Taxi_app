<?php

namespace App\Transformers;

use App\Models\City;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\NullResource;

class CityTransformer extends Transformer {
	/**
	 * Resources that can be included if requested.
	 *
	 * @var array
	 */
	protected array $availableIncludes = [
		'state',
	];

	/**
	 * A Fractal transformer.
	 *
	 * @param City $city
	 * @return array
	 */
	public function transform(City $city) {
		return [
			'id' => $city->id,
			'slug' => $city->slug,
			'name' => $city->name,
			'alias' => $city->alias,
		];
	}

	/**
	 * Include the state of the city.
	 *
	 * @param City $city
	 * @return Item|NullResource
	 */
	public function includeState(City $city) {
		$state = $city->state;

		return $state
		? $this->item($state, new StateTransformer)
		: $this->null();
	}

}
