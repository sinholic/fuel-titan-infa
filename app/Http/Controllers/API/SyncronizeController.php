<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EquipmentModel;
use App\FuelmanModel;

class SyncronizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = EquipmentModel::all(); // No get()!
        $sql = $equipments->map(function ($item, $key){
            return implode($item->toArray(), ',');
        });

        $data['sql'] = 'INSERT INTO equipment_unitdata VALUES('. implode($sql->toArray(), '),(') .');' ;

        $equipments = FuelmanModel::all(); // No get()!
        $sql = $equipments->map(function ($item, $key){
            return implode($item->toArray(), ',');
        });

        $data['sql'] .= 'INSERT INTO fuelman VALUES('. implode($sql->toArray(), '),(') .');' ;

        return response()->json([
                'success' => true,
                'data' => $data
            ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
