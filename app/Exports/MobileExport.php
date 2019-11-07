<?php

namespace App\Exports;

use App\MobileModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class MobileExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return MobileModel::all();
    }
}
