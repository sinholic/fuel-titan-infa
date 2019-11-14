<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerkModel extends Model
{
    protected $table = "merk";
    protected $fillable = ['merk', 'inisial'];
}
