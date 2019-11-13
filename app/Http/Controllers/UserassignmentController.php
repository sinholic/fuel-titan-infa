<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\FixStationModel;
use App\Status;

class UserassignmentController extends Controller
{
    public function tambah()
    {
        $users = User::pluck('name', 'id');
        return view('User Assignment.tambah_assignment', ['users' => $users]);
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
        $datas = $request->all();
        $datas['companycode_id'] = \Auth::user()->companycode_id;
        User::create($datas);
        return redirect('/userassign')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $statuses = Status::pluck('nama', 'id');
        return view('User Assignment.edit_assignment', ['user' => $user, 'statuses' => $statuses]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return redirect('/userassign')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete($user);
        return redirect('/userassign')->with('sukses', 'Data berhasil dihapus!');
    }
}
