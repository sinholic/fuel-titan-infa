<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OwnerModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\OwnerExport;


class OwnerController extends Controller
{
    public function tambah()
    {
        return view('Owner.tambah_owner');
    }

    public function owner()
    {
        $owner = OwnerModel::all();
        return view('Owner.owner', ['owner' => $owner]);
    }

    public function create(Request $request)
    {
        OwnerModel::create($request->all());
        return redirect('/owner')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $owner = OwnerModel::find($id);
        return view('Owner.edit_owner', ['owner' => $owner]);
    }

    public function update(Request $request, $id)
    {
        $owner = OwnerModel::find($id);
        $owner->update($request->all());
        return redirect('/owner')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $owner = OwnerModel::find($id);
        $owner->delete($owner);
        return redirect('/owner')->with('sukses', 'Data berhasil dihapus!');
    }

    public function export_excel()
    {
        return Excel::download(new OwnerExport, 'master_owner_data.xlsx');
    }

    public function print(Request $request)
    {
        $owners = OwnerModel::all();
        // dd($Equipment->Equipmentowner);
        return view('Owner.print_qr', ['owners' => $owners]);
    }

    public function detail($id)
    {
        $owner = OwnerModel::find($id);
        return view('Owner.detail_owner', ['owner' => $owner]);
    }
}
