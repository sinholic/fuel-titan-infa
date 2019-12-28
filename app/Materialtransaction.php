<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materialtransaction extends Model
{
    //
    public $table = "materialtransactions";
    public function materials()
    {
        // return $this->belongsTo('App\FixStationModel', 'kode_barang', 'id');
        return $this->belongsTo('App\MaterialsModel', 'material_id', 'id');
    }
}
