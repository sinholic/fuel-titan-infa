<?php

namespace App\Exports;

use App\StationModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class StationExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return StationModel::all();
    }
}
