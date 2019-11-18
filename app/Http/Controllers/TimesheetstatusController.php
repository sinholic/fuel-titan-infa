<?php

namespace App\Http\Controllers;

use App\Timesheetstatus;
use Illuminate\Http\Request;

class TimesheetstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Timesheetstatus::all();
        return view('Timesheetstatus.timesheetstatus', ['status' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        return view('Timesheetstatus.tambah_timesheetstatus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Timesheetstatus::create($request->all());
        return redirect('/timesheetstatus')->with('sukses', 'Data Berhasil Di Input!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = Timesheetstatus::find($id);
        return view('Timesheetstatus.edit_timesheetstatus', ['status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status = Timesheetstatus::find($id);
        $status->update($request->all());
        return redirect('/timesheetstatus')->with('sukses', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $status = Timesheetstatus::find($id);
        $status->delete($status);
        return redirect('/timesheetstatus')->with('sukses', 'Data berhasil dihapus!');
    }
}
