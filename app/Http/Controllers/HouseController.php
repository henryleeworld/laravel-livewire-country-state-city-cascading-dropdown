<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\House;
use App\Http\Requests\StoreHouseRequest;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function create()
    {
        $countries = Country::all();

        return view('houses.create', compact('countries'));
    }

    public function store(StoreHouseRequest $request)
    {
        $house = House::create($request->all());
        return redirect('houses/create')->with('status', trans('frontend.houses.create.content.house_updated') );
    }
}
