<?php

namespace App\Http\Controllers;

use App\Equipmentcategory;
use Illuminate\Http\Request;

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
    public function destroy($id)
    {
        $equipment_category = Equipmentcategory::find($id);
        $equipment_category->delete($equipment_category);
        return redirect('/equipment_category')->with('sukses', 'Data berhasil dihapus!');
    }
}
