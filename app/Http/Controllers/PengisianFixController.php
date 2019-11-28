<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengisianFixModel;
use App\Reloadingunit;
use App\EquipmentModel;
use App\VoucherModel;
use App\User;

class PengisianFixController extends Controller
{
    public function pengisian_fix()
    {
        $pengisian_fix = Reloadingunit::where('origin', 'Fix Station')->get();
        return view('Pengisian Fix.pengisian_fix', [
            'pengisian_fix' => $pengisian_fix
        ]);
    }

    public function tambah()
    {
        $equipments = EquipmentModel::all();
        $users = User::all();
        return view('Pengisian Fix.tambah_pengisianfix',[
            'equipments' => $equipments,
            'users' => $users,
        ]);
    }

    public function create(Request $request)
    {
        Reloadingunit::create($request->all());
        return redirect('/pengisian_fix')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $pengisian_fix = Reloadingunit::find($id);
        return view('Pengisian Fix.edit_pengisianfix', ['pengisian_fix' => $pengisian_fix]);
    }

    public function update(Request $request, $id)
    {
        $pengisian_fix = Reloadingunit::find($id);
        $pengisian_fix->update($request->all());
        return redirect('/pengisian_fix')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $pengisian_fix = Reloadingunit::find($id);
        $pengisian_fix->delete($pengisian_fix);
        return redirect('/pengisian_fix')->with('sukses', 'Data berhasil dihapus!');
    }
}
