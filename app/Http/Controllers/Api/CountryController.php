<?php

namespace App\Http\Controllers\Api;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $country = Country::paginate();

        return CountryResource::collection($country);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request): Country
    {
        return Country::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country): Country
    {
        return $country;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, Country $country): Country
    {
        $country->update($request->validated());

        return $country;
    }

    public function destroy(Country $country): Response
    {
        $country->delete();

        return response()->noContent();
    }
}
