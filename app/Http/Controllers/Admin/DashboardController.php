<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){

        if(Auth::user()){
            $data['vendor'] = Vendor::all()->count();
            $data['product'] = Product::all()->count();
            $data['orderDelivered'] = Order::where('is_delivered',1)->get()->count();
            $data['orderPending'] = Order::where('is_delivered',0)->get()->count();

            return view('admin.pages.dashboard',['data' =>$data]);
        }
        return view('admin.auth.login');
    }

    public function index_demo()
    {
        return view('admin.dashboards-analytics');
    }

}
