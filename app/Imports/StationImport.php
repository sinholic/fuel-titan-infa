<?php

namespace App\Imports;

use App\StationModel;
use Maatwebsite\Excel\Concerns\ToModel;

class StationImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new StationModel([
            'nama_lokasi' => $row[1],
            'address' => $row[2],
            'koordinat_gps' => $row[3],
            'tank_number' => $row[4],
            'fuel_capacity' => $row[5],
            'fuel_assignment' => $row[6],
            'last_refuel' => $row[7],
            'ending_stock_date' => $row[8],
            'ending_stock_quantity' => $row[9],
        ]);
    }
}
