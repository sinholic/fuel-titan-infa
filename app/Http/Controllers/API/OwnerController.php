<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OwnerModel;


class OwnerController extends Controller
{
    public function lists()
    {
        $owner = OwnerModel::all();
        return response()->json(['data' => $owner]);
    }

    public function create(Request $request)
    {
        OwnerModel::create($request->all());
        return redirect('/owner')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function update(Request $request, $id)
    {
        $owner = OwnerModel::find($id);
        $owner->update($request->all());
        return redirect('/owner')->with('sukses', 'Data Berhasil Di Update!');
    }
}
