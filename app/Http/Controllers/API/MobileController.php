<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MobileModel;

class MobileController extends Controller
{
    public function mobile()
    {
        $mobile = MobileModel::all();
        return response()->json(['data' => $mobile]);
    }

    public function create(Request $request)
    {
        MobileModel::create($request->all());
        return redirect('/mobile')->with('sukses', 'Data berhasil di Input!');
    }

    public function update(Request $request, $id)
    {
        $mobile = MobileModel::find($id);
        $mobile->update($request->all());
        return redirect('/mobile')->with('sukses', 'Data berhasil di Update!');
    }

    public function delete($id)
    {
        $mobile = MobileModel::find($id);
        $mobile->delete($mobile);
        return redirect('/mobile')->with('sukses', 'Data berhasil dihapus!');
    }
}
