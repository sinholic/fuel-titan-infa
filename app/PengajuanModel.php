<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanModel extends Model
{
    protected $table = "pengajuan_hutang";
    protected $fillable = ['supcompanycode_id', 'qty', 'remark', 'no_pengajuan', 'borcompanycode_id', 'approved'];

    public function pengambilan()
    {
        return $this->hasMany('App\PengambilanModel', 'credit_id', 'id');
    }
}
