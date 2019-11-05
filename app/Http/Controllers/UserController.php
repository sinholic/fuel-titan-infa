<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;

class UserController extends Controller
{
    public function tambah()
    {
        return view('User.tambah_user');
    }

    public function user()
    {
        $user = UserModel::all();
        return view('User.user', ['user' => $user]);
    }

    public function create(Request $request)
    {
        UserModel::create($request->all());
        return redirect('/user')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $user = UserModel::find($id);
        return view('User.edit_user', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::find($id);
        $user->update($request->all());
        return redirect('/user')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $user = UserModel::find($id);
        $user->delete($user);
        return redirect('/user')->with('sukses', 'Data berhasil dihapus!');
    }
}
