<?php

namespace App\Http\Controllers;

use App\Http\Requests\Country\CreateCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $countries = Country::query();

        if ($request->has('country_code')) {
            $countries->where('country_code', '=', $request->input('country_code'));
        }

        if ($request->has('country_name')) {
            $countries->where('country_name', '=', $request->input('country_name'));
        }

        if ($request->has('order') && $request->has('sort')) {
            $sort = $request->input('sort');
            $order = $request->input('order');

            $countries->orderBy($sort, $order);
        }

        $page = (int) $request->input('page', 1);
        $perPage = (int) $request->input('per_page', 10);
        $countries = $countries->paginate($perPage, ['*'], 'page', $page);
        $total = $countries->total();

        if ($countries->isEmpty()) {
            return response()->json([
                'message' => 'no countries found',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'message' => 'success get all countries',
            'data' => $countries->items(),
            'meta' => [
                'page' => $page,
                'perPage' => $perPage,
                'total' => $total,
                'total_page' => ceil($total / $perPage),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCountryRequest $request)
    {
        $data = $request->validated();

        $country = Country::create($data);

        return response()->json([
            'message' => 'success create new country',
            'data' => $country,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return response()->json([
            'message' => 'success get detail country',
            'data' => $country,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $data = $request->validated();

        $country->country_code = $data['country_code'];
        $country->country_name = $data['country_name'];
        $country->save();

        return response()->json([
            'message' => 'success update country',
            'data' => $country,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return response()->json([
            'message' => 'success delete country',
            'data' => null,
        ]);
    }
}
