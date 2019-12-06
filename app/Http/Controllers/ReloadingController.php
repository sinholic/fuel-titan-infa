<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReloadingModel;
use App\EquipmentModel;
use App\MobileModel;
use App\VoucherModel;

class ReloadingController extends Controller
{
    public function reloading()
    {
        $reloading = ReloadingModel::with('mobilestation', 'mobilestation.equipment')->get();
        return view('Reloading.reloading', [
            'reloading' => $reloading,
        ]);
    }

    public function tambah()
    {   
        $equipments = MobileModel::with('equipment','equipment.equipmentcategory', 'equipment.equipmentowner')
        ->get();
        return view('Reloading.tambah_reloading',[
            'equipments' => $equipments,
        ]);
    }

    public function create(Request $request)
    {
        $mobileStation = MobileModel::with('reloading')->find($request->mobilestation_id);
        $lastReload = $mobileStation->reloading->last();
        $this->validate($request, [
            'odometer' => 'numeric|min:'.($lastReload->odometer + 1),
            'qty_solar' => 'numeric|'
        ]);

        EquipmentModel::find($request->equipment_id)->update([
            'master_km' => $request->odometer
        ]);
        ReloadingModel::create($request->all());
        return redirect('/reloading')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $reloading = ReloadingModel::find($id);
        return view('Reloading.edit_reloading', ['reloading' => $reloading]);
    }

    public function update(Request $request, $id)
    {
        $reloading = ReloadingModel::find($id);
        $reloading->update($request->all());
        return redirect('/reloading')->with('sukses', 'Data berhasil di Update!');
    }

    public function delete($id)
    {
        $reloading = ReloadingModel::find($id);
        $reloading->delete($reloading);
        return redirect('/reloading')->with('sukses', 'Data berhasil dihapus!');
    }
}
