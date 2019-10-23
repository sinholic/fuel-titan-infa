<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerModel extends Model
{
    protected $table = "owner";
    protected $fillable = ['jenis_unit', 'unit_number', 'unit_category', 'vendor', 'address'];
    public $timestamps = false;
}
