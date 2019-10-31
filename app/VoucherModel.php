<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoucherModel extends Model
{
    protected $table = "voucher";
    protected $fillable = ['code_number', 'qty', 'owner', 'expired_date'];
}
