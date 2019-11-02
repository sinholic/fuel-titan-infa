<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentModel extends Model
{
    use SoftDeletes;
    protected $table = "equipment_unitdata";
    protected $fillable = ['equipment_number', 'equipment_category', 'location', 'fuel_capacity', 'machine_hours', 'last_machine_hours', 'std_consumption', 'last_ending_stock', 'add_fuel', 'last_maintenance', 'pic'];

}
