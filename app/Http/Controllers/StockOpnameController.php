<?php

namespace App\Http\Controllers;

use App\StockOpname;
use Illuminate\Http\Request;

class StockOpnameController extends Controller
{
    public function stockopname()
    {
        $stockopname = StockOpname::all();
        return view('StockOpname.stockopname', ['stockopname' => $stockopname]);
    }

    public function tambah()
    {
        return view('StockOpname.tambah_stockopname');
    }

    public function create(Request $request)
    {
        StockOpname::create($request->all());
        return redirect('/stockopname')->with('sukses', 'Data Berhasil Di Input!');
    }
}
