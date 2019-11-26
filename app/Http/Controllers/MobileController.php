<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MobileModel;
use App\FixStationModel;
use App\EquipmentModel;
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
        $equipments = EquipmentModel::select(\DB::raw('CONCAT (equipment_number, " - ", equipment_name) as name'), 'id')
            ->whereHas('equipmentcategory', function($query){
                $query->where('nama', 'like', '%FUEL%');
            })
            ->doesntHave('mobile')
            ->pluck('name', 'id');
        return view('Mobile Station.tambah_mobile', [
            'fixstations' => $fixstations,
            'equipments' => $equipments
        ]);
        // return view('Mobile Station.tambah_mobile', []);
    }

    public function create(Request $request)
    {
        $datas = $request->all();
        $fuel_capacity = EquipmentModel::find($request->equipment_id)->fuel_capacity;
        if (isset($datas['impress_status'])) {
            $this->validate($request, [
                'fuel_max_reload' => 'required|numeric|max:'.$fuel_capacity
            ]);
        }
        // dd($datas);
        // $mobile->update($datas);
        MobileModel::create($datas);
        return redirect('/mobile')->with('sukses', 'Data berhasil di Input!');
    }

    public function edit($id)
    {
        $mobile = MobileModel::find($id);
        $fixstations = FixStationModel::groupBy('name_station', 'address')->pluck('name_station', 'id');
        $equipments = EquipmentModel::select(\DB::raw('CONCAT (equipment_number, " - ", equipment_name) as name'), 'id')
            ->whereHas('equipmentcategory', function($query){
                $query->where('nama', 'like', '%FUEL%');
            })
            ->pluck('name', 'id');
        return view('Mobile Station.edit_mobile', [
            'mobile' => $mobile, 
            'fixstations' => $fixstations,
            'equipments' => $equipments
        ]);
    }

    public function update(Request $request, $id)
    {
        $mobile = MobileModel::find($id);
        $datas = $request->all();
        $fuel_capacity = EquipmentModel::find($request->equipment_id)->fuel_capacity;
        if (isset($datas['impress_status'])) {
            $this->validate($request, [
                'fuel_max_reload' => 'required|numeric|max:'.$fuel_capacity
            ]);
        }else if(!isset($datas['impress_status'])) {
            $this->validate($request, [
                'fuel_capacity' => 'required',
            ]);
            $datas['impress_status'] = 0;
            $datas['fuel_max_reload'] = NULL;
        }
        // dd($datas);
        $mobile->update($datas);
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
