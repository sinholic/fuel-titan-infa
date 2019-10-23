<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationModel extends Model
{
    protected $table = 'organization';
    protected $fillable = ['nik', 'name', 'password', 'organization', 'owner'];
    public $timestamps = false;
}
