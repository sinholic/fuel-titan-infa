<?php

namespace App\Http\Controllers;

use App\Companycode;
use Illuminate\Http\Request;

class CompanycodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companycode = Companycode::all();
        return view('Company Code.company_code', ['companycode' => $companycode]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        return view('Company Code.tambah_company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'unique:companycodes',
            'company_inisial' => 'unique:companycodes',
        ]);
        Companycode::create($request->all());
        return redirect('/companycode')->with('sukses', 'Data Berhasil Di Input!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companycode  $companycode
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companycode = Companycode::find($id);
        return view('Company Code.edit_companycode', ['companycode' => $companycode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companycode  $companycode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $companycode = Companycode::find($id);
        $companycode->update($request->all());
        return redirect('/companycode')->with('sukses', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companycode  $companycode
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $companycode = Companycode::find($id);
        $companycode->delete($companycode);
        return redirect('/companycode')->with('sukses', 'Data berhasil dihapus!');
    }
}
