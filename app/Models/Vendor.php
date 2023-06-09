<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{
    use HasFactory;
    use Notifiable;
    protected $fillable = ['name_of_establishment','establishment_type','partner_details','pan', 'gst','address','city','state','pincode','email','mobile','key_person','dob','marriage_aniversory','previous_product_details','suggestions','is_active','created_by'];
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
    public function getState(){
        return $this->belongsTo(State::class,'state');
    }

    public function getCity(){
        return $this->belongsTo(City::class,'city');
    }

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }
}
