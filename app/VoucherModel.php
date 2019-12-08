<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoucherModel extends Model
{
    use SoftDeletes;

    protected $table = "voucher";
    protected $guarded = [];

    public function vouchercodes()
    {
        return $this->hasMany('App\Vouchercode', 'voucher_id', 'id');
    }

    public function voucherowner()
    {
        return $this->belongsTo('App\OwnerModel', 'owner', 'id')->withTrashed();
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();
        self::deleting(function($voucher) { // before delete() method call this
            $voucher->vouchercodes()->each(function($vouchercode) {
                $vouchercode->delete();
            });
             // do the rest of the cleanup...
        });
    }
}
