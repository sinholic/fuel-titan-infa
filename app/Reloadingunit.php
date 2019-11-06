<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reloadingunit extends Model
{
    use SoftDeletes;
    protected $fillable = ['origin', 'odometer', 'qty', 'ending_stock', 'machinehours', 'equipment_id'];

    public function equipment()
    {
        return $this->belongsTo('App\EquipmentModel', 'equipment_id', 'id');
    }
}
