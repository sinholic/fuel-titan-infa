<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\EquipmentModel;

class EquipmentController extends Controller
{
    public function lists()
    {
        $equipments = EquipmentModel::all();
        //  status => 200
        //  message => Data sucessfully fetched
        //  count => (jumlah data pakai count di php)
        return response()->json(['data' => $equipments]);
    }

    public function tambah()
    {
        return view('Equipment.tambah_equipment');
    }

    public function create(Request $request)
    {
        $equipment = EquipmentModel::create($request->all());
        return response()->json(['data' => $equipment]);
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
