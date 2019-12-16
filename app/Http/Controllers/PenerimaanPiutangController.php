<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengambilanModel;

class PenerimaanPiutangController extends Controller
{
    public function penerimaan_piutang()
    {
        $penerimaan_piutang = PengambilanModel::all();
        return view('Penerimaan Piutang.penerimaan_piutang', ['penerimaan_piutang' => $penerimaan_piutang]);
    }

    public function tambah()
    {
        $pengajuans = PengajuanModel::where('approved', 1)
            ->whereNotIn('id', function ($query) {
                $query->select(\DB::raw('pengajuan_hutang.id'))
                    ->from('pengajuan_hutang')
                    ->leftJoin('penerimaan_piutang', 'pengajuan_hutang.id', '=', 'penerimaan_piutang.credit_id')
                    ->groupBy(\DB::raw('pengajuan_hutang.id'))
                    ->having(\DB::raw('SUM(penerimaan_piutang.qty)'), '>=', \DB::raw('pengajuan_hutang.qty'));
            })
            ->get();
        $pengajuanss = $pengajuans->pluck('no_pengajuan', 'id');
        return view('Penerimaan Piutang.tambah_pengambilan', [
            'pengajuans' => $pengajuans,
            'pengajuanss' => $pengajuanss
        ]);
    }

    public function create(Request $request)
    {
        $pengajuan = PengajuanModel::find($request->credit_id);
        if ($pengajuan->penerimaan_piutang->count() > 0) {
            $totalReceive = $pengajuan->penerimaan_piutang->count() + 1;
            // dd($pengajuan->penerimaan_piutang->sum('qty'));
            $sum = $pengajuan->penerimaan_piutang->sum('qty');
            $total = intval($pengajuan->qty) - $sum;
            // dd($total);
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
        PengambilanModel::create($request->all());
        return redirect('/penerimaan_piutang')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $penerimaan_piutang = PengambilanModel::find($id);
        return view('Penerimaan Piutang.edit_pengambilan', ['penerimaan_piutang' => $penerimaan_piutang]);
    }

    public function update(Request $request, $id)
    {
        $penerimaan_piutang = PengambilanModel::find($id);
        $penerimaan_piutang->update($request->all());
        return redirect('/penerimaan_piutang')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $penerimaan_piutang = PengambilanModel::find($id);
        $penerimaan_piutang->delete($penerimaan_piutang);
        return redirect('/penerimaan_piutang')->with('sukses', 'Data berhasil dihapus!');
    }
}
