<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\EquipmentModel;
use App\OwnerModel;

class EquipmentController extends Controller
{
    public function equipment()
    {
        $equipment = EquipmentModel::all();
        return view('Equipment.equipment', ['equipment' => $equipment]);
    }

    public function tambah()
    {
        $owners = OwnerModel::pluck('vendor', 'id');
        return view('Equipment.tambah_equipment', ['owners' => $owners]);
    }

    public function create(Request $request)
    {
        $messages = [
            'required' => ':Tidak boleh mengisi tanggal besok',
        ];

        $this->validate($request, [
            'last_maintenance' => 'required|date|before_or_equal:date'
        ], $messages);

        EquipmentModel::create($request->all());
        return redirect('/equipment')->with('sukses', 'Data Berhasil di Input!');
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
        return redirect('/equipment')->with('sukses', 'Data berhasil di Update!');
    }

    public function delete($id)
    {
        $equipment = EquipmentModel::find($id);
        $equipment->delete($equipment);
        return redirect('/equipment')->with('sukses', 'Data berhasil dihapus!');
    }
}
