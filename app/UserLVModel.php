<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLVModel extends Model
{
    protected $table = "userlv";
    protected $fillable = ['nik', 'nama', 'organization', 'owner'];
    public $timestamps = false;
}
