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
        $fixstations = FixStationModel::groupBy('name_station')->pluck('name_station', 'id');
        $mobilestations = MobileModel::select(\DB::raw('CONCAT(equipment_number, " - ", equipment_name) as name'),'mobile_station.id')
        ->join('equipment_unitdata', 'equipment_id', '=', 'equipment_unitdata.id')
        ->pluck('name', 'id');

        return view('User Assignment.tambah_assignment', [
            'users' => $users,
            'fixstations' => $fixstations,
            'mobilestations' => $mobilestations,
        ]);
    }

    public function index()
    {
        // \DB::enableQueryLog();
        $user = User::with('fixassignments','mobileassignments')
            ->whereHas('fixassignments', function ($q) {
                $q->where('start_date', '<=', \Carbon\Carbon::now()->toDateString())
                    ->whereDate('end_date', '>=', \Carbon\Carbon::now()->toDateString());
            })
            ->orWhereHas('mobileassignments', function ($q) {
                $q->where('start_date', '<=', \Carbon\Carbon::now()->toDateString())
                    ->whereDate('end_date', '>=', \Carbon\Carbon::now()->toDateString());
            })
            ->get();
        // foreach ($user as $key => $value) {
        //     if ($value->mobileassignments->last() != NULL) {
        //         foreach ($value->mobileassignments as $value2) {
        //             print_r($value2->pivot->start_date);
        //             $value2->pivot->mobile;
        //         }
        //         print_r($value->mobileassignments->last()->pivot->start_date);
        //     }else{
        //         print_r($value->fixassignments->first()->name_station);
        //     }
        // }
        // dd($user);
        // dd(\DB::getQueryLog());
        return view('User Assignment.assignment', ['user' => $user]);
    }

    public function create(Request $request)
    {
        // dd($request);
        if ($request->mobile == 1) {
            User::find($request->user_id)->mobileassignments()->attach([
                $request->station_id => [
                    'mobile' => $request->mobile,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date
                ]
            ]);
        }else {
            User::find($request->user_id)->fixassignments()->attach([
                $request->station_id => [
                    'mobile' => $request->mobile,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date
                ]
            ]);
        }

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
