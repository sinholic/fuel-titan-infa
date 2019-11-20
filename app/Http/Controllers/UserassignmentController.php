<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\FixStationModel;
use App\MobileModel;
use App\Status;

class UserassignmentController extends Controller
{
    public function tambah()
    {
        $users = User::pluck('name', 'id');
        $fixstations = FixStationModel::pluck('name_station', 'id');
        $mobilestation = MobileModel::select(\DB::raw('CONCAT(equipment_number, " - ", equipment_name) as name'),'mobile_station.id')
        ->join('equipment_unitdata', 'equipment_id', '=', 'equipment_unitdata.id')
        ->pluck('name', 'id');

        return view('User Assignment.tambah_assignment', [
            'users' => $users,
            'fixstations' => $fixstations,
        ]);
    }

    public function index()
    {
        // \DB::enableQueryLog();
        $user = User::where('companycode_id', \Auth::user()->companycode_id)
            ->with('assignments')
            ->whereHas('assignments', function ($q) {
                $q->where('start_date', '<=', \Carbon\Carbon::now()->toDateString())
                    ->whereDate('end_date', '>=', \Carbon\Carbon::now()->toDateString());
            })
            ->get();
        // dd(\DB::getQueryLog());
        return view('User Assignment.assignment', ['user' => $user]);
    }

    public function create(Request $request)
    {

        return redirect('/userassign')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        return view('User Assignment.edit_assignment', ['user' => $user, 'statuses' => $statuses]);
    }

    public function update(Request $request, $id)
    {
        return redirect('/userassign')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        return redirect('/userassign')->with('sukses', 'Data berhasil dihapus!');
    }
}
