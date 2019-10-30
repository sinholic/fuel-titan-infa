<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\EquipmentModel;
use App\FuelmanModel;
use App\VoucherModel;

class SyncronizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['message'] = "Syncronize succeccfully";
        
        if(!Auth::user()) {
            $data['message'] = "No user detected, are you try to hack?";
            return response()->json([
                'success' => false,
                'data' => $data
            ], 200);
        }

        if(Auth::user()->syncpassword != request('syncpassword')) {
            $data['message'] = "Are you forgot your sync password?";
            return response()->json([
                'success' => false,
                'data' => $data
            ], 200);
        }

        $equipments = EquipmentModel::all(); // No get()!
        $sql = $equipments->map(function ($item, $key) {
            return implode(",", $item->toArray());
        });

        // dd($sql);

        $data['sql'] = 'INSERT INTO equipment_unitdata VALUES(' . implode('),(', $sql->toArray()) . ');';

        $fuelmans = FuelmanModel::all(); // No get()!
        $sql = $fuelmans->map(function ($item, $key) {
            return implode(",", $item->toArray());
        });

        $data['sql'] .= 'INSERT INTO fuelman VALUES(' . implode('),(', $sql->toArray()) . ');';

        //Vocher
        $vouchers = VoucherModel::all(); // No get()!
        $sql = $vouchers->map(function ($item, $key) {
            return implode(",", $item->toArray());
        });

        $data['sql'] .= 'INSERT INTO voucher VALUES(' . implode('),(',$sql->toArray()) . ');';

        // $data['sql'] = $sql;

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
