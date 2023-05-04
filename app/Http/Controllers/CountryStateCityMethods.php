<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CountryStateCityMethods extends Controller
{
    public function countryStates(Country $country){
        return $country->load('states');
    }

    public function countryStatesCities(State $state){
        return $state->load('cities');
    }
}
