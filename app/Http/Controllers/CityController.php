<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::whereHas('state', function ($query) {
            $query->whereId(request()->input('state_id', 0));
        })->pluck('name', 'id');

        return response()->json($cities);
    }
}
