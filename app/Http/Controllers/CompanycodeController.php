<?php

namespace App\Http\Controllers;

use App\Companycode;
use Illuminate\Http\Request;
use App\Uploadedfile;
use App\Imports\CompanyCodesImport;

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

    public function import_excel(Request $request)
    {
        //validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $fileExtension = $request->file('file');

        $file = $request->file('file')->storeAs(
            'companycodes',
            \Auth::user()->id . "-" . \Carbon\Carbon::now()->timestamp . "." . $fileExtension->clientExtension()
        );

        $upload_file = Uploadedfile::create([
            'uplodedpath' => $file,
            'uploaded' => 1
        ])->id;

        //menangkap file excel
        // $file = $request->file('file');

        //membuat nama file unik
        // $nama_file = rand() . $file->getClientOriginalName();

        //upload ke folder file_station di dalam folder public
        // $file->move('file_station', $nama_file);

        //import data
        \Excel::import(new CompanyCodesImport, storage_path('app/') . $file);

        Uploadedfile::find($upload_file)->update([
            'processed' => 1
        ]);

        //notifikasi dengan session
        \Session::flash('sukses', 'Data Company Codes Berhasil Di Import!');

        //alihkan kembali
        return redirect('/companycode');
    }
}
