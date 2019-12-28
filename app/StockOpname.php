<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockOpname extends Model
{
    use SoftDeletes;
    protected $table = "stockopname";
    protected $fillable = ['companycode_id', 'fixstation_id', 'qty', 'tanggal_pengukuran'];
    public function company()
    {
        // return $this->belongsTo('App\FixStationModel', 'kode_barang', 'id');
        return $this->belongsTo('App\Companycode', 'companycode_id', 'id');
    } public function fixstation()
    {
        // return $this->belongsTo('App\FixStationModel', 'kode_barang', 'id');
        return $this->belongsTo('App\FixStationModel', 'fixstation_id', 'id');
    }
}
