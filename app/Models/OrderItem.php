<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','product_id','packing_size_id','quantity','volume','unit','unit_price','total_price'];
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

    public function packing_size(){
        return $this->belongsTo(PackingSize::class,'packing_size_id');
    }
}
