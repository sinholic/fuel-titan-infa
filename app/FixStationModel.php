<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FixStationModel extends Model
{
    use SoftDeletes;
    protected $table = "fix_station";
    protected $fillable = ['name_station', 'address', 'nama_lokasi', 'koordinat_gps', 'tank_number', 'fuel_capacity', 'fuel_assignment', 'last_refuel', 'ending_stock_date', 'ending_stock_quantity'];
}
