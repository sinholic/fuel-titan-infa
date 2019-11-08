<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MobileModel;
use App\FixStationModel;
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
        $fixstations = FixStationModel::groupBy('name_station', 'address')->pluck('name_station', 'id');
        return view('Mobile Station.tambah_mobile', ['fixstations' => $fixstations]);
    }

    public function create(Request $request)
    {
        MobileModel::create($request->all());
        return redirect('/mobile')->with('sukses', 'Data berhasil di Input!');
    }

    public function edit($id)
    {
        $mobile = MobileModel::find($id);
        $fixstations = FixStationModel::groupBy('name_station', 'address')->pluck('name_station', 'id');
        return view('Mobile Station.edit_mobile', ['mobile' => $mobile, 'fixstations' => $fixstations]);
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
