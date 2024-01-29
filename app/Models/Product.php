<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','code','brand','form','type','dosage','description','advantages','uses','other_details','is_active','created_by'];
	protected $dates = ['created_at', 'updated_at'];

    //here is many to one polymorph
    public function allimages()
    {
        return $this->morphMany(AssetFile::class, 'pictureable','model_type', 'model_id');
    }

    public function image()
    {
        return $this->morphOne(AssetFile::class, 'pictureable','model_type', 'model_id')->latestOfMany();
    }

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function stockItems(){
        return $this->hasMany(StockItems::class,'id');
    }

    public function packingSizes(){
        return $this->hasMany(PackingSize::class,'id')->latestOfMany();
    }
}
