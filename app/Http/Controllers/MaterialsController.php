<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaterialsModel;

class MaterialsController extends Controller
{
    public function materials()
    {
        $materials = MaterialsModel::all();
        return view('Materials.materials', ['materials' => $materials]);
    }

    public function tambah()
    {
        return view('Materials.tambah_materials');
    }

    public function create(Request $request)
    {
        $messages = [
            'unique' => 'Material sudah ada!',
        ];
        $this->validate($request, [
            'materials' => 'unique:materials'
        ], $messages);

        MaterialsModel::create($request->all());
        return redirect('/materials')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $materials = MaterialsModel::find($id);
        return view('Materials.edit_materials', ['materials' => $materials]);
    }

    public function update(Request $request, $id)
    {
        $materials = MaterialsModel::find($id);
        $materials->update($request->all());
        return redirect('/materials')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $materials = MaterialsModel::find($id);
        $materials->delete($materials);
        return redirect('/materials')->with('sukses', 'Data berhasil dihapus!');
    }
}
