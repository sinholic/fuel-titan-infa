<?php

namespace App\Imports;

use App\Equipmentcategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EquipmentCategoryImport implements ToModel, WithHeadingRow
{
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
}
