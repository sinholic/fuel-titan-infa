<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanModel extends Model
{
    protected $table = "pengajuan_hutang";
    protected $fillable = ['supplier', 'qty', 'remark', 'no_spk', 'peminjam', 'approved'];

    public function pengambilan()
    {
        return $this->hasMany('App\PengambilanModel', 'credit_id', 'id');
    }
}
