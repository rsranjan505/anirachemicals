<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $fillable = ['name_of_establishment','establishment_type','address','city_id','state_id','pincode','email','mobile','key_person','status','source','product_interest','latitude','longitude','description','created_by'];
	protected $dates = ['created_at', 'updated_at'];

    //here is many to one polymorph
    public function document()
    {
        return $this->morphOne(AssetFile::class, 'pictureable','model_type', 'model_id');
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
}
