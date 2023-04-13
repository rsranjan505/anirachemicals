<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){
        // if(!Auth::login()){
            return view('admin.pages.dashboard');
        // }
        // return view('admin.auth.login');
    }

}
