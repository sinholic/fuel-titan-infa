<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserheModel extends Model
{
    use SoftDeletes;
    protected $table = "userhe";
    protected $fillable = ['tipe_alat', 'no_alat', 'tanggal_operasi', 'nama_unit', 'penyewa', 'hm_awal', 'hm_akhir', 'total_jam', 'job_order', 'bbm', 'operator', 'helper', 'pengawas', 'km_awal', 'km_akhir', 'km_total'];
}
