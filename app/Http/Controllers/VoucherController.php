<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\VoucherModel;

class VoucherController extends Controller
{
    public function voucher()
    {
        $voucher = VoucherModel::all();
        return view('Voucher.voucher', ['voucher' => $voucher]);
    }

    public function tambah()
    {
        return view('Voucher.tambah_voucher');
    }

    public function create(Request $request)
    {
        VoucherModel::create($request->all());
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
