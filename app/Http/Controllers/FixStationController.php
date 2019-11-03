<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FixStationModel;
use App\Http\Controllers\Controller;

class FixStationController extends Controller
{
    public function fix()
    {
        $fix = FixStationModel::all();
        return view('Fix Station.fix_station', ['fix' => $fix]);
    }

    public function tambah()
    {
        return view('Fix Station.tambah_fixstation');
    }

    public function create(Request $request)
    {
        FixStationModel::create($request->all());
        return redirect('/fix')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $fix = FixStationModel::find($id);
        return view('Fix Station.edit_fixstation', ['fix' => $fix]);
    }

    public function update(Request $request, $id)
    {
        $fix = FixStationModel::find($id);
        $fix->update($request->all());
        return redirect('/fix')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $fix = FixStationModel::find($id);
        $fix->delete($fix);
        return redirect('/fix')->with('sukses', 'Data Berhasil dihapus!');
    }
}
