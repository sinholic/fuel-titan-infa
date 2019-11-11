<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengambilanModel extends Model
{
    protected $table = "pengambilan";
    protected $fillable = ['qty', 'date'];
}
