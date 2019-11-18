<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timesheetstatus extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function timesheets()
    {
        return $this->hasMany('App\UserheModel', 'timesheetstatus_id', 'id');
    }
}
