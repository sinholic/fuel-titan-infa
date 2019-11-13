<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentModel extends Model
{
    use SoftDeletes;
    protected $table = "equipment_unitdata";
    protected $guarded = [];

    public function equipmentowner()
    {
        return $this->belongsTo('App\OwnerModel', 'pic', 'id');
    }

    public function equipmentcategory()
    {
        return $this->belongsTo('App\Equipmentcategory', 'equipment_category', 'id');
    }


    public function reloadingunits()
    {
        return $this->belongsTo('App\Reloadingunit', 'equipment_id', 'id');
    }

    public function cards()
    {
        return $this->hasMany('App\Equipmentcard', 'equipment_id', 'id');
    }
}
