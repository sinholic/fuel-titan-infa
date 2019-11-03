<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReloadingModel;

class ReloadingController extends Controller
{
    public function reloading()
    {
        $reloading = ReloadingModel::all();
        return view('Reloading.reloading', ['reloading' => $reloading]);
    }

    public function tambah()
    {
        return view('Reloading.tambah_reloading');
    }

    public function create(Request $request)
    {
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
