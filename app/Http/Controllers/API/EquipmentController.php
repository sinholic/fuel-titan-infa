<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\EquipmentModel;

class EquipmentController extends Controller
{
    public function lists()
    {
        $equipments = EquipmentModel::all();
        //  status => 200
        //  message => Data sucessfully fetched
        //  count => (jumlah data pakai count di php)
        return response()->json([
            'status' => true,
            'data' => $equipments,
            'count' => count($equipments)
        ]);
    }

    public function create(Request $request)
    {
        $equipment = EquipmentModel::create($request->all());
        return response()->json([
            'status' => true,
            'data' => $equipment
        ]);
    }

    public function update(Request $request, $id)
    {
        $equipment = EquipmentModel::find($id);
        $equipment->update($request->all());
        return response()->json([
            'status' => true,
            'data' => $equipment
        ]);
    }
}
