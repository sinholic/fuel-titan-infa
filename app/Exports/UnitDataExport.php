<?php

namespace App\Exports;

use App\UnitDataModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class UnitDataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UnitDataModel::all();
    }
}
