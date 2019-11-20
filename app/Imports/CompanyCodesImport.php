<?php

namespace App\Imports;

use App\Companycode;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CompanyCodesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Companycode([
            'company_name' => $row['name_company_code'],
            'company_inisial' => $row['inisial_company_code']
        ]);
    }
}
