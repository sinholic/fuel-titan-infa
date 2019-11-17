<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeModel extends Model
{
    protected $table = 'tipe_equipment';
    protected $guarded = [];

    public function equipmentmerk()
    {
        return $this->belongsTo('App\MerkModel', 'merk', 'id');
    }

    public function equipment()
    {
        return $this->hasMany('App\EquipmentModel', 'tipe', 'id');
    }
}
