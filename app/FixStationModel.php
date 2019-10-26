<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixStationModel extends Model
{
    protected $table = "fix_station";
    protected $fillable = ['name_station', 'address', 'nama_lokasi', 'koordinat_gps', 'tank_number', 'fuel_capacity', 'fuel_assignment', 'last_refuel', 'ending_stock_date', 'ending_stock_quantity'];
}
