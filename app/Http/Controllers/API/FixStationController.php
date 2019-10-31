<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\FixStationModel;

class FixStationController extends Controller
{
    public function lists()
    {
        $fix = FixStationModel::all();
        return response()->json(['data' => $fix]);
    }

    public function create(Request $request)
    {
        FixStationModel::create($request->all());
        return redirect('/fix')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function update(Request $request, $id)
    {
        $fix = FixStationModel::find($id);
        $fix->update($request->all());
        return redirect('/fix')->with('sukses', 'Data Berhasil Di Update!');
    }
}
