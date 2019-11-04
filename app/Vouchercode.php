<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vouchercode extends Model
{
    use SoftDeletes;

    protected $fillable = ['code_number', 'voucher_id', 'used'];

    public function voucher()
    {
        return $this->belongsTo('App\VoucherModel', 'voucher_id', 'id');
    }
}
