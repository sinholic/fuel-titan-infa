<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\EquipmentModel;
use App\Reloadingunit;
use App\OwnerModel;
use App\Equipmentcard;
use App\Equipmentcategory;
use App\TipeModel;
use App\Companycode;
use App\MerkModel;

class EquipmentController extends Controller
{
    public function equipment()
    {
        $equipment = EquipmentModel::with('cards')->get();
        return view('Equipment.equipment', ['equipment' => $equipment]);
    }

    public function print(Request $request)
    {
        $equipments = EquipmentModel::with(
                'equipmentowner',
                'equipmentcategory',
                'reloadingunits'
            )->get();
        // dd($Equipment->Equipmentowner);
        return view('Equipment.print_qr', ['equipments' => $equipments]);
    }

    public function generateCard($id)
    {
        $equipment = EquipmentModel::find($id);
        $equipment->cards->last()->update([
            'active' => 0
        ]);
        $owner = OwnerModel::find($equipment->owner_id);
        $inisial = substr($owner->vendor_inisial, 0, 3);
        $inisial_number = null;
        for ($i = 0; $i < strlen($inisial); $i++) {
            $inisial_number .= ord(substr($inisial, $i));
        }

        $card_number = \Carbon\Carbon::now()->format('yndm');
        // dd($inisial_number.$card_number.mt_rand(10,99));   

        $cards = array(
            'equipment_id' => $equipment->id,
            'cardnumber' => $inisial_number . $card_number . mt_rand(10, 99),
        );
        // Equipmentcard::create($cards);
        $equipment->cards()->create($cards);

        return redirect('/equipment')->with('sukses', 'Kartu berhasil digenerate ulang!');
    }

    public function tambah()
    {
        $tipe = TipeModel::pluck('tipe', 'id');
        $owners = OwnerModel::pluck('vendor_name', 'id');
        $equipment_categories = Equipmentcategory::pluck('nama', 'id');
        $last_id = EquipmentModel::all()->last() == NULL ? 1 : EquipmentModel::all()->last()->id + 1;
        $companycodes = Companycode::pluck('company_name', 'id');
        $manufactures = MerkModel::pluck('merk', 'id');
        return view('Equipment.tambah_equipment', [
            'owners' => $owners,
            'equipment_categories' => $equipment_categories,
            'tipe' => $tipe,
            'last_id' => $last_id,
            'companycodes' => $companycodes,
            'manufactures' => $manufactures
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'equipment_category' => 'required',
            'equipment_number' => 'required|unique:equipment_unitdata,equipment_number,' . $request->equipment_number . ',id,companycode_id,' . \Auth::user()->companycode_id,
            'equipment_name' => 'required',
            'nomor_rangka' => 'required|unique:equipment_unitdata,nomor_rangka',
            'nomor_mesin' => 'required|unique:equipment_unitdata,nomor_mesin',
            'fuel_capacity' => 'required',
            'nomor_mesin' => 'unique:equipment_unitdata,nomor_mesin',
            'location' => 'required',
            'owner_id' => 'required',
        ]);
        
        $equipment = new EquipmentModel;
        $equipment->equipment_category = $request->equipment_category;
        $equipment->equipment_number = $request->equipment_number;
        $equipment->equipment_name = $request->equipment_name;
        $equipment->status_vehicle = $request->status_vehicle;
        $equipment->fuel_capacity = $request->fuel_capacity;
        $equipment->location = $request->location;
        $equipment->owner_id = $request->owner_id;
        $equipment->equipment_info = $request->equipment_info;
        $equipment->equipment_type = $request->equipment_type;
        $equipment->manufacture_id = $request->manufacture_id;
        $equipment->nomor_rangka = $request->nomor_rangka;
        $equipment->nomor_mesin = $request->nomor_mesin;
        $equipment->companycode_id = $request->companycode_id;
        $equipment->save();

        $reloading_units = array(
            'equipment_id' => $equipment->id,
            'odometer' => $request->odometer,
            'machinehours' => $request->machinehours,
            'ending_stock' => $request->ending_stock,
        );
        // Reloadingunit::create($reloading_units);
        $equipment->reloadingunits()->create($reloading_units);

        $owner = OwnerModel::find($request->owner_id);
        $inisial = substr($owner->vendor_inisial, 0, 3);
        $inisial_number = null;
        for ($i = 0; $i < strlen($inisial); $i++) {
            $inisial_number .= ord(substr($inisial, $i));
        }

        $card_number = \Carbon\Carbon::now()->format('yndm');
        // dd($inisial_number.$card_number.mt_rand(10,99));   

        $cards = array(
            'equipment_id' => $equipment->id,
            'cardnumber' => $inisial_number . $card_number . mt_rand(10, 99),
        );
        // Equipmentcard::create($cards);
        $equipment->cards()->create($cards);

        return redirect('/equipment')->with('sukses', 'Data Berhasil di Input!');
    }

    public function edit($id)
    {
        $equipment = EquipmentModel::with('reloadingunits')->find($id);
        // dd($equipment);
        $tipe = TipeModel::pluck('tipe', 'id');
        $manufactures = MerkModel::pluck('merk', 'id');
        $owners = OwnerModel::pluck('vendor_name', 'id');
        $equipment_categories = Equipmentcategory::pluck('nama', 'id');
        $companycodes = Companycode::pluck('company_name', 'id');
        return view('Equipment.edit_equipment', [
            'equipment' => $equipment, 
            'owners' => $owners, 
            'equipment_categories' => $equipment_categories,
            'tipe' => $tipe,
            'manufactures' => $manufactures,
            'companycodes' => $companycodes,

        ]);
    }

    public function update(Request $request, $id)
    {
        $equipment = EquipmentModel::find($id);
        $equipment->update($request->all());
        return redirect('/equipment')->with('sukses', 'Data berhasil di Update!');
    }

    public function delete($id)
    {
        $equipment = EquipmentModel::find($id);
        $equipment->delete($equipment);
        return redirect('/equipment')->with('sukses', 'Data berhasil dihapus!');
    }

    public function detail($id)
    {
        $equipment = EquipmentModel::with('reloadingunits')->find($id);
        // dd($equipment);
        $owners = OwnerModel::pluck('vendor_name', 'id');
        $equipment_categories = Equipmentcategory::pluck('nama', 'id');
        return view('Equipment.detail_equipment', ['equipment' => $equipment, 'owners' => $owners, 'equipment_categories' => $equipment_categories]);
    }
}
