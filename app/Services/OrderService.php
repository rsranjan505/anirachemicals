<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class OrderService
{
    protected $defaultPage = 5;
    protected $orderBy = 'DESC';

    public function getAllOrders()
    {
        $order = Order::with('customer','state','city','creator','orderItems','orderItems.product','orderItems.packing_size');

        if(auth()->user()->hasRole('Employee')){
            $order->where('created_by',auth()->user()->id);
        }elseif(auth()->user()->hasRole('Supervisor')){
            $teams = Team::where('team_lead_id',auth()->user()->id)->pluck('id');
            $users = User::whereIn('id',$teams)->pluck('id');
            $order->whereIn('created_by',$users);

        }elseif(auth()->user()->hasRole('Admin')){
            $order;
        }

        return $order->orderBy('id',$this->orderBy)->paginate($this->defaultPage);
    }

    public function getOrdersByFilter($request)
    {
        $order = Order::with('customer','state','city','creator','orderItems','orderItems.product','orderItems.packing_size');

        if(auth()->user()->hasRole('Employee')){
            $order->where('created_by',auth()->user()->id);
        }elseif(auth()->user()->hasRole('Supervisor')){
            $teams = Team::where('team_lead_id',auth()->user()->id)->pluck('id');
            $users = User::whereIn('id',$teams)->pluck('id');
            $order->whereIn('created_by',$users);

        }elseif(auth()->user()->hasRole('Admin')){
            $order;
        }

        $order
        ->where( function($q)use($request){
            if($request->search !='' && $request->search ){
                $q->where('customer_name', 'like', '%'.$request->search.'%')
                ->orWhere('product_name', 'like', '%'.$request->search.'%')
                ->orWhere('date', 'like', '%'.$request->search.'%');
            }

        })
        ->orderBy('id',$this->orderBy)
        ->paginate($this->defaultPage);
    }

    //for select option
    public function getorders($page=null): ?Collection
    {
        return Order::with('customer','state','city','creator','orderItems')->get();
    }



}
