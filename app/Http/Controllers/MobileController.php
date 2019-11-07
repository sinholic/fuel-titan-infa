<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MobileModel;
use App\Http\Controllers\Controller;
use App\Exports\MobileExport;
use Maatwebsite\Excel\Facades\Excel;

class MobileController extends Controller
{
    public function mobile()
    {
        $mobile = MobileModel::all();
        return view('Mobile Station.mobile_station', ['mobile' => $mobile]);
    }

    public function tambah()
    {
        return view('Mobile Station.tambah_mobile');
    }

    public function create(Request $request)
    {
        MobileModel::create($request->all());
        return redirect('/mobile')->with('sukses', 'Data berhasil di Input!');
    }

    public function edit($id)
    {
        $mobile = MobileModel::find($id);
        return view('Mobile Station.edit_mobile', ['mobile' => $mobile]);
    }

    public function update(Request $request, $id)
    {
        $mobile = MobileModel::find($id);
        $mobile->update($request->all());
        return redirect('/mobile')->with('sukses', 'Data berhasil di Update!');
    }

    public function delete($id)
    {
        $mobile = MobileModel::find($id);
        $mobile->delete($mobile);
        return redirect('/mobile')->with('sukses', 'Data berhasil dihapus!');
    }

    public function export_excel()
    {
        return Excel::download(new MobileModel, 'master_mobile_station.xlsx');
    }
}
