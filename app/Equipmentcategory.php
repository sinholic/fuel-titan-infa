<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipmentcategory extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['nama', 'inisial'];

    public function equipments()
    {
        return $this->hasMany('App\EquipmentModel', 'equipment_category', 'id');
    }
}
