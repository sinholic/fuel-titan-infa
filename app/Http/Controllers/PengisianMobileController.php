<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengisianMobileModel;

class PengisianMobileController extends Controller
{
    public function pengisian_mobile()
    {
        $pengisian_mobile = PengisianMobileModel::all();
        return view('Pengisian Mobile.pengisian_mobile', ['pengisian_mobile' => $pengisian_mobile]);
    }

    public function tambah()
    {
        return view('Pengisian Mobile.addpengisian_mobile');
    }

    public function create(Request $request)
    {
        PengisianMobileModel::create($request->all());
        return redirect('/pengisian_mobile')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $pengisian_mobile = PengisianMobileModel::find($id);
        return view('Pengisian Mobile.edit_pengisian_mobile', ['pengisian_mobile' => $pengisian_mobile]);
    }
}