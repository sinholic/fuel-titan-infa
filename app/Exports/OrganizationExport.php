<?php

namespace App\Exports;

use App\OrganizationModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrganizationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OrganizationModel::all();
    }
}
