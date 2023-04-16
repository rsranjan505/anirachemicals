<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = ['name_of_establishment','establishment_type','partner_details','pan', 'gst','address','city','state','pincode','email','size','mobile','key_person','dob','marriage_aniversory','previous_product_details','suggestions','is_active','created_by'];
	protected $dates = ['created_at', 'updated_at'];

    //here is many to one polymorph
    public function document()
    {
        return $this->morphOne(AssetFile::class, 'pictureable','model_type', 'model_id');
    }
}
