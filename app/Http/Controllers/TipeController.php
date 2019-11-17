<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipeModel;
use App\MerkModel;

class TipeController extends Controller
{
    public function tipe_equipment()
    {
        $tipe_equipment = TipeModel::all();
        return view('Tipe Equipment.tipe_equipment', ['tipe_equipment' => $tipe_equipment]);
    }

    public function tambah()
    {
        $merk = MerkModel::pluck('merk', 'id');
        return view('Tipe Equipment.tambah_tipe_equipment', ['merk' => $merk]);
    }

    public function create(Request $request)
    {
        TipeModel::create($request->all());
        return redirect('/tipe_equipment')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $tipe_equipment = TipeModel::find($id);
        return view('Tipe Equipment.edit_tipe_equipment', ['tipe_equipment' => $tipe_equipment]);
    }

    public function update(Request $request, $id)
    {
        $tipe_equipment = TipeModel::find($id);
        $tipe_equipment->update($request->all());
        return redirect('/tipe_equipment')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $tipe_equipment = TipeModel::find($id);
        $tipe_equipment->delete($tipe_equipment);
        return redirect('/tipe_equipment')->with('sukses', 'Data berhasil dihapus!');
    }
}
