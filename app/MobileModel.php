<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MobileModel extends Model
{
    use SoftDeletes;
    protected $table = "mobile_station";
    protected $fillable = ['number_vehicle', 'name_vehicle', 'fuel_capacity', 'induk_station', 'fuelman_assignment'];
}
