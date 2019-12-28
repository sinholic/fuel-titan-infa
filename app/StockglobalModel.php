<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockglobalModel extends Model
{
    //
    public $table = "stockopnameglobal";

    public function materials()
    {
        // return $this->belongsTo('App\FixStationModel', 'kode_barang', 'id');
        return $this->belongsTo('App\MaterialsModel', 'kode_barang', 'id');
    }
}
