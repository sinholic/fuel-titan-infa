<?php

namespace App\Imports;

use App\Purchaseorder;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PurchaseorderImport implements ToModel, WithValidation, WithHeadingRow
{
    use Importable;

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
            'po_number' => 'required|unique:purchaseorders,purchaseorder_number',
            'po_date' => 'required|date|after_or_equal:today',
            'supplier' => 'required',
            'qty' => 'required|numeric'
        ];
    }
}
