<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Status;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function tambah()
    {
        $statuses = Status::pluck('nama', 'id');
        return view('User.tambah_user', ['statuses' => $statuses]);
    }

    public function user()
    {
        $user = User::where('companycode_id', \Auth::user()->companycode_id)->get();
        return view('User.user', ['user' => $user]);
    }

    public function create(Request $request)
    {
        $datas = $request->all();
        $datas['companycode_id'] = \Auth::user()->companycode_id;
        User::create($datas);
        return redirect('/user')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $statuses = Status::pluck('nama', 'id');
        return view('User.edit_user', ['user' => $user, 'statuses' => $statuses]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return redirect('/user')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete($user);
        return redirect('/user')->with('sukses', 'Data berhasil dihapus!');
    }
}
