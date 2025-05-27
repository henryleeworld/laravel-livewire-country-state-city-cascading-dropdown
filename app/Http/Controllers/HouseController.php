<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\House;
use App\Http\Requests\StoreHouseRequest;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();

        return view('houses.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHouseRequest $request)
    {
        $house = House::create($request->all());
        return redirect('houses/create')->with('status', __('House updated!') );
    }
}
