<?php

namespace App\Exports;

use App\UserLVModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserLvExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return UserLVModel::all();
    }
}
