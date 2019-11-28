<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengambilanModel extends Model
{
    protected $table = "pengambilan";
    protected $fillable = ['credit_id', 'qty', 'date'];

    public function pengajuan()
    {
        return $this->belongsTo('App\PengajuanModel', 'credit_id', 'id');
    }
}
