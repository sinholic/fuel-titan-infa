<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consignment;

class ConsignmentController extends Controller
{
    public function consignment()
    {
        $consignment = Consignment::all();
        return view('Consignment.consignment', ['consignment' => $consignment]);
    }

    public function tambah()
    {
        return view('Consignment.tambah_consignment');
    }

    public function create(Request $request)
    {
        Consignment::create($request->all());
        return redirect('/consignment')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $consignment = Consignment::find($id);
        return view('Consignment.edit_consignment', ['consignment' => $consignment]);
    }

    public function update(Request $request, $id)
    {
        $consignment = Consignment::find($id);
        $consignment->update($request->all());
        return redirect('/consignment')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $consignment = Consignment::find($id);
        $consignment->delete($consignment);
        return redirect('/consignment')->with('sukses', 'Data berhasil dihapus!');
    }
}
