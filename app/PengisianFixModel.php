<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengisianFixModel extends Model
{
    protected $table = "pengisian_fix";
    protected $fillable = ['id_driver', 'unit_equipment', 'qty_solar', 'odometer', 'remark'];
}
