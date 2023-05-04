<?php

use App\Http\Controllers\CountryStateCityMethods;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'countries'=>\App\Models\Country::orderBy('name','DESC')->get()
    ]);
});

Route::get('/country/{country}/states',[CountryStateCityMethods::class,'countryStates'])->name('countryStates');
Route::get('/state/{state}/cities',[CountryStateCityMethods::class,'countryStatesCities'])->name('countryStatesCities');



