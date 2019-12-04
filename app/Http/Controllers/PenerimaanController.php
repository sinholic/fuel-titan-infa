<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PenerimaanModel;
use App\FixStationModel;
use App\Purchaseorder;
use App\Exports\PenerimaanSolarExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

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
        $purchaseorders = Purchaseorder::whereNotIn('id', function ($q) {
            $q->select(\DB::raw('purchaseorders.id'))
                ->from('purchaseorders')
                ->leftJoin('penerimaan', 'purchaseorders.id', '=', 'penerimaan.purchaseorder_id')
                ->groupBy(\DB::raw('purchaseorders.id'))
                ->having(\DB::raw('SUM(penerimaan.qty)'), '>=', \DB::raw('purchaseorders.amount'));
        })
        ->get();
        return view('Penerimaan.tambah_penerimaan', ['fixstations' => $fixstations, 'purchaseorders' => $purchaseorders]);
    }

    public function create(Request $request)
    {
        $purchaseorder = Purchaseorder::with('receives')->find($request->purchaseorder_id);
        // dd($purchaseorder->receives->count());
        if ($purchaseorder->receives->count() > 0) {
            $totalReceive = $purchaseorder->receives->count() + 1;
            // dd($purchaseorder->receives->sum('qty'));
            $sum = $purchaseorder->receives->sum('qty');
            $tolerance = (($sum * 3)/100);
            $total = intval($purchaseorder->amount) - ($sum - $tolerance);
            // dd($total);
            $request->validate(
                [
                    'qty' => 'required|numeric|max:' . $total,
                    'fixstation_id' => 'required',
                    'remark' => 'required'
                ],
                [
                    // This PO has already received 20,000 so you can only receive 10,000 on maximum 
                    'qty.max' => 'This PO has already received ' . $sum . ' so you can only receive ' . $total . ' on maximum'
                ]
            );
        } else {
            $request->validate([
                'qty' => 'required|numeric|max:' . $purchaseorder->amount,
                'fixstation_id' => 'required',
                'remark' => 'required'
            ]);
        }
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

    public function export_excel()
    {
        return Excel::download(new PenerimaanSolarExport, 'penerimaan_solar.xlsx');
    }
}
