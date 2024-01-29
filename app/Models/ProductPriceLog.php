<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPriceLog extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','packing_sizes_id','price','updated_by'];
	protected $dates = ['created_at', 'updated_at'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function packing_size(){
        return $this->belongsTo(PackingSize::class,'packing_sizes_id');
    }

    public function creator(){
        return $this->belongsTo(User::class,'updated_by');
    }

}
