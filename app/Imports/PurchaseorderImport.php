<?php

namespace App\Imports;

use App\Purchaseorder;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PurchaseorderImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Purchaseorder([
            'purchaseorder_number' => $row['po_number'],
            'tanggal_purchaseorder' => date('Y-m-d',strtotime($row['po_date'])),
            'suplier' => $row['supplier'],
            'amount' => $row['qty']
        ]);
    }
}
