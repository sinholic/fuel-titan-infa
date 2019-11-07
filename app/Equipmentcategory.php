<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
<<<<<<< HEAD
=======

>>>>>>> 1e4e89402d58ce59510d3c0c373c2b4287909064

class Equipmentcategory extends Model
{
    use SoftDeletes;
<<<<<<< HEAD
    protected $fillable = ['nama', 'inisial'];
=======
    
    protected $fillable = ['nama', 'inisial'];

    public function equipments()
    {
        return $this->hasMany('App\EquipmentModel', 'equipment_category', 'id');
    }
>>>>>>> 1e4e89402d58ce59510d3c0c373c2b4287909064
}
