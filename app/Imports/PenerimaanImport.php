<?php

namespace App\Imports;

use App\PenerimaanModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenerimaanImport implements ToModel, WithValidation, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PenerimaanModel([
            'purchaseorder_id' => $row['no_po'],
            'po_supplier' => $row['supplier'],
            'po_qty' => $row['qty'],
            'qty' => $row['received_qty'],
            'fixstation_id' => $row['No_tangki'],
            'remark' => $row['remark'],
        ]);
    }
}
