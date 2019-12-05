<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserheModel extends Model
{
    use SoftDeletes;
    protected $table = "userhe";
    protected $guarded = ['eq_label', 'eq_category', 'eq_owner', 'total_jam', 'km_total', 'pengawas_label'];

    public function equipment()
    {
        return $this->belongsTo('App\EquipmentModel', 'equipment_id', 'id')->withTrashed();
    }

    public function status()
    {
        return $this->belongsTo('App\Timesheetstatus', 'timesheetstatus_id', 'id')->withTrashed();
    }

    public function userpengawas()
    {
        return $this->belongsTo('App\User', 'pengawas', 'id');
    }
}
