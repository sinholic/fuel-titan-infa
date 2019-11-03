<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReloadingModel extends Model
{
    protected $table = "reloading";
    protected $fillable = ['no_po', 'unit_mobile_station', 'driver_mobile_statis', 'qty_solar', 'odometer'];
}
