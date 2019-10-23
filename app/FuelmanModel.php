<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelmanModel extends Model
{
    protected $table = "fuelman";
    protected $fillable = ['nik', 'name', 'location_assignment', 'password_login', 'password_sync', 'imei'];
    public $timestamps = false;
}
