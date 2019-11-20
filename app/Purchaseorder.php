<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchaseorder extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function receives()
    {
        return $this->hasMany('App\PenerimaanModel', 'purchaseorder_id', 'id');
    }
}
