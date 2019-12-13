<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consignment;
use App\FixStationModel;
use App\Purchaseorder;

class ConsignmentController extends Controller
{
    public function consignment()
    {
        $consignment = Consignment::all();
        return view('Consignment.consignment', ['consignment' => $consignment]);
    }

    public function tambah()
    {
        $fixstations = FixStationModel::select(\DB::raw('CONCAT(name_station, " (Tangki nomor ", tank_number, ")") as text'), 'id')->pluck('text', 'id');
        $purchaseorders = Purchaseorder::whereNotIn('id', function ($q) {
            $q->select(\DB::raw('purchaseorders.id'))
                ->from('purchaseorders')
                ->leftJoin('penerimaan', 'purchaseorders.id', '=', 'penerimaan.purchaseorder_id')
                ->groupBy(\DB::raw('purchaseorders.id'))
                ->having(\DB::raw('SUM(penerimaan.qty)'), '>=', \DB::raw('purchaseorders.amount'));
        })
            ->get();
        return view('Consignment.tambah_consignment', ['fixstations' => $fixstations, 'purchaseorders' => $purchaseorders]);
    }

    public function create(Request $request)
    {
        Consignment::create($request->all());
        return redirect('/consignment')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $consignment = Consignment::find($id);
        $fixstations = FixStationModel::select(\DB::raw('CONCAT(name_station, " (Tangki nomor ", tank_number, ")") as text'), 'id')->pluck('text', 'id');
        $purchaseorders = Purchaseorder::whereNotIn('id', function ($q) {
            $q->select(\DB::raw('purchaseorders.id'))
                ->from('purchaseorders')
                ->leftJoin('penerimaan', 'purchaseorders.id', '=', 'penerimaan.purchaseorder_id')
                ->groupBy(\DB::raw('purchaseorders.id'))
                ->having(\DB::raw('SUM(penerimaan.qty)'), '>=', \DB::raw('purchaseorders.amount'));
        })
            ->get();
        return view('Consignment.edit_consignment', ['consignment' => $consignment, 'fixstations' => $fixstations, 'purchaseorders' => $purchaseorders]);        
    }

    public function update(Request $request, $id)
    {
        $consignment = Consignment::find($id);
        $consignment->update($request->all());
        return redirect('/consignment')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $consignment = Consignment::find($id);
        $consignment->delete($consignment);
        return redirect('/consignment')->with('sukses', 'Data berhasil dihapus!');
    }
}
