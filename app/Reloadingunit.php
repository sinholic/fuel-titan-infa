<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reloadingunit extends Model
{
    use SoftDeletes;
    protected $fillable = ['origin', 'odometer', 'qty', 'ending_stock', 'machinehours', 'equipment_id', 'station_id', 'equipmentuser_id', 'loginuser_id', 'remark', 'remark2', 'remark3'];

    public function equipment()
    {
        return $this->belongsTo('App\EquipmentModel', 'equipment_id', 'id')->withTrashed();
    }
    
    public function equipmentuser()
    {
        return $this->belongsTo('App\User', 'equipmentuser_id', 'id')->withTrashed();
    }

    public function loginuser()
    {
        return $this->belongsTo('App\User', 'loginuser_id', 'id')->withTrashed();
    }
}
