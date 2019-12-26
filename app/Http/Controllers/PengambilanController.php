<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengambilanModel;
use App\PengajuanModel;

class PengambilanController extends Controller
{
    public function pengambilan()
    {
        $pengambilan = PengambilanModel::all();
        return view('Pengambilan.pengambilan', ['pengambilan' => $pengambilan]);
    }

    public function tambah()
    {
        $pengajuans = PengajuanModel::where('approved', 1)
        ->whereNotIn('id', function($query){
            $query->select(\DB::raw('pengajuan_hutang.id'))
            ->from('pengajuan_hutang')
            ->leftJoin('pengambilan', 'pengajuan_hutang.id', '=', 'pengambilan.credit_id')
            ->groupBy(\DB::raw('pengajuan_hutang.id'))
            ->having(\DB::raw('SUM(pengambilan.qty)'), '>=', \DB::raw('pengajuan_hutang.qty'));
        })
        ->get();
        $pengajuanss = $pengajuans->pluck('no_pengajuan', 'id');
        return view('Pengambilan.tambah_pengambilan',[
            'pengajuans' => $pengajuans,
            'pengajuanss' => $pengajuanss
        ]);
    }

    public function create(Request $request)
    {
        $pengajuan = PengajuanModel::find($request->credit_id);
        if ($pengajuan->pengambilan->count() > 0) {
            $totalReceive = $pengajuan->pengambilan->count() + 1;
            // dd($pengajuan->pengambilan->sum('qty'));
            $sum = $pengajuan->pengambilan->sum('qty');
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
        return redirect('/pengambilan')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $pengambilan = PengambilanModel::find($id);
        return view('Pengambilan.edit_pengambilan', ['pengambilan' => $pengambilan]);
    }

    public function update(Request $request, $id)
    {
        $pengambilan = PengambilanModel::find($id);
        $pengambilan->update($request->all());
        return redirect('/pengambilan')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $pengambilan = PengambilanModel::find($id);
        $pengambilan->delete($pengambilan);
        return redirect('/pengambilan')->with('sukses', 'Data berhasil dihapus!');
    }
}
