<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnitDataModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\UnitDataExport;

class UnitDataController extends Controller
{
    public function tambah()
    {
        return view('Unit Data.tambah_unitdata');
    }

    public function unitdata()
    {
        $unitdata = UnitDataModel::all();
        return view('Unit Data.unit_data', ['unitdata' => $unitdata]);
    }

    public function create(Request $request)
    {
        UnitDataModel::create($request->all());
        return redirect('/unitdata')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $unitdata = UnitDataModel::find($id);
        return view('Unit Data.edit_unitdata', ['unitdata' => $unitdata]);
    }

    public function update(Request $request, $id)
    {
        $unitdata = UnitDataModel::find($id);
        $unitdata->update($request->all());
        return redirect('/unitdata')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $unitdata = UnitDataModel::find($id);
        $unitdata->delete($unitdata);
        return redirect('/unitdata')->with('sukses', 'Data berhasil di Hapus!');
    }

    public function export_excel()
    {
        return Excel::download(new UnitDataExport, 'master_unit_data.xlsx');
    }
}
