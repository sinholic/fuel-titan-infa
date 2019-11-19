<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengembalianModel;

class PengembalianController extends Controller
{
    public function pengembalian()
    {
        $pengembalian = PengembalianModel::all();
        return view('Pengembalian.pengembalian', ['pengembalian' => $pengembalian]);
    }

    public function tambah()
    {
        return view('Pengembalian.tambah_pengembalian');
    }

    public function create(Request $request)
    {
        PengembalianModel::create($request->all());
        return redirect('/pengembalian')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $pengembalian = PengembalianModel::find($id);
        return view('Pengembalian.edit_pengembalian', ['pengembalian' => $pengembalian]);
    }

    public function update(Request $request, $id)
    {
        $pengembalian = PengembalianModel::find($id);
        $pengembalian->update($request->all());
        return redirect('/pengembalian')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $pengembalian = PengembalianModel::find($id);
        $pengembalian->delete($pengembalian);
        return redirect('/pengembalian')->with('sukses', 'Data berhasil dihapus!');
    }

    public function detail($id)
    {
        $pengembalian = PengembalianModel::find($id);
        return view('Pengembalian.detail_pengembalian', ['pengembalian' => $pengembalian]);
    }
}
