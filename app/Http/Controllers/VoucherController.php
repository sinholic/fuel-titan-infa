<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\VoucherModel;
use Faker\Provider\Uuid;
use Illuminate\Support\Str;

class VoucherController extends Controller
{
    public function voucher()
    {
        //$voucher = VoucherModel::groupBy('owner')->groupBy('expired_date')->get();
        $voucher = VoucherModel::all();
        return view('Voucher.voucher', ['voucher' => $voucher]);
    }

    public function tambah()
    {
        return view('Voucher.tambah_voucher');
    }

    public function create(Request $request)
    {
        $num_cols = $request->input('jumlah');
        for ($i = 1; $i <= $num_cols; $i++) {
            $baru = new VoucherModel;
            $baru->code_number = Str::random(20);
            $baru->qty = $request->qty;
            $baru->owner = $request->owner;
            $baru->expired_date = $request->expired_date;
            $baru->save();
        }
        //dd($request->all());
        return redirect('/voucher')->with('sukses', 'Data berhasil di Input!');
    }

    public function edit($id)
    {
        $voucher = VoucherModel::find($id);
        return view('Voucher.edit_voucher', ['voucher' => $voucher]);
    }

    public function update(Request $request, $id)
    {
        $voucher = VoucherModel::find($id);
        $voucher->update($request->all());
        return redirect('/voucher')->with('sukses', 'Data Berhasil di Update!');
    }

    public function delete($id)
    {
        $voucher = VoucherModel::find($id);
        $voucher->delete($voucher);
        return redirect('/voucher')->with('sukses', 'Data berhasil dihapus!');
    }

    public function print()
    {
        $voucher = VoucherModel::all();
        return view('Voucher.print_voucher', ['voucher' => $voucher]);
    }
}
