<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockItems extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','packing_type','packing_size','quantity','unit','mrp'];
	protected $dates = ['created_at', 'updated_at'];


    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
