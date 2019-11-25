<?php

namespace App\Imports;

use App\Equipmentcategory;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;


class EquipmentCategoryImport implements ToModel, WithValidation, WithHeadingRow, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Equipmentcategory([
            'nama' => $row['nama_kategori'],
            'inisial' => $row['inisial_kategori']
        ]);
    }

    public function rules(): array
    {
        return [
            // 'purchaseorder_number' => Rule::in(['patrick@maatwebsite.nl']),
            'nama_kategori' => 'unique:equipmentcategories,nama',
            'inisial_kategori' => 'unique:equipmentcategories,inisial'
            // 'inisial_company_code' => 'unique:companycodes,company_inisial'
            // Above is alias for as it always validates in batches
            //  '*.purchaseorder_number' => Rule::in(['patrick@maatwebsite.nl']),
        ];
    }
}
