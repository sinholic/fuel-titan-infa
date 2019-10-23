<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StationModel;
use Session;
use App\Exports\StationExport;
use App\Imports\StationImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use DataTables;


class StationController extends Controller
{
    // public function json()
    // {
    //     return DataTables::of(StationModel::all())->make(true);
    // }

    // public function index()
    // {
    //     return view('Station.master_station');
    // }
    public function index()
    {
        $station = StationModel::all();
        return view('Station.master_station', ['station' => $station]);
    }

    public function tampiladd()
    {
        return view('Station.tambah_station');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_lokasi' => 'required',
            'address' => 'required',
            'koordinat_gps' => 'required',
            'tank_number' => 'required',
            'fuel_capacity' => 'required',
            'fuel_assignment' => 'required',
            'last_refuel' => 'required',
            'ending_stock_date' => 'required',
            'ending_stock_quantity' => 'required',
        ]);
        StationModel::create($request->all());
        return redirect('/station')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function delete($id)
    {
        $station = StationModel::find($id);
        $station->delete($station);
        return redirect('/station')->with('sukses', 'Data berhasil dihapus!');
    }

    public function edit($id)
    {
        $station = StationModel::find($id);
        return view('Station.edit_station', ['station' => $station]);
    }

    public function update(Request $request, $id)
    {
        $station = StationModel::find($id);
        $station->update($request->all());
        return redirect('/station')->with('sukses', 'Data Berhasil Di Update!');
    }



    //Import Excel


    public function export_excel()
    {
        return Excel::download(new StationExport, 'master_station.xlsx');
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
        $file->move('file_station', $nama_file);

        //import data
        Excel::import(new StationImport, public_path('file_station/' . $nama_file));

        //notifikasi dengan session
        Session::flash('sukses', 'Data Master Station Berhasil Di Import!');

        //alihkan kembali
        return redirect('/station');
    }
}
