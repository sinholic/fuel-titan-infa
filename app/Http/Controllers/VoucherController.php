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

        $last_data = VoucherModel::where('owner', $request->owner)->get()->last();
        $runningNumber = 0;
        if ($last_data) {
            $runningNumber = $last_data->vouchercodes->last()->serial_number;
        }else {
            $runningNumber = $request->owner . \Carbon\Carbon::now()->format('yYn') . "0000001";
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
                'serial_number' => $runningNumber + $i,
                'code_number' => sha1($runningNumber + $i),
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

    public function print($id)
    {
        $voucher = VoucherModel::with('vouchercodes', 'voucherowner')->find($id);
        // dd($voucher->voucherowner);
        return view('Voucher.print_voucher', ['voucher' => $voucher]);
    }
}
