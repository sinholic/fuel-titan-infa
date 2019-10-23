<?php

namespace App\Http\Controllers;

use App\EquipmentModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\EquipmentExport;
use App\Imports\EquipmentImport;


class EquipmentController extends Controller
{
    public function equipment()
    {
        $equipment = EquipmentModel::all();
        return view('Equipment.equipment', ['equipment' => $equipment]);
    }

    public function tampiladd()
    {
        return view('Equipment.tambah_equipment');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'equipment_name' => 'required',
            'equipment_number' => 'required',
            'equipment_category' => 'required',
            'location' => 'required',
            'fuel_capacity' => 'required',
            'machine_hours' => 'required',
            'last_machine_hours' => 'required',
            'last_maintenance' => 'required',
            'pic' => 'required',
        ]);
        EquipmentModel::create($request->all());
        return redirect('/equipment')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $equipment = EquipmentModel::find($id);
        return view('Equipment.edit_equipment', ['equipment' => $equipment]);
    }

    public function update(Request $request, $id)
    {
        $equipment = EquipmentModel::find($id);
        $equipment->update($request->all());
        return redirect('/equipment')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $equipment = EquipmentModel::find($id);
        $equipment->delete($equipment);
        return redirect('/equipment')->with('sukses', 'Data berhasil dihapus!');
    }


    public function export_excel()
    {
        return Excel::download(new EquipmentExport, 'master_data_equipment.xlsx');
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
        $file->move('file_equipment', $nama_file);

        //import data
        Excel::import(new EquipmentImport, public_path('file_equipment/' . $nama_file));

        //notifikasi dengan session
        Session::flash('sukses', 'Data Master Station Berhasil Di Import!');

        //alihkan kembali
        return redirect('/equipment');
    }
}
