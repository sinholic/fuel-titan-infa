<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\MaterialsModel;

class InventoriModel extends Model
{
    //
    // use SoftDeletes;
    public $table = "inventori";
    protected $fillable = ["kode_barang","saldo_awal","barang_in","barang_out","saldo_akhir"];
    protected $guarded = [];

    public function materials()
    {
        // return $this->belongsTo('App\FixStationModel', 'kode_barang', 'id');
        return $this->belongsTo('App\MaterialsModel', 'kode_barang', 'id');
    }

}
