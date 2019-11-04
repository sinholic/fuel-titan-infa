<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoucherModel extends Model
{
    use SoftDeletes;

    protected $table = "voucher";
    protected $fillable = ['code_number', 'qty', 'owner', 'expired_date', '', ''];

    public function vouchercodes()
    {
        return $this->hasMany('App\Vouchercode', 'voucher_id', 'id');
    }

    public function voucherowner()
    {
        return $this->belongsTo('App\OwnerModel', 'owner', 'id');
    }
}
