<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MerkModel;

class MerkController extends Controller
{
    public function merk()
    {
        $merk = MerkModel::all();
        return view('Merk.merk', ['merk' => $merk]);
    }

    public function tambah()
    {
        return view('Merk.tambah_merk');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'inisial' => 'unique:merk,inisial',
            'merk' => 'unique:merk'
        ]);

        MerkModel::create($request->all());
        return redirect('/merk')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $merk = MerkModel::find($id);
        return view('Merk.edit_merk', ['merk' => $merk]);
    }

    public function update(Request $request, $id)
    {
        $merk = MerkModel::find($id);
        $merk->update($request->all());
        return redirect('/merk')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $merk = MerkModel::find($id);
        $merk->delete($merk);
        return redirect('/merk')->with('sukses', 'Data berhasil dihapus!');
    }
}
