<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengembalianModel;

class PengeluaranController extends Controller
{
    public function pengeluaran()
    {
        $pengeluaran = PengembalianModel::all();
        return view('Pengeluaran.pengeluaran', ['pengeluaran' => $pengeluaran]);
    }

    public function tambah()
    {
        return view('Pengeluaran.tambah_pengeluaran');
    }

    public function create(Request $request)
    {
        PengembalianModel::create($request->all());
        return redirect('/pengeluaran')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $pengeluaran = PengembalianModel::find($id);
        return view('Pengeluaran.edit_pengembalian', ['pengeluaran' => $pengeluaran]);
    }

    public function update(Request $request, $id)
    {
        $pengeluaran = PengembalianModel::find($id);
        $pengeluaran->update($request->all());
        return redirect('/pengeluaran')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $pengeluaran = PengembalianModel::find($id);
        $pengeluaran->delete($pengeluaran);
        return redirect('/pengeluaran')->with('sukses', 'Data berhasil dihapus!');
    }

    public function detail($id)
    {
        $pengeluaran = PengembalianModel::find($id);
        return view('Pengeluaran.detail_pengembalian', ['pengeluaran' => $pengeluaran]);
    }
}