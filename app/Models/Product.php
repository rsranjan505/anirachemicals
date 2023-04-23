<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','code','brand','form','dosage','description','advantages','other_details','manufactured_by','manufactured_date','is_active','created_by'];
	protected $dates = ['created_at', 'updated_at'];

    //here is many to one polymorph
    public function images()
    {
        return $this->morphOne(AssetFile::class, 'pictureable','model_type', 'model_id');
    }

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function stockItems(){
        return $this->hasMany(StockItems::class,'id');
    }
}
