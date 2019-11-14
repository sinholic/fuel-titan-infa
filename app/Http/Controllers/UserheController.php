<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserheModel;

class UserheController extends Controller
{
    public function userhe()
    {
        $userhe = UserheModel::all();
        return view('User HE.userhe', ['userhe' => $userhe]);
    }

    public function tambah()
    {
        return view('User HE.tambah_userhe');
    }

    public function create(Request $request)
    {
        $messages = [
            'required' => 'Tidak boleh mengisi tanggal kemarin',
        ];

        $this->validate($request, [
            'tanggal_operasi' => 'required|date|after_or_equal:start_date'
        ], $messages);

        UserheModel::create($request->all());
        return redirect('/userhe')->with('sukses', 'Data berhasil diinput!');
    }

    public function edit($id)
    {
        $userhe = UserheModel::find($id);
        return view('User HE.edit_userhe', ['userhe' => $userhe]);
    }

    public function update(Request $request, $id)
    {
        $userhe = UserheModel::find($id);
        $userhe->update($request->all());
        return redirect('/userhe')->with('sukses', 'Data berhasil di Update');
    }

    public function delete($id)
    {
        $userhe = UserheModel::find($id);
        $userhe->delete($userhe);
        return redirect('/userhe')->with('sukses', 'Data berhasil dihapus');
    }
}
