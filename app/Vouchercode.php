<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vouchercode extends Model
{
    use SoftDeletes;

    protected $fillable = ['code_number', 'qty', 'owner', 'expired_date', '', ''];

    public function vouchercodes()
    {
        return $this->hasMany('App\Vouchercode', 'voucher_id', 'id');
    }
}
