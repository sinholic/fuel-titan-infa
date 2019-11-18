<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserheModel extends Model
{
    use SoftDeletes;
    protected $table = "userhe";
    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo('App\Timesheetstatus', 'timesheetstatus_id', 'id');
    }
}
