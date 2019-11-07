<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengisianMobileModel extends Model
{
    protected $table = "pengisian_mobile";
    protected $fillable = ['unit_equipment', 'id_driver', 'qty_solar', 'odometer', 'remark'];
}
