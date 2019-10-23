<?php

namespace App\Imports;

use App\EquipmentModel;
use Maatwebsite\Excel\Concerns\ToModel;

class EquipmentImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new EquipmentModel([
            'equipment_name' => $row[1],
            'equipment_number' => $row[2],
            'equipment_category' => $row[3],
            'location' => $row[4],
            'fuel_capacity' => $row[5],
            'machine_hours' => $row[6],
            'last_machine_hours' => $row[7],
            'last_maintenance' => $row[8],
            'pic' => $row[9]
        ]);
    }
}
