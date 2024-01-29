<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackingSize extends Model
{
    use HasFactory;
    protected $fillable = ['packing','product_id','internal_qty','internal_size','unit_id','volume','price','is_active','created_by'];
	protected $dates = ['created_at', 'updated_at'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }

    public function pricelogs(){
        return $this->hasMany(ProductPriceLog::class,'packing_sizes_id');
    }
}
