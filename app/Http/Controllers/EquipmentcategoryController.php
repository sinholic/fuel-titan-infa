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
        $equipmentcategories = Equipmentcategory::all();
        return view('Equipmentcategory.equipmentcategory', ['equipmentcategories' => $equipmentcategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Equipmentcategory.tambah_equipmentcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Equipmentcategory::create($reloading_units);
        
        return redirect()->route('equipmentcategory.index')->with('sukses', 'Data Berhasil di Input!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipmentcategory  $equipmentcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Equipmentcategory $equipmentcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipmentcategory  $equipmentcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipmentcategory $equipmentcategory)
    {
        $equipmentcategory = Equipmentcategory::find($equipmentcategory->id);
        return view('Equipmentcategory.edit_equipmentcategory');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipmentcategory  $equipmentcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipmentcategory $equipmentcategory)
    {
        $equipmentcategory = Equipmentcategory::find($equipmentcategory->id);
        $equipmentcategory->update($request->all());
        return redirect()->route('equipmentcategory.index')->with('sukses', 'Data berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipmentcategory  $equipmentcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipmentcategory $equipmentcategory)
    {
        $equipmentcategory = Equipmentcategory::find($id);
        $equipmentcategory->delete($equipmentcategory);
        return redirect()->route('equipmentcategory.index')->with('sukses', 'Data berhasil dihapus!');
    }
}
