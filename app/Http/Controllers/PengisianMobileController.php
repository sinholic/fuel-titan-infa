<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reloadingunit;
use App\QtySolarModel;
use App\EquipmentModel;

class PengisianMobileController extends Controller
{
    public function pengisian_mobile()
    {
        $pengisian_mobile = Reloadingunit::where('origin', 'Mobile')->get();
        return view('Pengisian Mobile.pengisian_mobile', ['pengisian_mobile' => $pengisian_mobile]);
    }

    public function tambah()
    {
        $qty_solar = QtySolarModel::pluck('qty_solar', 'id');

        return view('Pengisian Mobile.addpengisian_mobile', ['qty_solar' => $qty_solar]);
    }

    public function create(Request $request)
    {
        Reloadingunit::create($request->all());
        return redirect('/pengisian_mobile')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $pengisian_mobile = Reloadingunit::find($id);
        $qty_solar = QtySolarModel::pluck('qty_solar', 'id');
        $equipments = EquipmentModel::pluck('equipment_number', 'id');
        return view('Pengisian Mobile.edit_pengisian_mobile', ['pengisian_mobile' => $pengisian_mobile, 'qty_solar' => $qty_solar, 'equipments' => $equipments]);
    }

    public function update(Request $request, $id)
    {
        $pengisian_mobile = Reloadingunit::find($id);
        $datas = $request->all();
        $datas['remark'] = $pengisian_mobile->remark."</br>".$request->remark;
        $pengisian_mobile->update($datas);
        return redirect('/pengisian_mobile')->with('sukses', 'Data berhasil di Update!');
    }

    public function delete($id)
    {
        $pengisian_mobile = Reloadingunit::find($id);
        $pengisian_mobile->delete($pengisian_mobile);
        return redirect('/pengisian_mobile')->with('sukses', 'Data berhasil dihapus!');
    }
}
