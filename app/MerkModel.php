<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerkModel extends Model
{
    protected $table = "merk";
    protected $guarded = [];

    public function tipe_equipment()
    {
        return $this->hasMany('App\TipeModel', 'merk', 'id');
    }
}
