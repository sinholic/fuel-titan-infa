<?php

namespace App\Http\Controllers;

use App\HutangPiutang;
use App\PengajuanModel;
use Illuminate\Http\Request;

class HutangPiutangController extends Controller
{
    // Pengambilan 
    public function pengambilan_hutang()
    {
        $pengambilan = HutangPiutang::where('type', 'H')
            ->where('transaction_type', 'In')
            ->get();
        return view('Pengambilan.pengambilan', ['pengambilan' => $pengambilan]);
    }

    public function tambah_pengambilan_hutang()
    {
        $pengajuans = PengajuanModel::where('approved', 1)
        ->whereNotIn('id', function($query){
            $query->select(\DB::raw('pengajuan.id'))
            ->from('pengajuan')
            ->leftJoin('hutang_piutangs', 'pengajuan.id', '=', 'hutang_piutangs.credit_id')
            ->where('type', 'H')
            ->where('transaction_type', 'In')
            ->groupBy(\DB::raw('pengajuan.id'))
            ->having(\DB::raw('SUM(hutang_piutangs.qty)'), '>=', \DB::raw('pengajuan.qty'));
        })
        ->get();
        $pengajuanss = $pengajuans->pluck('no_pengajuan', 'id');
        return view('Pengambilan.tambah_pengambilan',[
            'pengajuans' => $pengajuans,
            'pengajuanss' => $pengajuanss
        ]);
    }

    public function create_pengambilan_hutang(Request $request)
    {
        $pengajuan = PengajuanModel::find($request->credit_id);
        if ($pengajuan->pengambilan->count() > 0) {
            $totalReceive = $pengajuan->pengambilan->count() + 1;
            $sum = $pengajuan->pengambilan->sum('qty');
            $total = intval($pengajuan->qty) - $sum;
            $request->validate(
                [
                    'qty' => 'required|numeric|max:' . $total,
                    'credit_id' => 'required',
                    'date' => 'required'
                ],
                [
                    // This PO has already received 20,000 so you can only receive 10,000 on maximum 
                    'qty.max' => 'This Debt number has already received ' . $sum . ' so you can only receive ' . $total . ' on maximum'
                ]
            );
        } else {
            $request->validate([
                'qty' => 'required|numeric|max:' . $pengajuan->qty,
                'credit_id' => 'required',
                'date' => 'required'
            ]);
        }
        HutangPiutang::create($request->all());
        return redirect('/pengambilan')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit_pengambilan_hutang($id)
    {
        $pengambilan = HutangPiutang::find($id);
        return view('Pengambilan.edit_pengambilan', ['pengambilan' => $pengambilan]);
    }

    public function update_pengambilan_hutang(Request $request, $id)
    {
        $pengambilan = HutangPiutang::find($id);
        $pengambilan->update($request->all());
        return redirect('/pengambilan')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete_pengambilan_hutang($id)
    {
        $pengambilan = HutangPiutang::find($id);
        $pengambilan->delete($pengambilan);
        return redirect('/pengambilan')->with('sukses', 'Data berhasil dihapus!');
    }


    // Pengembalian 
    public function pengembalian_hutang()
    {
        $pengambilan = HutangPiutang::where('type', 'H')
            ->where('transaction_type', 'Out')
            ->get();
        return view('Pengambilan.pengambilan', ['pengambilan' => $pengambilan]);
    }

    public function tambah_pengembalian_hutang()
    {
        $pengajuans = PengajuanModel::where('approved', 1)
        ->whereNotIn('id', function($query){
            $query->select(\DB::raw('pengajuan.id'))
            ->from('pengajuan')
            ->leftJoin('hutang_piutangs', 'pengajuan.id', '=', 'hutang_piutangs.credit_id')
            ->where('type', 'H')
            ->where('transaction_type', 'Out')
            ->groupBy(\DB::raw('pengajuan.id'))
            ->having(\DB::raw('SUM(hutang_piutangs.qty)'), '>=', \DB::raw('pengajuan.qty'));
        })
        ->get();
        $pengajuanss = $pengajuans->pluck('no_pengajuan', 'id');
        return view('Pengambilan.tambah_pengambilan',[
            'pengajuans' => $pengajuans,
            'pengajuanss' => $pengajuanss
        ]);
    }

    public function create_pengembalian_hutang(Request $request)
    {
        $pengajuan = PengajuanModel::find($request->credit_id);
        if ($pengajuan->pengambilan->count() > 0) {
            $totalReceive = $pengajuan->pengambilan->count() + 1;
            $sum = $pengajuan->pengambilan->sum('qty');
            $total = intval($pengajuan->qty) - $sum;
            $request->validate(
                [
                    'qty' => 'required|numeric|max:' . $total,
                    'credit_id' => 'required',
                    'date' => 'required'
                ],
                [
                    // This PO has already received 20,000 so you can only receive 10,000 on maximum 
                    'qty.max' => 'This Debt number has already received ' . $sum . ' so you can only receive ' . $total . ' on maximum'
                ]
            );
        } else {
            $request->validate([
                'qty' => 'required|numeric|max:' . $pengajuan->qty,
                'credit_id' => 'required',
                'date' => 'required'
            ]);
        }
        HutangPiutang::create($request->all());
        return redirect('/pengambilan')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit_pengembalian_hutang($id)
    {
        $pengambilan = HutangPiutang::find($id);
        return view('Pengambilan.edit_pengambilan', ['pengambilan' => $pengambilan]);
    }

    public function update_pengembalian_hutang(Request $request, $id)
    {
        $pengambilan = HutangPiutang::find($id);
        $pengambilan->update($request->all());
        return redirect('/pengambilan')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete_pengembalian_hutang($id)
    {
        $pengambilan = HutangPiutang::find($id);
        $pengambilan->delete($pengambilan);
        return redirect('/pengambilan')->with('sukses', 'Data berhasil dihapus!');
    }


    // Pengeluaran 
    public function pengeluaran_piutang()
    {
        $pengambilan = HutangPiutang::where('type', 'P')
            ->where('transaction_type', 'Out')
            ->get();
        return view('Pengambilan.pengambilan', ['pengambilan' => $pengambilan]);
    }

    public function tambah_pengeluaran_piutang()
    {
        $pengajuans = PengajuanModel::where('approved', 1)
        ->whereNotIn('id', function($query){
            $query->select(\DB::raw('pengajuan.id'))
            ->from('pengajuan')
            ->leftJoin('hutang_piutangs', 'pengajuan.id', '=', 'hutang_piutangs.credit_id')
            ->where('type', 'P')
            ->where('transaction_type', 'Out')
            ->groupBy(\DB::raw('pengajuan.id'))
            ->having(\DB::raw('SUM(hutang_piutangs.qty)'), '>=', \DB::raw('pengajuan.qty'));
        })
        ->get();
        $pengajuanss = $pengajuans->pluck('no_pengajuan', 'id');
        return view('Pengambilan.tambah_pengambilan',[
            'pengajuans' => $pengajuans,
            'pengajuanss' => $pengajuanss
        ]);
    }

    public function create_pengeluaran_piutang(Request $request)
    {
        $pengajuan = PengajuanModel::find($request->credit_id);
        if ($pengajuan->pengambilan->count() > 0) {
            $totalReceive = $pengajuan->pengambilan->count() + 1;
            $sum = $pengajuan->pengambilan->sum('qty');
            $total = intval($pengajuan->qty) - $sum;
            $request->validate(
                [
                    'qty' => 'required|numeric|max:' . $total,
                    'credit_id' => 'required',
                    'date' => 'required'
                ],
                [
                    // This PO has already received 20,000 so you can only receive 10,000 on maximum 
                    'qty.max' => 'This Debt number has already received ' . $sum . ' so you can only receive ' . $total . ' on maximum'
                ]
            );
        } else {
            $request->validate([
                'qty' => 'required|numeric|max:' . $pengajuan->qty,
                'credit_id' => 'required',
                'date' => 'required'
            ]);
        }
        HutangPiutang::create($request->all());
        return redirect('/pengambilan')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit_pengeluaran_piutang($id)
    {
        $pengambilan = HutangPiutang::find($id);
        return view('Pengambilan.edit_pengambilan', ['pengambilan' => $pengambilan]);
    }

    public function update_pengeluaran_piutang(Request $request, $id)
    {
        $pengambilan = HutangPiutang::find($id);
        $pengambilan->update($request->all());
        return redirect('/pengambilan')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete_pengeluaran_piutang($id)
    {
        $pengambilan = HutangPiutang::find($id);
        $pengambilan->delete($pengambilan);
        return redirect('/pengambilan')->with('sukses', 'Data berhasil dihapus!');
    }


    // Penerimaan 
    public function penerimaan_piutang()
    {
        $pengambilan = HutangPiutang::where('type', 'H')
            ->where('transaction_type', 'Out')
            ->get();
        return view('Pengambilan.pengambilan', ['pengambilan' => $pengambilan]);
    }

    public function tambah_penerimaan_piutang()
    {
        $pengajuans = PengajuanModel::where('approved', 1)
        ->whereNotIn('id', function($query){
            $query->select(\DB::raw('pengajuan.id'))
            ->from('pengajuan')
            ->leftJoin('hutang_piutangs', 'pengajuan.id', '=', 'hutang_piutangs.credit_id')
            ->where('type', 'H')
            ->where('transaction_type', 'Out')
            ->groupBy(\DB::raw('pengajuan.id'))
            ->having(\DB::raw('SUM(hutang_piutangs.qty)'), '>=', \DB::raw('pengajuan.qty'));
        })
        ->get();
        $pengajuanss = $pengajuans->pluck('no_pengajuan', 'id');
        return view('Pengambilan.tambah_pengambilan',[
            'pengajuans' => $pengajuans,
            'pengajuanss' => $pengajuanss
        ]);
    }

    public function create_penerimaan_piutang(Request $request)
    {
        $pengajuan = PengajuanModel::find($request->credit_id);
        if ($pengajuan->pengambilan->count() > 0) {
            $totalReceive = $pengajuan->pengambilan->count() + 1;
            $sum = $pengajuan->pengambilan->sum('qty');
            $total = intval($pengajuan->qty) - $sum;
            $request->validate(
                [
                    'qty' => 'required|numeric|max:' . $total,
                    'credit_id' => 'required',
                    'date' => 'required'
                ],
                [
                    // This PO has already received 20,000 so you can only receive 10,000 on maximum 
                    'qty.max' => 'This Debt number has already received ' . $sum . ' so you can only receive ' . $total . ' on maximum'
                ]
            );
        } else {
            $request->validate([
                'qty' => 'required|numeric|max:' . $pengajuan->qty,
                'credit_id' => 'required',
                'date' => 'required'
            ]);
        }
        HutangPiutang::create($request->all());
        return redirect('/pengambilan')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit_penerimaan_piutang($id)
    {
        $pengambilan = HutangPiutang::find($id);
        return view('Pengambilan.edit_pengambilan', ['pengambilan' => $pengambilan]);
    }

    public function update_penerimaan_piutang(Request $request, $id)
    {
        $pengambilan = HutangPiutang::find($id);
        $pengambilan->update($request->all());
        return redirect('/pengambilan')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete_penerimaan_piutang($id)
    {
        $pengambilan = HutangPiutang::find($id);
        $pengambilan->delete($pengambilan);
        return redirect('/pengambilan')->with('sukses', 'Data berhasil dihapus!');
    }
}