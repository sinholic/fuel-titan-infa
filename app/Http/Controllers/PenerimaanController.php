<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PenerimaanModel;
use App\FixStationModel;

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
        // dd($fixstations);
        return view('Penerimaan.tambah_penerimaan', ['fixstations' => $fixstations]);
    }

    public function create(Request $request)
    {
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
