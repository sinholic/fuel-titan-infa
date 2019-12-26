<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HutangPiutang;
use App\FixStationModel;

class PiutangController extends Controller
{
   public function piutang()
    {
        $piutang = HutangPiutang::where('type', 'H');
        return view('Piutang.piutang', ['piutang' => $piutang]);
    }

    public function tambah()
    {
        $fixstations = FixStationModel::select(\DB::raw('CONCAT(name_station, " (Tangki nomor ", tank_number, ")") as text'), 'id')->pluck('text', 'id');
        return view('Piutang.tambah_piutang', [
            'fixstations' => $fixstations
        ]);
    }

    public function create(Request $request)
    {
        HutangPiutang::create($request->all());
        return redirect('/piutang')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $piutang = HutangPiutang::find($id);
        return view('Piutang.edit_piutang', ['piutang' => $piutang]);
    }

    public function update(Request $request, $id)
    {
        $piutang = HutangPiutang::find($id);
        $piutang->update($request->all());
        return redirect('/piutang')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $piutang = HutangPiutang::find($id);
        $piutang->delete($piutang);
        return redirect('/piutang')->with('sukses', 'Data berhasil dihapus!');
    }

    public function bukticetak($id)
    {
        $piutang = HutangPiutang::find($id);
        return view('Piutang.cetakpiutang', ['piutang' => $piutang]);
    }

    public function approve($id)
    {
        $piutang = HutangPiutang::find($id)
            ->update([
                'approved' => 1
            ]);
        return redirect('/piutang')->with('sukses', 'Peminjaman berhasil di approve!');
    }

    public function reject($id)
    {
        $piutang = HutangPiutang::find($id)
            ->update([
                'approved' => 0
            ]);
        return redirect('/piutang')->with('sukses', 'Peminjaman berhasil di reject!');
    }
}