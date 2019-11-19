<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenerimaanModel extends Model
{
    use SoftDeletes;
    protected $table = "penerimaan";
    protected $fillable = ['remark', 'supplier', 'no_po', 'qty', 'no_tangki'];
    
    public function purchaseorder()
    {
        return $this->belongsTo('App\Purchaseorder', 'no_po', 'id');
    }
}
