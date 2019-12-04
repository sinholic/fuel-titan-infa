<?php

namespace App\Exports;

use App\PenerimaanModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;



class PenerimaanSolarExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PenerimaanModel::with('purchaseorder','fixstation')->get();
    }

     public function map($penerimaan) : array {
        return [
            $penerimaan->id,
            $penerimaan->purchaseorder->purchaseorder_number,
            $penerimaan->purchaseorder->supplier,
            $penerimaan->qty,
            $penerimaan->purchaseorder->amount,
            $penerimaan->fixstation->name_station . " - (Tangki nomor : " . $penerimaan->fixstation->tank_number . ")",
            $penerimaan->remark,
        ] ;
     }

    public function headings(): array
    {
        return [
            'No',
            'No PO',
            'Kode Supplier',
            'Qty',
            'Received Qty',
            'No Tangki',
            'Remark'
        ];
    }
}
