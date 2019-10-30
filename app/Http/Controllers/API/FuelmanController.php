<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\FuelmanModel;
use App\Http\Controllers\Controller;

class FuelmanController extends Controller
{
    public function lists()
    {
        $fuelman = FuelmanModel::all();
        return response()->json(['data' => $fuelman]);
    }

    public function create(Request $request)
    {
        FuelmanModel::create($request->all());
        return redirect('/fuelman')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function update(Request $request, $id)
    {
        $fuelman = FuelmanModel::find($id);
        $fuelman->update($request->all());
        return redirect('/fuelman')->with('sukses', 'Data Berhasil Di Update!');
    }
}
