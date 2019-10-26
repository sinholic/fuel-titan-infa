<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileModel extends Model
{
    protected $table = "mobile_station";
    protected $fillable = ['number_vehicle', 'name_vehicle', 'fuel_capacity', 'induk_station', 'fuelman_assignment'];
}
