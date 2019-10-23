<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserLVModel;
use App\Http\Controllers\Controller;
use App\Exports\UserLvExport;
use Maatwebsite\Excel\Facades\Excel;

class UserLVController extends Controller
{
    public function userlv()
    {
        $userlv = UserLVModel::all();
        return view('User LV.user_lv', ['userlv' => $userlv]);
    }

    public function tambah()
    {
        return view('User LV.tambah_userlv');
    }

    public function create(Request $request)
    {
        UserLVModel::create($request->all());
        return redirect('/userlv')->with('sukses', 'Data Berhasil di Input!');
    }

    public function edit($id)
    {
        $userlv = UserLVModel::find($id);
        return view('User LV.edit_userlv', ['userlv' => $userlv]);
    }

    public function update(Request $request, $id)
    {
        $userlv = UserLVModel::find($id);
        $userlv->update($request->all());
        return redirect('/userlv')->with('sukses', 'Data berhasil di update!');
    }

    public function delete($id)
    {
        $userlv = UserLVModel::find($id);
        $userlv->delete($userlv);
        return redirect('/userlv')->with('sukses', 'Data berhasil dihapus!');
    }

    public function export_excel()
    {
        return Excel::download(new UserLvExport, 'master_user_lv.xlsx');
    }
}
