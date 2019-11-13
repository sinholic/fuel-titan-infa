<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QtySolarModel extends Model
{
    protected $table = "qty_solar";
    protected $fillable = ['qty_solar'];

    public function pengisian_mobile()
    {
        return $this->hasMany('App\PengisianMobileModel', 'qty_solar', 'id');
    }
}
