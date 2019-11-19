<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PenerimaanModel;
use App\FixStationModel;
use App\Purchaseorder;

class PenerimaanController extends Controller
{
    public function penerimaan()
    {
        $penerimaan = PenerimaanModel::all();
        return view('Penerimaan.penerimaan', ['penerimaan' => $penerimaan]);
    }

    public function tambah()
    {
        $fixstations = FixStationModel::select(\DB::raw('CONCAT(name_station, " (Tangki nomor ", tank_number, ")") as text'), 'id')->pluck('text', 'id');
        // $purchaseorders = Purchaseorder::leftJoin('penerimaan', 'purchaseorders.id', '=', 'penerimaan.purchaseorder_id')
        // ->whereRaw('purchaseorders.amount < SUM(penerimaan.qty)')
        // ->with(['receives' => function($query){
        //     $query->whereRaw('purchaseorders.amount < SUM(penerimaan.qty)');
        // }])
        // ->get();
        // dd($purchaseorders);
        $purchaseorders = Purchaseorder::whereNotIn('id', function($q){
            $q->select(\DB::raw('purchaseorders.id'))
            ->from('purchaseorders')
            ->leftJoin('penerimaan', 'purchaseorders.id', '=', 'penerimaan.purchaseorder_id')
            ->groupBy(\DB::raw('purchaseorders.id'))
            ->having(\DB::raw('SUM(penerimaan.qty)'), '=', \DB::raw('purchaseorders.amount'));
        })
        ->get();
        return view('Penerimaan.tambah_penerimaan', ['fixstations' => $fixstations, 'purchaseorders' => $purchaseorders]);
    }

    public function create(Request $request)
    {
        $purchaseorder = Purchaseorder::find($request->no_po);
        $request->validate([
            'qty' => 'required|numeric|max:'.$purchaseorder->amount,
            'no_tangki' => 'required',
        ]);
        PenerimaanModel::create($request->all());
        return redirect('/penerimaan')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $penerimaan = PenerimaanModel::find($id);
        return view('Penerimaan.edit_penerimaan', ['penerimaan' => $penerimaan]);
    }

    public function update(Request $request, $id)
    {
        $penerimaan = PenerimaanModel::find($id);
        $penerimaan->update($request->all());
        return redirect('/penerimaan')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $penerimaan = PenerimaanModel::find($id);
        $penerimaan->delete($penerimaan);
        return redirect('/penerimaan')->with('sukses', 'Data berhasil dihapus!');
    }
}
