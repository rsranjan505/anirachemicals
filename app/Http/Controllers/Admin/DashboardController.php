<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class DashboardController extends Controller
{
    //
    public function index(){


        if(Auth::user()){
            $data = $this->dashboardData();

            return view('admin.pages.dashboard',compact('data'));
        }
        return view('admin.auth.login');
    }

    public function dashboardData(): array
    {
        //last day visit
        //last month visit
        //today visit
        //team members
        //products for admin only

        $data=[];
        $visits = Visit::with('state','city','creator','image');
        $vendors =  Vendor::with('state','city','creator','image');

        if(auth()->user()->hasRole('Employee')){
            $data['visitcount'] = $visits->where('created_by',auth()->user()->id)->count();
            $data['vendorcount']  = $vendors->where('created_by',auth()->user()->id)->count();
        }elseif(auth()->user()->hasRole('Supervisor')){
            $teams = Team::where('team_lead_id',auth()->user()->id)->pluck('id');
            $users = User::whereIn('id',$teams)->pluck('id');
            $data['visitcount'] = $visits->whereIn('created_by',$users)->count();
            $data['vendorcount'] = $vendors->whereIn('created_by',$users)->count();
        }elseif(auth()->user()->hasRole('Admin')){
            $data['visitcount'] = $visits->count();
            $data['vendorcount'] = $vendors->count();
        }

        return $data;
    }

}
