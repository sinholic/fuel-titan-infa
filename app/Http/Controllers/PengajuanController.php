<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengajuanModel;
use App\Companycode;
use App\FixStationModel;

class PengajuanController extends Controller
{
    public function pengajuan_hutang()
    {
        $pengajuan = PengajuanModel::where('type', 'H')->get();
        return view('Pengajuan.pengajuan_hutang', ['pengajuan' => $pengajuan]);
    }

    public function pengajuan_piutang()
    {
        $pengajuan = PengajuanModel::where('type', 'P')->get();
        return view('Pengajuan.pengajuan_piutang', ['pengajuan' => $pengajuan]);
    }
    
    public function tambah_hutang()
    {
        $companycode = \Auth::user()->companycode->company_inisial;
        $totalPengajuan = PengajuanModel::where('no_pengajuan', 'LIKE', '%'.$companycode.'%')->where('type','H')->whereMonth('created_at', \Carbon\Carbon::today()->month)->count();
        $spkNumber = "H-".$companycode."/".\Carbon\Carbon::today()->format('Ymd')."0000".($totalPengajuan + 1);
        $companycodes = Companycode::whereNotIn('id', [\Auth::user()->companycode->id])->pluck('company_name', 'id');
        $fixstations = FixStationModel::whereNotIn('companycode_id', [\Auth::user()->companycode->id])->groupBy('name_station', 'address')->pluck('nama_lokasi','id');
        return view('Pengajuan.tambah_pengajuan_hutang',[
            'spkNumber' => $spkNumber,
            'companycodes' => $companycodes,
            'fixstations' => $fixstations
        ]);
    }

    public function tambah_piutang()
    {
        $companycode = \Auth::user()->companycode->company_inisial;
        $totalPengajuan = PengajuanModel::where('no_pengajuan', 'LIKE', '%'.$companycode.'%')->where('type','P')->whereMonth('created_at', \Carbon\Carbon::today()->month)->count();
        $spkNumber = "P-".$companycode."/".\Carbon\Carbon::today()->format('Ymd')."0000".($totalPengajuan + 1);
        $companycodes = Companycode::whereNotIn('id', [\Auth::user()->companycode->id])->pluck('company_name', 'id');
        $fixstations = FixStationModel::whereIn('companycode_id', [\Auth::user()->companycode->id])->groupBy('name_station', 'address')->pluck('nama_lokasi','id');
        return view('Pengajuan.tambah_pengajuan_piutang',[
            'spkNumber' => $spkNumber,
            'companycodes' => $companycodes,
            'fixstations' => $fixstations
        ]);
    }
    
    public function approve($id)
    {
        $pengajuan = PengajuanModel::find($id)
        ->update([
            'approved' => 1
        ]);
        $params = $pengajuan->type == 'H' ? "_hutang" : "_piutang";
        return redirect('/pengajuan'.$params)->with('sukses', 'Pengajuan berhasil di approve!');
    }
    
    public function reject($id)
    {
        $pengajuan = PengajuanModel::find($id)
        ->update([
            'approved' => 0
        ]);
        $params = $pengajuan->type == 'H' ? "_hutang" : "_piutang";
        return redirect('/pengajuan'.$params)->with('sukses', 'Pengajuan berhasil di reject!');
    }
    
    public function create(Request $request)
    {
        PengajuanModel::create($request->all());
        $params = $request->type == 'H' ? "_hutang" : "_piutang";
        return redirect('/pengajuan'.$params)->with('sukses', 'Data Berhasil Di Input!');
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
        $params = $pengajuan->type == 'H' ? "_hutang" : "_piutang";
        return redirect('/pengajuan'.$params)->with('sukses', 'Data Berhasil Di Update!');
    }
    
    public function delete($id)
    {
        $pengajuan = PengajuanModel::find($id);
        $pengajuan->delete($pengajuan);
        $params = $pengajuan->type == 'H' ? "_hutang" : "_piutang";
        return redirect('/pengajuan'.$params)->with('sukses', 'Data berhasil dihapus!');
    }
    
    public function detail($id)
    {
        $pengajuan = PengajuanModel::find($id);
        return view('Pengajuan.detail_pengajuan', ['pengajuan' => $pengajuan]);
    }
    
    public function bukticetak($id)
    {
        $pengajuan = PengajuanModel::find($id);
        return view('Pengajuan.bukticetak', ['pengajuan' => $pengajuan]);
    }
}