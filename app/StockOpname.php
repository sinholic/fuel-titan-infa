<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockOpname extends Model
{
    use SoftDeletes;
    protected $table = "stockopname";
    protected $fillable = ['companycode_id', 'fixstation_id', 'qty', 'tanggal_pengukuran'];

}
