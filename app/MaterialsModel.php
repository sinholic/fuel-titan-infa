<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialsModel extends Model
{
    public $table = 'materials';
    protected $guarded = [];
    public $fillable = ['materials'];

    
}
