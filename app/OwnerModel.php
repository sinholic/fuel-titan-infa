<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OwnerModel extends Model
{
    use SoftDeletes;
    protected $table = "owner";
    protected $fillable = ['vendor', 'address', 'owner_category', 'pic', 'phone', 'email'];

    public function vouchers()
    {
        return $this->hasMany('App\VoucherModel', 'owner', 'id');
    }

    public function equipments()
    {
        return $this->hasMany('App\EquipmentModel', 'pic', 'id');
    }
}
