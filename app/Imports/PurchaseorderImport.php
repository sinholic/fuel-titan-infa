<?php

namespace App\Imports;

use App\Purchaseorder;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PurchaseorderImport implements ToModel, WithValidation, WithHeadingRow, SkipsOnFailure
{
    use Importable, SkipsFailures;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Purchaseorder([
            'purchaseorder_number' => $row['po_number'],
            'tanggal_purchaseorder' => date('Y-m-d', strtotime($row['po_date'])),
            'supplier' => $row['supplier'],
            'amount' => $row['qty']
        ]);
    }

    public function rules(): array
    {
        return [
            // 'purchaseorder_number' => Rule::in(['patrick@maatwebsite.nl']),
            'po_number' => 'unique:purchaseorders,purchaseorder_number',
            // Above is alias for as it always validates in batches
            //  '*.purchaseorder_number' => Rule::in(['patrick@maatwebsite.nl']),
        ];
    }
}
