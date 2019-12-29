<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanModel extends Model
{
    protected $table = "pengajuan";
    protected $fillable = ['supcompanycode_id', 'fixstation_id', 'taking_date', 'qty', 'remark', 'no_pengajuan', 'borcompanycode_id', 'approved', 'type'];
    // protected $guarded = [];

    public function hutangpiutangs()
    {
        return $this->hasMany('App\HutangPiutang', 'pengajuan_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Companycode', 'supcompanycode_id', 'id');
    }

    public function borrower()
    {
        return $this->belongsTo('App\Companycode', 'borcompanycode_id', 'id');
    }

    public function fixstation()
    {
        return $this->belongsTo('App\FixStationModel', 'fixstation_id', 'id');
    }

    // protected $table = "hutang_piutangs";
    // protected $guarded = [];
}
