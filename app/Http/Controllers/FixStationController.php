<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FixStationModel;
use App\Companycode;
use App\Http\Controllers\Controller;

class FixStationController extends Controller
{
    public function fix()
    {
        $fix = FixStationModel::select(
            'id',
            'name_station',
            'address',
            'nama_lokasi',
            'koordinat_gps',
            'tank_number',
            'fuel_capacity',
            'companycode_id',
            \DB::raw('count(*) as total_tank'),
            \DB::raw('sum(fuel_capacity) as total_fuel_capacity')
        )
            ->where('companycode_id', \Auth::user()->companycode_id)
            ->groupBy('name_station', 'address')
            ->with('company')
            ->get();
        return view('Fix Station.fix_station', ['fix' => $fix]);
    }

    public function tambah()
    {
        $companycodes = Companycode::pluck('company_name', 'id');
        return view('Fix Station.tambah_fixstation', ['companycodes' => $companycodes]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name_station' => 'required|unique:fix_station,name_station,' . $request->name_station . ',id,companycode_id,' . \Auth::user()->companycode_id,
            'address' => 'required',
            'nama_lokasi' => 'required',
            'koordinat_gps' => 'required',
            'tank_number' => 'required',
            'fuel_capacity' => 'required',
        ]);
        foreach ($request->tank_number as $key => $tank_number) {
            FixStationModel::create([
                'companycode_id' => \Auth::user()->companycode_id,
                'name_station' => $request->name_station,
                'address' => $request->address,
                'nama_lokasi' => $request->nama_lokasi,
                'koordinat_gps' => $request->koordinat_gps,
                'tank_number' => $tank_number,
                'fuel_capacity' => $request->fuel_capacity[$key],
            ]);
        }
        // FixStationModel::create();
        return redirect('/fix')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $fix = FixStationModel::find($id);
        $tanks = FixStationModel::where('name_station', $fix->name_station)->get();
        $companycodes = Companycode::pluck('company_name', 'id');
        return view('Fix Station.edit_fixstation', ['fix' => $fix, 'tanks' => $tanks, 'companycodes' => $companycodes]);
    }

    public function update(Request $request, $id)
    {
        $fix = FixStationModel::find($id);
        $tanks = FixStationModel::where('name_station', $fix->name_station)->get();
        if (count($tanks) != count($request->tank_number)) { } else {
            foreach ($tanks as $key => $tank) {
                FixStationModel::find($tank->id)->update([
                    'name_station' => $request->name_station,
                    'address' => $request->address,
                    'nama_lokasi' => $request->nama_lokasi,
                    'koordinat_gps' => $request->koordinat_gps,
                    'tank_number' => $request->tank_number[$key],
                    'fuel_capacity' => $request->fuel_capacity[$key],
                ]);
            }
        }
        // $fix->update($request->all());
        return redirect('/fix')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $fix = FixStationModel::find($id);
        $fix->delete($fix);
        return redirect('/fix')->with('sukses', 'Data Berhasil dihapus!');
    }

    public function detail($id)
    {
        $fix = FixStationModel::find($id);
        $tanks = FixStationModel::where('name_station', $fix->name_station)->get();
        $companycodes = Companycode::pluck('company_name', 'id');
        return view('Fix Station.detail_fixstation', ['fix' => $fix, 'tanks' => $tanks, 'companycodes' => $companycodes]);
    }
}
