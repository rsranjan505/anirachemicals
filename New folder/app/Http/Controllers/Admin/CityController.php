<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    //
    public function getCity($id){
       $city = City::where('state_id',$id)->get();
       return $city;
    }

}
