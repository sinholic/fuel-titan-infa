<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FixStationModel;

class FixStationController extends Controller
{
    public function fix()
    {
        $fix = FixStationModel::all();
        return view('Fix Station.fix_station', ['fix' => $fix]);
    }

    public function create(Request $request)
    {
        FixStationModel::create($request->all());
        return redirect('/fix')->with('sukses', 'Data Berhasil Di Input!');
    }
}
