<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengisianFixModel;
use App\Reloadingunit;
use App\EquipmentModel;
use App\VoucherModel;
use App\Vouchercode;
use App\User;

class PengisianFixController extends Controller
{
    public function pengisian_fix()
    {
        $pengisian_fix = Reloadingunit::with('fixstation')->where('origin', 'Fix Station')->get();
        return view('Pengisian Fix.pengisian_fix', [
            'pengisian_fix' => $pengisian_fix
        ]);
    }

    public function tambah()
    {
        $equipments = EquipmentModel::with('equipmentowner','equipmentcategory')->get();
        $users = User::all();
        $vouchers = Vouchercode::with('voucher', 'voucher.voucherowner')
        ->where('used', 0)
        ->where('rejected', 0)
        ->whereHas('voucher', function($query){
            $query->whereDate('expired_date', '>=', \Carbon\Carbon::now()->toDateString());
        })
        ->get();
        return view('Pengisian Fix.tambah_pengisianfix',[
            'equipments' => $equipments,
            'users' => $users,
            'vouchers' => $vouchers
        ]);
    }

    public function create(Request $request)
    {
        $lastreload = Reloadingunit::where('equipment_id', $request->equipment_id)
        ->get()
        ->last();
        if ($lastreload) {     
            $this->validate($request, [
                'odometer' => 'numeric|min:'.($lastreload->odometer + 1)
            ]);
        }
        Vouchercode::find($request->voucher_id)->update(['used'=>1]);
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
