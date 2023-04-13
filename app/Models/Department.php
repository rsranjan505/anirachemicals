<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','is_active','created_by'];
	protected $dates = ['created_at', 'updated_at'];

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }

}
