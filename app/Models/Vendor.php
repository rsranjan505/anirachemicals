<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{
    use HasFactory;
    use Notifiable;
    protected $fillable = ['name_of_establishment','establishment_type','partner_details','pan', 'gst','address','city_id','state_id','pincode','email','mobile','key_person','dob','marriage_aniversory','previous_product_details','suggestions','is_active','created_by'];
	protected $dates = ['created_at', 'updated_at'];

    //here is many to one polymorph
    public function image()
    {
        return $this->morphOne(AssetFile::class, 'pictureable','model_type', 'model_id')->where('document_type','avatar');
    }

    public function document()
    {
        return $this->morphMany(AssetFile::class, 'pictureable','model_type', 'model_id')->where('document_type','support_document');
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

    public function statuslogs()
    {
        return $this->morphMany(StatusLog::class, 'logable','model_type', 'model_id');
    }
}
