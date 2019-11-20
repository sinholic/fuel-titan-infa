<?php

namespace App\Http\Controllers;

use App\QtySolarModel;
use Illuminate\Http\Request;

class QtySolarController extends Controller
{
    public function qty_solar()
    {
        $qty_solar = QtySolarModel::all();
        return view('Qty Solar.qty_solar', ['qty_solar' => $qty_solar]);
    }

    public function tambah()
    {
        return view('Qty Solar.tambah_qtysolar');
    }

    public function create(Request $request)
    {
        $messages = [
            'unique' => 'Varian jumlah solar sudah ada!',
        ];
        $this->validate($request, [
            'qty_solar' => 'unique:qty_solar'
        ], $messages);

        QtySolarModel::create($request->all());
        return redirect('/qty_solar')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $qty_solar = QtySolarModel::find($id);
        return view('Qty Solar.edit_qtysolar', ['qty_solar' => $qty_solar]);
    }

    public function update(Request $request, $id)
    {
        $qty_solar = QtySolarModel::find($id);
        $qty_solar->update($request->all());
        return redirect('/qty_solar')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $qty_solar = QtySolarModel::find($id);
        $qty_solar->delete($qty_solar);
        return redirect('/qty_solar')->with('sukses', 'Data berhasil dihapus!');
    }
}
