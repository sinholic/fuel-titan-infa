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
        ->where('type', 'H')
        ->whereNotIn('id', function($query){
            $query->select(\DB::raw('pengajuan.id'))
            ->from('pengajuan')
            ->leftJoin('hutang_piutangs', 'pengajuan.id', '=', 'hutang_piutangs.pengajuan_id')
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
        $pengajuan = PengajuanModel::find($request->pengajuan_id);
        $hutangpiutangs = $pengajuan->hutangpiutangs->where('type','H')->where('transaction_type', 'In');
        if ($hutangpiutangs->count() > 0) {
            $totalReceive = $hutangpiutangs->count() + 1;
            $sum = $hutangpiutangs->sum('qty');
            $total = ($pengajuan->qty + ($pengajuan->qty * 3/100)) - $sum;
            $request->validate(
                [
                    'qty' => 'required|numeric|max:' . $total,
                    'pengajuan_id' => 'required',
                    'transaction_date' => 'required|date'
                ],
                [
                    // This PO has already received 20,000 so you can only receive 10,000 on maximum 
                    'qty.max' => 'This Debt number has already received ' . $sum . ' so you can only receive ' . $total . ' on maximum'
                ]
            );
        } else {
            $request->validate([
                'qty' => 'required|numeric|max:' . ($pengajuan->qty + ($pengajuan->qty * 3/100)),
                'pengajuan_id' => 'required',
                'transaction_date' => 'required|date'
            ]);
        }
        HutangPiutang::create($request->all());
        return redirect('/pengambilan')->with('sukses', 'Data Berhasil Di Input!');
    }

    // Pengembalian 
    public function pengembalian_hutang()
    {
        $pengembalian = HutangPiutang::where('type', 'H')
            ->where('transaction_type', 'Out')
            ->get();
        return view('Pengembalian.pengembalian', ['pengembalian' => $pengembalian]);
    }

    public function tambah_pengembalian_hutang()
    {
        $pengajuans = PengajuanModel::where('approved', 1)
        ->where('type', 'H')
        ->whereNotIn('id', function($query){
            $query->select(\DB::raw('pengajuan.id'))
            ->from('pengajuan')
            ->leftJoin('hutang_piutangs', 'pengajuan.id', '=', 'hutang_piutangs.pengajuan_id')
            ->where('transaction_type', 'Out')
            ->groupBy(\DB::raw('pengajuan.id'))
            ->having(\DB::raw('SUM(hutang_piutangs.qty)'), '>=', \DB::raw('pengajuan.qty'));
        })
        ->whereIn('id', function($query){
            $query->select(\DB::raw('pengajuan.id'))
            ->from('pengajuan')
            ->leftJoin('hutang_piutangs', 'pengajuan.id', '=', 'hutang_piutangs.pengajuan_id')
            ->where('transaction_type', 'In')
            ->groupBy(\DB::raw('pengajuan.id'))
            ->having(\DB::raw('SUM(hutang_piutangs.qty)'), '>=', \DB::raw('pengajuan.qty'));
        })
        ->get();
        $pengajuanss = $pengajuans->pluck('no_pengajuan', 'id');
        return view('Pengembalian.tambah_pengembalian',[
            'pengajuans' => $pengajuans,
            'pengajuanss' => $pengajuanss
        ]);
    }

    public function create_pengembalian_hutang(Request $request)
    {
        $pengajuan = PengajuanModel::find($request->pengajuan_id);
        // $takings = $pengajuan->hutangpiutangs->where('type','H')->where('transaction_type', 'In');
        $returns = $pengajuan->hutangpiutangs->where('type','H')->where('transaction_type', 'Out');
        if ($returns->count() > 0) {
            $totalReceive = $returns->count() + 1;
            $sum = $returns->sum('qty');
            $total = $pengajuan->qty - $sum;
            $request->validate(
                [
                    'qty' => 'required|numeric|max:' . $total,
                    'pengajuan_id' => 'required',
                    'transaction_date' => 'required|date'
                ],
                [
                    // This PO has already received 20,000 so you can only receive 10,000 on maximum 
                    'qty.max' => 'This Debt number already return ' . $sum . ' so you can only return ' . $total . ' on maximum'
                ]
            );
        } else {
            $sum = $returns->sum('qty');
            $request->validate([
                'qty' => 'required|numeric|max:' . $pengajuan->qty,
                'pengajuan_id' => 'required',
                'transaction_date' => 'required|date'
            ]);
        }
        HutangPiutang::create($request->all());
        return redirect('/pengambilan')->with('sukses', 'Data Berhasil Di Input!');
    }

    // Pengeluaran 
    public function pengeluaran_piutang()
    {
        $pengeluaran = HutangPiutang::where('type', 'P')
            ->where('transaction_type', 'Out')
            ->get();
        return view('Pengeluaran.pengeluaran', ['pengeluaran' => $pengeluaran]);
    }

    public function tambah_pengeluaran_piutang()
    {
        $pengajuans = PengajuanModel::where('approved', 1)
        ->where('type', 'P')
        ->whereNotIn('id', function($query){
            $query->select(\DB::raw('pengajuan.id'))
            ->from('pengajuan')
            ->leftJoin('hutang_piutangs', 'pengajuan.id', '=', 'hutang_piutangs.pengajuan_id')
            ->where('transaction_type', 'Out')
            ->groupBy(\DB::raw('pengajuan.id'))
            ->having(\DB::raw('SUM(hutang_piutangs.qty)'), '>=', \DB::raw('pengajuan.qty'));
        })
        ->get();
        $pengajuanss = $pengajuans->pluck('no_pengajuan', 'id');
        return view('Pengeluaran.tambah_pengeluaran',[
            'pengajuans' => $pengajuans,
            'pengajuanss' => $pengajuanss
        ]);
    }

    public function create_pengeluaran_piutang(Request $request)
    {
        $pengajuan = PengajuanModel::find($request->pengajuan_id);
        $pengeluarans = $pengajuan->hutangpiutangs->where('type','P')->where('transaction_type', 'Out');
        if ($pengeluarans->count() > 0) {
            $totalReceive = $pengeluarans->count() + 1;
            $sum = $pengeluarans->sum('qty');
            $total = intval($pengajuan->qty) - $sum;
            $request->validate(
                [
                    'qty' => 'required|numeric|max:' . $total,
                    'pengajuan_id' => 'required',
                    'transaction_date' => 'required|date'
                ],
                [
                    // This PO has already received 20,000 so you can only receive 10,000 on maximum 
                    'qty.max' => 'This Debt number has already received ' . $sum . ' so you can only receive ' . $total . ' on maximum'
                ]
            );
        } else {
            $request->validate([
                'qty' => 'required|numeric|max:' . $pengajuan->qty,
                'pengajuan_id' => 'required',
                'transaction_date' => 'required|date'
            ]);
        }
        HutangPiutang::create($request->all());
        return redirect('/pengeluaran')->with('sukses', 'Data Berhasil Di Input!');
    }

    // Penerimaan 
    public function penerimaan_piutang()
    {
        $penerimaan_piutang = HutangPiutang::where('type', 'P')
            ->where('transaction_type', 'In')
            ->get();
        return view('Penerimaan Piutang.penerimaan_piutang', ['penerimaan_piutang' => $penerimaan_piutang]);
    }

    public function tambah_penerimaan_piutang()
    {
        $pengajuans = PengajuanModel::where('approved', 1)
        ->where('type', 'P')
        ->whereIn('id', function($query){
            $query->select(\DB::raw('pengajuan.id'))
            ->from('pengajuan')
            ->leftJoin('hutang_piutangs', 'pengajuan.id', '=', 'hutang_piutangs.pengajuan_id')
            ->where('transaction_type', 'Out')
            ->groupBy(\DB::raw('pengajuan.id'))
            ->having(\DB::raw('SUM(hutang_piutangs.qty)'), '>=', \DB::raw('pengajuan.qty'));
        })
        ->whereNotIn('id', function($query){
            $query->select(\DB::raw('pengajuan.id'))
            ->from('pengajuan')
            ->leftJoin('hutang_piutangs', 'pengajuan.id', '=', 'hutang_piutangs.pengajuan_id')
            ->where('transaction_type', 'In')
            ->groupBy(\DB::raw('pengajuan.id'))
            ->having(\DB::raw('SUM(hutang_piutangs.qty)'), '>=', \DB::raw('pengajuan.qty'));
        })
        ->get();
        $pengajuanss = $pengajuans->pluck('no_pengajuan', 'id');
        return view('Penerimaan Piutang.tambah_penerimaan',[
            'pengajuans' => $pengajuans,
            'pengajuanss' => $pengajuanss
        ]);
    }

    public function create_penerimaan_piutang(Request $request)
    {
        $pengajuan = PengajuanModel::find($request->pengajuan_id);
        $penerimaan_piutang = $pengajuan->hutangpiutangs->where('type','P')->where('transaction_type', 'In');
        if ($penerimaan_piutang->count() > 0) {
            $totalReceive = $penerimaan_piutang->count() + 1;
            $sum = $penerimaan_piutang->sum('qty');
            $total = intval($pengajuan->qty) - $sum;
            $request->validate(
                [
                    'qty' => 'required|numeric|max:' . $total,
                    'pengajuan_id' => 'required',
                    'transaction_date' => 'required|date'
                ],
                [
                    // This PO has already received 20,000 so you can only receive 10,000 on maximum 
                    'qty.max' => 'This Debt number has already received ' . $sum . ' so you can only receive ' . $total . ' on maximum'
                ]
            );
        } else {
            $request->validate([
                'qty' => 'required|numeric|max:' . $pengajuan->qty,
                'pengajuan_id' => 'required',
                'transaction_date' => 'required|date'
            ]);
        }
        HutangPiutang::create($request->all());
        return redirect('/penerimaan_piutang')->with('sukses', 'Data Berhasil Di Input!');
    }
}