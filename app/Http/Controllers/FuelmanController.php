<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FuelmanModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FuelmanExport;

class FuelmanController extends Controller
{
    public function fuelman()
    {
        $fuelman = FuelmanModel::all();
        return view('Fuelman.fuelman', ['fuelman' => $fuelman]);
    }

    public function tambah()
    {
        return view('Fuelman.tambah_fuelman');
    }

    public function create(Request $request)
    {
        FuelmanModel::create($request->all());
        return redirect('/fuelman')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $fuelman = FuelmanModel::find($id);
        return view('Fuelman.edit_fuelman', ['fuelman' => $fuelman]);
    }

    public function update(Request $request, $id)
    {
        $fuelman = FuelmanModel::find($id);
        $fuelman->update($request->all());
        return redirect('/fuelman')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $fuelman = FuelmanModel::find($id);
        $fuelman->delete($fuelman);
        return redirect('/fuelman')->with('sukses', 'Data berhasil dihapus!');
    }

    public function export_excel()
    {
        return Excel::download(new FuelmanExport, 'master_fuelman.xlsx');
    }
}
