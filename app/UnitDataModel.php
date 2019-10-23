<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitDataModel extends Model
{
    protected $table = "unit_data";
    protected $fillable = ['unit_number', 'unit_category', 'location', 'fuel_capacity', 'std_consumption', 'last_ending_stock', 'add_fuel', 'last_maintenance', 'pic'];
    public $timestamps = false;
}
