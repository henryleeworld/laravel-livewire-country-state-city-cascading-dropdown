<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;

Route::resource('houses', HouseController::class)
    ->only(['create', 'store']);

Route::get('cities', [CityController::class, 'index'])
    ->name('cities.index');

Route::get('states', [StateController::class, 'index'])
    ->name('states.index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
