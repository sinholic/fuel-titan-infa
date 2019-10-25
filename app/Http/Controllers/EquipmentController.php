<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\EquipmentModel;

class EquipmentController extends Controller
{
    public function equipment()
    {
        $equipment = EquipmentModel::all();
        return view('Equipment.equipment', ['equipment' => $equipment]);
    }

    public function tambah()
    {
        return view('Equipment.tambah_equipment');
    }

    public function create(Request $request)
    {
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
}
