<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLog extends Model
{
    use HasFactory;
    protected $fillable = ['action', 'model_type','model_id','logs','changes','created_by'];
	protected $dates = ['created_at', 'updated_at'];

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function logable()
    {
        return $this->morphTo(__FUNCTION__, 'model_type', 'model_id');
    }
}
