<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','customer_name','email','mobile','address','state_id','city_id','pincode','is_freight','bill_amount','is_delivered','delivered_date','created_by'];
	protected $dates = ['created_at', 'updated_at'];


    public function customer(){
        return $this->belongsTo(Vendor::class,'customer_id');
    }

    public function state(){
        return $this->belongsTo(State::class,'state_id');
    }

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class,'order_id');
    }
}
