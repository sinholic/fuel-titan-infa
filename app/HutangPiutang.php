<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HutangPiutang extends Model
{
    protected $table = "hutang_piutangs";
    protected $guarded = [];

    public function pengajuan()
    {
        return $this->belongsTo('App\PengajuanModel', 'pengajuan_id', 'id');
    }
}
