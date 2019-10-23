<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentModel extends Model
{
    protected $table = "equipment";
    protected $fillable = ['equipment_name', 'equipment_number', 'equipment_category', 'location', 'fuel_capacity', 'machine_hours', 'last_machine_hours', 'last_maintenance', 'pic'];

    public $timestamps = false;
}
