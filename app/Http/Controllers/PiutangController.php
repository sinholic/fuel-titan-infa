<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HutangPiutang;
use App\FixStationModel;

class PiutangController extends Controller
{
   public function pengajuan_piutang()
    {
        $pengajuan_piutang = HutangPiutang::where('type', 'H');
        return view('Pengajuan Piutang.pengajuan_piutang', ['pengajuan_piutang' => $pengajuan_piutang]);
    }

    public function tambah()
    {
        $fixstations = FixStationModel::select(\DB::raw('CONCAT(name_station, " (Tangki nomor ", tank_number, ")") as text'), 'id')->pluck('text', 'id');
        return view('Pengajuan Piutang.tambah_pengajuan_piutang', [
            'fixstations' => $fixstations
        ]);
    }

    public function create(Request $request)
    {
        HutangPiutang::create($request->all());
        return redirect('/pengajuan_piutang')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $pengajuan_piutang = HutangPiutang::find($id);
        return view('Pengajuan Piutang.edit_piutang', ['pengajuan_piutang' => $pengajuan_piutang]);
    }

    public function update(Request $request, $id)
    {
        $pengajuan_piutang = HutangPiutang::find($id);
        $pengajuan_piutang->update($request->all());
        return redirect('/pengajuan_piutang')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $pengajuan_piutang = HutangPiutang::find($id);
        $pengajuan_piutang->delete($pengajuan_piutang);
        return redirect('/pengajuan_piutang')->with('sukses', 'Data berhasil dihapus!');
    }

    public function bukticetak($id)
    {
        $pengajuan_piutang = HutangPiutang::find($id);
        return view('Pengajuan Piutang.cetakpiutang', ['pengajuan_piutang' => $pengajuan_piutang]);
    }

    public function approve($id)
    {
        $pengajuan_piutang = HutangPiutang::find($id)
            ->update([
                'approved' => 1
            ]);
        return redirect('/pengajuan_piutang')->with('sukses', 'Peminjaman berhasil di approve!');
    }

    public function reject($id)
    {
        $pengajuan_piutang = HutangPiutang::find($id)
            ->update([
                'approved' => 0
            ]);
        return redirect('/pengajuan_piutang')->with('sukses', 'Peminjaman berhasil di reject!');
    }
}