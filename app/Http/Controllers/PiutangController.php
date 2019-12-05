<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PiutangModel;

class PiutangController extends Controller
{
    public function piutang()
    {
        $piutang = PiutangModel::all();
        return view('Piutang.piutang', ['piutang' => $piutang]);
    }

    public function tambah()
    {
        return view('Piutang.tambah_piutang');
    }

    public function create(Request $request)
    {
        PiutangModel::create($request->all());
        return redirect('/piutang')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $piutang = PiutangModel::find($id);
        return view('Piutang.edit_piutang', ['piutang' => $piutang]);
    }

    public function update(Request $request, $id)
    {
        $piutang = PiutangModel::find($id);
        $piutang->update($request->all());
        return redirect('/piutang')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $piutang = PiutangModel::find($id);
        $piutang->delete($piutang);
        return redirect('/piutang')->with('sukses', 'Data berhasil dihapus!');
    }
}
