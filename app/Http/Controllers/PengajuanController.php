<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengajuanModel;
use App\Companycode;
use App\FixStationModel;

class PengajuanController extends Controller
{
    public function pengajuan()
    {
        $pengajuan = PengajuanModel::all();
        return view('Pengajuan.pengajuan', ['pengajuan' => $pengajuan]);
    }

    public function tambah()
    {
        $companycode = \Auth::user()->companycode->company_inisial;
        $totalPengajuan = PengajuanModel::where('no_pengajuan', 'LIKE', '%'.$companycode.'%')->whereMonth('created_at', \Carbon\Carbon::today()->month)->count();
        $spkNumber = $companycode."/".\Carbon\Carbon::today()->format('Ymd')."0000".($totalPengajuan + 1);
        $companycodes = Companycode::pluck('company_name', 'id');
        $fixstations = FixStationModel::pluck('nama_lokasi','id');
        return view('Pengajuan.tambah_pengajuan',[
            'spkNumber' => $spkNumber,
            'companycodes' => $companycodes
        ]);
    }

    public function approve($id)
    {
        $pengajuan = PengajuanModel::find($id)
        ->update([
            'approved' => 1
        ]);
        return redirect('/pengajuan')->with('sukses', 'Peminjaman berhasil di approve!');
    }

    public function reject($id)
    {
        $pengajuan = PengajuanModel::find($id)
        ->update([
            'approved' => 0
        ]);
        return redirect('/pengajuan')->with('sukses', 'Peminjaman berhasil di reject!');
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

    public function detail($id)
    {
        $pengajuan = PengajuanModel::find($id);
        return view('Pengajuan.detail_pengajuan', ['pengajuan' => $pengajuan]);
    }
}
