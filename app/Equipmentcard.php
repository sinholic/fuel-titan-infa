<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipmentcard extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function equipment()
    {
        return $this->belongsTo('App\EquipmentModel', 'equipment_id', 'id')->withTrashed();
    }
}
