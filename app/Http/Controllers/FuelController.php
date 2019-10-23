<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FuelModel;
use Session;
use App\Exports\FuelExport;
use App\Imports\FuelImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class FuelController extends Controller
{
    public function fuel()
    {
        $fuel = FuelModel::all();
        return view('Fuel.fuel', ['fuel' => $fuel]);
    }

    public function tambah()
    {
        return view('Fuel.tambah_fuel');
    }

    public function create(Request $request)
    {
        FuelModel::create($request->all());
        return redirect('/fuel')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $fuel = FuelModel::find($id);
        return view('Fuel.edit_fuel', ['fuel' => $fuel]);
    }

    public function update(Request $request, $id)
    {
        $fuel = FuelModel::find($id);
        $fuel->update($request->all());
        return redirect('/fuel')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $fuel = FuelModel::find($id);
        $fuel->delete($fuel);
        return redirect('/fuel')->with('sukses', 'Data berhasil dihapus!');
    }

    public function export_excel()
    {
        return Excel::download(new FuelExport, 'penerimaan_fuel.xlsx');
    }

    public function import_excel(Request $request)
    {
        //validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        //menangkap file excel
        $file = $request->file('file');

        //membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        //upload ke folder file_station di dalam folder public
        $file->move('penerimaan_fuel', $nama_file);

        //import data
        Excel::import(new FuelImport, public_path('penerimaan_fuel/' . $nama_file));

        //notifikasi dengan session
        Session::flash('sukses', 'Data Master Station Berhasil Di Import!');

        //alihkan kembali
        return redirect('/fuel');
    }
}
