<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipeModel extends Model
{
    use SoftDeletes;
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
