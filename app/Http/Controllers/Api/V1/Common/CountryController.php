<?php

namespace App\Http\Controllers\Api\V1\Common;

use App\Models\Country;
use App\Http\Controllers\ApiController;
use App\Transformers\CountryTransformer;
use Illuminate\Http\JsonResponse;

/**
 * @group Countries
 *
 * Get countries
 */
class CountryController extends ApiController
{
    /**
     * Get all the countries.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $countriesQuery = Country::active();

        $countries = filter($countriesQuery, new CountryTransformer)->defaultSort('name')->get();

        return $this->respondOk($countries);
    }
}
