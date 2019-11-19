<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QtySolarModel extends Model
{
    use SoftDeletes;

    protected $table = "qty_solar";
    protected $fillable = ['qty_solar'];

    public function pengisian_mobile()
    {
        return $this->hasMany('App\PengisianMobileModel', 'qty_solar', 'id');
    }
}
