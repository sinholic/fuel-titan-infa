<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengisianFixModel;

class PengisianFixController extends Controller
{
    public function pengisian_fix()
    {
        $pengisian_fix = PengisianFixModel::all();
        return view('Pengisian Fix.pengisian_fix', ['pengisian_fix' => $pengisian_fix]);
    }

    public function tambah()
    {
        return view('Pengisian Fix.tambah_pengisianfix');
    }

    public function create(Request $request)
    {
        PengisianFixModel::create($request->all());
        return redirect('/pengisian_fix')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $pengisian_fix = PengisianFixModel::find($id);
        return view('Pengisian Fix.edit_pengisianfix', ['pengisian_fix' => $pengisian_fix]);
    }

    public function update(Request $request, $id)
    {
        $pengisian_fix = PengisianFixModel::find($id);
        $pengisian_fix->update($request->all());
        return redirect('/pengisian_fix')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $pengisian_fix = PengisianFixModel::find($id);
        $pengisian_fix->delete($pengisian_fix);
        return redirect('/pengisian_fix')->with('sukses', 'Data berhasil dihapus!');
    }
}