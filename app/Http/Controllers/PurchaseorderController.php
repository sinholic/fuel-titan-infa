<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uploadedfile;
use App\Purchaseorder;
use App\Imports\PurchaseorderImport;

class PurchaseorderController extends Controller
{

    public function index()
    {
        $purchaseorders = Purchaseorder::all();
        return view('Purchase Order.purchaseorder', ['purchaseorders' => $purchaseorders]);
    }

    public function import_excel(Request $request)
    {
        //validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $fileExtension = $request->file('file');

        $file = $request->file('file')->storeAs(
            'purchaseorder',
            \Auth::user()->id . "-" . \Carbon\Carbon::now()->timestamp . "." . $fileExtension->clientExtension()
        );

        $upload_file = Uploadedfile::create([
            'uplodedpath' => $file,
            'uploaded' => 1
        ])->id;

        //menangkap file excel
        // $file = $request->file('file');

        //membuat nama file unik
        // $nama_file = rand() . $file->getClientOriginalName();

        //upload ke folder file_station di dalam folder public
        // $file->move('file_station', $nama_file);

        //import data
        \Excel::import(new PurchaseorderImport, storage_path('app/') . $file);

        Uploadedfile::find($upload_file)->update([
            'processed' => 1
        ]);

        //notifikasi dengan session
        \Session::flash('sukses', 'Data Purchase Order Berhasil Di Import!');

        //alihkan kembali
        return redirect('/purchaseorder');
    }
}
