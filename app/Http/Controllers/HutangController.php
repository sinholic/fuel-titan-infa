<?php

namespace App\Http\Controllers;

use App\HutangPiutang;
use Illuminate\Http\Request;

class HutangController extends Controller
{
    public function pengajuan_hutang()
    {
        $pengajuan_hutang = HutangPiutang::where('type', 'H');
        return view('Pengajuan Hutang.pengajuan_hutang', ['pengajuan_hutang' => $pengajuan_hutang]);
    }

    public function tambah()
    {
        $fixstations = FixStationModel::select(\DB::raw('CONCAT(name_station, " (Tangki nomor ", tank_number, ")") as text'), 'id')->pluck('text', 'id');
        return view('Pengajuan Hutang.tambah_pengajuan_hutang', [
            'fixstations' => $fixstations
        ]);
    }

    public function create(Request $request)
    {
        HutangPiutang::create($request->all());
        return redirect('/pengajuan_hutang')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $pengajuan_hutang = HutangPiutang::find($id);
        return view('Pengajuan Hutang.edit_pengajuan_hutang', ['pengajuan_hutang' => $pengajuan_hutang]);
    }

    public function update(Request $request, $id)
    {
        $pengajuan_hutang = HutangPiutang::find($id);
        $pengajuan_hutang->update($request->all());
        return redirect('/pengajuan_hutang')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $pengajuan_hutang = HutangPiutang::find($id);
        $pengajuan_hutang->delete($pengajuan_hutang);
        return redirect('/pengajuan_hutang')->with('sukses', 'Data berhasil dihapus!');
    }

    public function bukticetak($id)
    {
        $pengajuan_hutang = HutangPiutang::find($id);
        return view('Pengajuan Hutang.cetakhutang', ['pengajuan_hutang' => $pengajuan_hutang]);
    }

    public function approve($id)
    {
        $pengajuan_hutang = HutangPiutang::find($id)
            ->update([
                'approved' => 1
            ]);
        return redirect('/pengajuan_hutang')->with('sukses', 'Peminjaman berhasil di approve!');
    }

    public function reject($id)
    {
        $pengajuan_hutang = HutangPiutang::find($id)
            ->update([
                'approved' => 0
            ]);
        return redirect('/pengajuan_hutang')->with('sukses', 'Peminjaman berhasil di reject!');
    }
}


//Contoh Controller
// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\PengajuanModel;
// use App\Companycode;
// use App\FixStationModel;

// class PengajuanController extends Controller
// {
//     public function pengajuan()
//     {
//         $pengajuan = PengajuanModel::all();
//         return view('Pengajuan.pengajuan_hutang', ['pengajuan' => $pengajuan]);
//     }

//     public function tambah()
//     {
//         $companycode = \Auth::user()->companycode->company_inisial;
//         $totalPengajuan = PengajuanModel::where('no_pengajuan', 'LIKE', '%'.$companycode.'%')->whereMonth('created_at', \Carbon\Carbon::today()->month)->count();
//         $spkNumber = $companycode."/".\Carbon\Carbon::today()->format('Ymd')."0000".($totalPengajuan + 1);
//         $companycodes = Companycode::pluck('company_name', 'id');
//         $fixstations = FixStationModel::groupBy('name_station', 'address')
//         ->pluck('nama_lokasi','id');
//         return view('Pengajuan.tambah_pengajuan',[
//             'spkNumber' => $spkNumber,
//             'companycodes' => $companycodes,
//             'fixstations' => $fixstations
//         ]);
//     }

//     public function approve($id)
//     {
//         $pengajuan = PengajuanModel::find($id)
//         ->update([
//             'approved' => 1
//         ]);
//         return redirect('/pengajuan')->with('sukses', 'Peminjaman berhasil di approve!');
//     }

//     public function reject($id)
//     {
//         $pengajuan = PengajuanModel::find($id)
//         ->update([
//             'approved' => 0
//         ]);
//         return redirect('/pengajuan')->with('sukses', 'Peminjaman berhasil di reject!');
//     }

//     public function create(Request $request)
//     {
//         PengajuanModel::create($request->all());
//         return redirect('/pengajuan')->with('sukses', 'Data Berhasil Di Input!');
//     }

//     public function edit($id)
//     {
//         $pengajuan = PengajuanModel::find($id);
//         return view('Pengajuan.edit_pengajuan', ['pengajuan' => $pengajuan]);
//     }

//     public function update(Request $request, $id)
//     {
//         $pengajuan = PengajuanModel::find($id);
//         $pengajuan->update($request->all());
//         return redirect('/pengajuan')->with('sukses', 'Data Berhasil Di Update!');
//     }

//     public function delete($id)
//     {
//         $pengajuan = PengajuanModel::find($id);
//         $pengajuan->delete($pengajuan);
//         return redirect('/pengajuan')->with('sukses', 'Data berhasil dihapus!');
//     }

//     public function detail($id)
//     {
//         $pengajuan = PengajuanModel::find($id);
//         return view('Pengajuan.detail_pengajuan', ['pengajuan' => $pengajuan]);
//     }

//     public function bukticetak($id)
//     {
//         $pengajuan = PengajuanModel::find($id);
//         return view('Pengajuan.bukticetak', ['pengajuan' => $pengajuan]);
//     }
// }
