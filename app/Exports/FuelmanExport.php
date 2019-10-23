<?php

namespace App\Exports;

use App\FuelmanModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class FuelmanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FuelmanModel::all();
    }
}
