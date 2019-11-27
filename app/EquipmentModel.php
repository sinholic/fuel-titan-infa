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
        return $this->belongsTo('App\OwnerModel', 'owner_id', 'id')->withTrashed();
    }

    public function equipmentcategory()
    {
        return $this->belongsTo('App\Equipmentcategory', 'equipment_category', 'id')->withTrashed();
    }

    public function mobile()
    {
        return $this->hasOne('App\MobileModel', 'equipment_id', 'id');
    }

    public function reloadingunits()
    {
        return $this->hasMany('App\Reloadingunit', 'equipment_id', 'id');
    }

    public function cards()
    {
        return $this->hasMany('App\Equipmentcard', 'equipment_id', 'id');
    }

    public function equipmenttipe()
    {
        return $this->belongsTo('App\TipeModel', 'equipment_type', 'id')->withTrashed();
    }

    public function timesheets()
    {
        return $this->hasMany('App\UserheModel', 'equipment_id', 'id');
    }
}
