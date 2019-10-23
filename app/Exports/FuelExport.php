<?php

namespace App\Exports;

use App\FuelModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class FuelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FuelModel::all();
    }
}
