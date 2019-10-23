<?php

namespace App\Exports;

use App\OwnerModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class OwnerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OwnerModel::all();
    }
}
