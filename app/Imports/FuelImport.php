<?php

namespace App\Imports;

use App\FuelModel;
use Maatwebsite\Excel\Concerns\ToModel;

class FuelImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new FuelModel([
            'quantity' => $row[1],
            'amount' => $row[2],
            'vendor' => $row[3],
            'fuel' => $row[4],
            'tank_number' => $row[5],
            'invoice_number' => $row[6],
            'document_date' => $row[7],
            'posting_date' => $row[8],
            'driver_name' => $row[9],
            'recipient' => $row[10]
        ]);
    }
}
