<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StationModel extends Model
{
    protected $guarded = [];
    protected $table = "station";
    protected $fillable = ['nama_lokasi', 'address', 'koordinat_gps', 'tank_number', 'fuel_capacity', 'fuel_assignment', 'last_refuel', 'ending_stock_date', 'ending_stock_quantity'];
    public $timestamps = false;
}
