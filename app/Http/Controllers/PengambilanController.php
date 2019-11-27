<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengambilanModel;
use App\PengajuanModel;

class PengambilanController extends Controller
{
    public function pengambilan()
    {
        $pengambilan = PengambilanModel::all();
        return view('Pengambilan.pengambilan', ['pengambilan' => $pengambilan]);
    }

    public function tambah()
    {
        return view('Pengambilan.tambah_pengambilan');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'equipment_category' => 'required',
            'equipment_number' => 'required|unique:equipment_unitdata,equipment_number,'.$request->equipment_number.',id,companycode_id,'.\Auth::user()->companycode_id ,
            'equipment_name' => 'required',
            'fuel_capacity' => 'required',
            'location' => 'required',
            'pic' => 'required',
        ]);
        PengambilanModel::create($request->all());
        return redirect('/pengambilan')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $pengambilan = PengambilanModel::find($id);
        return view('Pengambilan.edit_pengambilan', ['pengambilan' => $pengambilan]);
    }

    public function update(Request $request, $id)
    {
        $pengambilan = PengambilanModel::find($id);
        $pengambilan->update($request->all());
        return redirect('/pengambilan')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $pengambilan = PengambilanModel::find($id);
        $pengambilan->delete($pengambilan);
        return redirect('/pengambilan')->with('sukses', 'Data berhasil dihapus!');
    }
}
