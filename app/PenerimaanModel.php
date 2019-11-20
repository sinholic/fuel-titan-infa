<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenerimaanModel extends Model
{
    use SoftDeletes;
    protected $table = "penerimaan";
    protected $fillable = ['remark', 'purchaseorder_id', 'qty', 'fixstation_id'];
    
    public function purchaseorder()
    {
        return $this->belongsTo('App\Purchaseorder', 'purchaseorder_id', 'id');
    }

    public function fixstation()
    {
        return $this->belongsTo('App\FixStationModel', 'fixstation_id', 'id');
    }
}
