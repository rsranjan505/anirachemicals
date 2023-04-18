<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','order_id','product_id','quantity','unit','unit_price','total_price'];
	protected $dates = ['created_at', 'updated_at'];


    public function customer(){
        return $this->belongsTo(Vendor::class,'customer_id');
    }

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
