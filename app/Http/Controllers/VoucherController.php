<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\VoucherModel;
use App\Vouchercode;
use App\OwnerModel;
use Faker\Provider\Uuid;
use Illuminate\Support\Str;

class VoucherController extends Controller
{
    public function voucher()
    {
        $voucher = VoucherModel::all();
        return view('Voucher.voucher', ['voucher' => $voucher]);
    }

    public function lists($id)
    {
        $voucher = VoucherModel::with('vouchercodes', 'voucherowner')->find($id);
        // dd($voucher->voucherowner);
        return view('Voucher.list_vouchercodes', ['voucher' => $voucher]);
    }

    public function tambah()
    {
        $owners = OwnerModel::pluck('vendor_name', 'id');
        // dd($owners);
        return view('Voucher.tambah_voucher', ['owners' => $owners]);
    }

    public function create(Request $request)
    {
        $messages = [
            'required' => ':Tidak boleh mengisi tanggal kemarin',
        ];

        $this->validate($request, [
            'expired_date' => 'required|date|after_or_equal:start_date'
        ], $messages);

        $last_data = VoucherModel::with('vouchercodes')->where('owner', $request->owner)->whereHas('vouchercodes')->get()->last();
        $owner = OwnerModel::find($request->owner);
        $runningNumber = 0;
        if ($last_data) {
            $runningNumber = $last_data->vouchercodes->last()->serial_number;
            $runningNumber = preg_replace('/[^0-9 ]/i', '', $runningNumber);
        } else {
            $runningNumber = \Carbon\Carbon::now()->format('yndis') . "00000";
        }

        $runningNumber = (int) $runningNumber;

        $num_cols = $request->input('jumlah');
        $voucher = new VoucherModel;
        $voucher->qty = $request->qty;
        // $baru->code_number = Str::random(20);
        $voucher->owner = $request->owner;
        $voucher->expired_date = $request->expired_date;
        $voucher->save();

        $vouceherCodes = array();
        // dd($runningNumber);
        for ($i = 1; $i <= $num_cols; $i++) {
            $vouceherCodes[] = new Vouchercode(array(
                'voucher_id' => $voucher->id,
                'serial_number' => $owner->vendor_inisial . "-" . ($runningNumber + $i),
                'code_number' => sha1($owner->vendor_inisial . "-" . ($runningNumber + $i)),
                'used' => 0,
                'rejected' => 0
            ));
        }

        $voucher->vouchercodes()->saveMany($vouceherCodes);

        //dd($request->all());
        return redirect('/voucher')->with('sukses', 'Data berhasil di Input!');
    }

    public function edit($id)
    {
        $voucher = VoucherModel::find($id);
        $owners = OwnerModel::pluck('vendor_name', 'id');
        return view('Voucher.edit_voucher', ['voucher' => $voucher, 'owners']);
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
        $voucher->vouchercodes()->each(function($vouchercode) {
            $vouchercode->delete();
        });
        $voucher->delete($voucher);
        return redirect('/voucher')->with('sukses', 'Data berhasil dihapus!');
    }

    public function print($id)
    {
        $voucher = VoucherModel::with('vouchercodes', 'voucherowner')->find($id);
        // dd($voucher->voucherowner);
        return view('Voucher.print_voucher', ['voucher' => $voucher]);
    }

    public function reject($id_voucher, $id_vouchercode)
    {
        $voucher = VoucherModel::with('vouchercodes', 'voucherowner')->find($id_voucher);

        $vouchercode = Vouchercode::find($id_vouchercode)->update(['rejected' => 1]);
        return redirect()->action('VoucherController@lists', [$voucher]);
    }
}
