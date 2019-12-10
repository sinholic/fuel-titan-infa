<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PiutangModel;
use App\FixStationModel;

class PiutangController extends Controller
{
    public function piutang()
    {
        $piutang = PiutangModel::all();
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

    public function bukticetak($id)
    {
        $piutang = PiutangModel::find($id);
        return view('Piutang.cetakpiutang', ['piutang' => $piutang]);
    }

    public function approve($id)
    {
        $piutang = PiutangModel::find($id)
            ->update([
                'approved' => 1
            ]);
        return redirect('/piutang')->with('sukses', 'Peminjaman berhasil di approve!');
    }

    public function reject($id)
    {
        $piutang = PiutangModel::find($id)
            ->update([
                'approved' => 0
            ]);
        return redirect('/piutang')->with('sukses', 'Peminjaman berhasil di reject!');
    }
}
