<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QtySolarModel extends Model
{
    protected $table = "qty_solar";
    protected $fillable = ['qty_solar'];

    public function qtysolar()
    {
        return $this->hasMany('App\QtySolarModel', 'qty_solar', 'id');
    }
}
