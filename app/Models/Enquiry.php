<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email','mobile','subject','message','status','remarks'];
	protected $dates = ['created_at', 'updated_at'];

}
