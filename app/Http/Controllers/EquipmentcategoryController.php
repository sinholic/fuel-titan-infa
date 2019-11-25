<?php

namespace App\Http\Controllers;

use App\Equipmentcategory;
use App\Uploadedfile;
use Illuminate\Http\Request;
use App\Imports\EquipmentCategoryImport;

class EquipmentcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipment_category = Equipmentcategory::all();
        return view('Equipment Category.equipment_category', ['equipment_category' => $equipment_category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        return view('Equipment Category.addequipment_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'unique:equipmentcategories',
            'inisial' => 'unique:equipmentcategories',
        ]);

        Equipmentcategory::create($request->all());
        return redirect('/equipment_category')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $equipment_category = Equipmentcategory::find($id);
        return view('Equipment Category.edit_equipment_category', ['equipment_category' => $equipment_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipmentcategory  $equipmentcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $equipment_category = Equipmentcategory::find($id);
        $equipment_category->update($request->all());
        return redirect('/equipment_category')->with('sukses', 'Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipmentcategory  $equipmentcategory
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $equipment_category = Equipmentcategory::find($id);
        $equipment_category->delete($equipment_category);
        return redirect('/equipment_category')->with('sukses', 'Data berhasil dihapus!');
    }

    public function import_excel(Request $request)
    {
        //validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $fileExtension = $request->file('file');

        $file = $request->file('file')->storeAs(
            'equipmentcategories',
            \Auth::user()->id . "-" . \Carbon\Carbon::now()->timestamp . "." . $fileExtension->clientExtension()
        );

        $upload_file = Uploadedfile::create([
            'uplodedpath' => $file,
            'uploaded' => 1
        ])->id;

        //import data
        \Excel::import(new EquipmentCategoryImport, storage_path('app/') . $file);

        // Uploadedfile::find($upload_file)->update([
        //     'processed' => 1
        // ]);

        //notifikasi dengan session
        \Session::flash('sukses', 'Data Equipment Category Berhasil Di Import!');

        //alihkan kembali
        return redirect('/equipment_category');
    }
}
