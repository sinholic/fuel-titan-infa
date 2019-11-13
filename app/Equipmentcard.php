<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipmentcard extends Model
{
    protected $guarded = [];

    public function equipment()
    {
        return $this->belongsTo('App\EquipmentModel', 'equipment_id', 'id');
    }
}
