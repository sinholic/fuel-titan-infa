<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id', 'id')->withTrashed();
    }

    public function companycode()
    {
        return $this->belongsTo('App\Companycode', 'companycode_id', 'id')->withTrashed();
    }

    public function fixassignments()
    {
        return $this->belongsToMany('App\FixStationModel', 'userassignments', 'user_id', 'station_id')->wherePivot('mobile', 0)->withPivot('start_date', 'end_date', 'mobile')->withTimestamps();
    }

    public function mobileassignments()
    {
        return $this->belongsToMany('App\MobileModel', 'userassignments', 'user_id', 'station_id')->wherePivot('mobile', 1)->withPivot('start_date', 'end_date', 'mobile')->withTimestamps();
    }

    public function reloadingunits_user_eq()
    {
        return $this->hasMany('App\Reloadingunit', 'equipmentuser_id', 'id');
    }

    public function reloadingunits_user_login()
    {
        return $this->hasMany('App\Reloadingunit', 'loginuser_id', 'id');
    }

    public function timesheets()
    {
        return $this->hasMany('App\UserheModel', 'pengawas', 'id');
    }
}
