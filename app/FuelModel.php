<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelModel extends Model
{
    protected $table = "penerimaan_fuel";
    protected $fillable = ['quantity', 'amount', 'vendor', 'fuel', 'tank_number', 'invoice_number', 'document_date', 'posting_date', 'driver_name', 'recipient'];
    public $timestamps = false;
}
