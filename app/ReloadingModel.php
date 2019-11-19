<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReloadingModel extends Model
{
    use SoftDeletes;

    protected $table = "reloading";
    protected $fillable = ['no_po', 'unit_mobile_station', 'driver_mobile_statis', 'qty_solar', 'odometer'];
}
