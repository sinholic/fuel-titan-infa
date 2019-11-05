<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserheModel;

class UserheController extends Controller
{
    public function userhe()
    {
        $userhe = UserheModel::all();
        return view('User He.userhe', ['userhe' => $userhe]);
    }

    public function tambah()
    {
        return view('User HE.tambah_userhe');
    }

    public function create(Request $request)
    {
        UserheModel::create($request->all());
        return redirect('/userhe')->with('sukses', 'Data berhasil diinput!');
    }
}
