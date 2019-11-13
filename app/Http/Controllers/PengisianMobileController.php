<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengisianMobileModel;
use App\QtySolarModel;

class PengisianMobileController extends Controller
{
    public function pengisian_mobile()
    {
        $pengisian_mobile = PengisianMobileModel::all();
        return view('Pengisian Mobile.pengisian_mobile', ['pengisian_mobile' => $pengisian_mobile]);
    }

    public function tambah()
    {
        $qty_solar = QtySolarModel::pluck('qty_solar', 'id');

        return view('Pengisian Mobile.addpengisian_mobile', ['qty_solar' => $qty_solar]);
    }

    public function create(Request $request)
    {
        PengisianMobileModel::create($request->all());
        return redirect('/pengisian_mobile')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $pengisian_mobile = PengisianMobileModel::find($id);
        $qty_solar = QtySolarModel::pluck('qty_solar', 'id');
        return view('Pengisian Mobile.edit_pengisian_mobile', ['pengisian_mobile' => $pengisian_mobile, 'qty_solar' => $qty_solar]);
    }

    public function update(Request $request, $id)
    {
        $pengisian_mobile = PengisianMobileModel::find($id);
        $pengisian_mobile->update($request->all());
        return redirect('/pengisian_mobile')->with('sukses', 'Data berhasil di Update!');
    }

    public function delete($id)
    {
        $pengisian_mobile = PengisianMobileModel::find($id);
        $pengisian_mobile->delete($pengisian_mobile);
        return redirect('/pengisian_mobile')->with('sukses', 'Data berhasil dihapus!');
    }
}
