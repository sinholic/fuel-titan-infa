<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerkModel extends Model
{
    use SoftDeletes;
    protected $table = "merk";
    protected $guarded = [];

    public function tipe_equipment()
    {
        return $this->hasMany('App\TipeModel', 'merk', 'id');
    }
}
