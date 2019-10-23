<?php

namespace App\Exports;

use App\EquipmentModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class EquipmentExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return EquipmentModel::all();
    }
}
