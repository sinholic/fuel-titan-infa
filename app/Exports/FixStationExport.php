<?php

namespace App\Exports;

use App\FixStationModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class FixStationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FixStationModel::all();
    }
}
