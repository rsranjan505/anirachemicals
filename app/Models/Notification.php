<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['read_at', 'data'];
	protected $dates = ['read_at'];
    /**
     * Cast variables to specified data types
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
        'id' => 'string'
    ];
}
