<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'role_id',
        'user_type',
        'department_id',
        'designation_id',
        'joining_date',
        'address',
        'state_id',
        'city_id',
        'pincode',
        'is_active',
        'is_admin',
        'mobile',
        'email',
        'password'
    ];

     //here is many to one polymorph
    public function image()
     {
         return $this->morphOne(AssetFile::class, 'pictureable','model_type', 'model_id')->latestOfMany();
     }

    public function state(){
         return $this->belongsTo(State::class,'state_id');
     }

    public function city(){
         return $this->belongsTo(City::class,'city_id');
     }

    public function team(){
        return $this->belongsTo(Team::class,'team_id');
    }

    public function designation(){
        return $this->belongsTo(Designation::class,'designation_id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

         /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

     /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

     /**
	 * The name of the "created at" column.
	 *
	 * @var string|null
	 */
	const CREATED_AT = 'created_at';

	/**
	 * The name of the "updated at" column.
	 *
	 * @var string|null
	 */
	const UPDATED_AT = 'updated_at';
    // const DELETED_AT = 'deleted_at';
}
