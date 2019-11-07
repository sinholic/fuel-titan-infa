<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes;

    protected $fillable = ['nama'];

    public function users()
    {
        return $this->hasMany('App\User', 'status_id', 'id');
    }
}
