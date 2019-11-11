<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengajuanModel;

class PengajuanController extends Controller
{
    public function pengajuan()
    {
        $pengajuan = PengajuanModel::all();
        return view('Pengajuan.pengajuan', ['pengajuan' => $pengajuan]);
    }

    public function tambah()
    {
        return view('Pengajuan.tambah_pengajuan');
    }

    public function create(Request $request)
    {
        PengajuanModel::create($request->all());
        return redirect('/pengajuan')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $pengajuan = PengajuanModel::find($id);
        return view('Pengajuan.edit_pengajuan', ['pengajuan' => $pengajuan]);
    }

    public function update(Request $request, $id)
    {
        $pengajuan = PengajuanModel::find($id);
        $pengajuan->update($request->all());
        return redirect('/pengajuan')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $pengajuan = PengajuanModel::find($id);
        $pengajuan->delete($pengajuan);
        return redirect('/pengajuan')->with('sukses', 'Data berhasil dihapus!');
    }
}