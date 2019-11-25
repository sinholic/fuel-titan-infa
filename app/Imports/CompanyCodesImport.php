<?php

namespace App\Imports;

use App\Companycode;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class CompanyCodesImport implements ToModel, WithValidation, WithHeadingRow, SkipsOnFailure
{
    use Importable, SkipsFailures;
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

    public function rules(): array
    {
        return [
            // 'purchaseorder_number' => Rule::in(['patrick@maatwebsite.nl']),
            'name_company_code' => 'unique:companycodes,company_name',
            'inisial_company_code' => 'unique:companycodes,company_inisial'
            // Above is alias for as it always validates in batches
            //  '*.purchaseorder_number' => Rule::in(['patrick@maatwebsite.nl']),
        ];
    }
}
