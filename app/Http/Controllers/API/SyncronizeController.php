<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EquipmentModel;
use App\FuelmanModel;
use App\VoucherModel;
use App\FixStationModel;
use App\MobileModel;
use App\OwnerModel;
use App\OrganizationModel;
use App\UserLVModel;

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
        $sql = $equipments->map(function ($item, $key) {
            return join(",'", $item->toArray()) . "'";
        });

        // dd($sql);

        $data['sql'] = str_replace("')'", "')", str_replace(",", "',", "INSERT INTO equipment_unitdata VALUES('" . join("),('", $sql->toArray()) . ");"));

        //$data['sql'] = str_replace($data['sql'], ",", "',");

        $fuelmans = FuelmanModel::all(); // No get()!
        $sql = $fuelmans->map(function ($item, $key) {
            //return implode(",", $item->toArray());
            return join(",'", $item->toArray()) . "'";
        });

        //$data['sql'] .= 'INSERT INTO fuelman VALUES(' . implode('),(', $sql->toArray()) . ');';
        $data['sql'] .= str_replace(",'',''", "", str_replace("')'", "')", str_replace(",", "',", "INSERT INTO fuelman VALUES('" . join("),('", $sql->toArray()) . ");")));

        //Vocher
        $vouchers = VoucherModel::all(); // No get()!
        $sql = $vouchers->map(function ($item, $key) {
            //return implode(",", $item->toArray());
            return join(",'", $item->toArray()) . "'";
        });
        $data['sql'] .= str_replace("')'", "')", str_replace(",", "',", "INSERT INTO voucher VALUES('" . join("),('", $sql->toArray()) . ");"));


        //Fix Station
        $fix = FixStationModel::all();
        $sql = $fix->map(function ($item, $key) {
            return join(",'", $item->toArray()) . "'";
        });
        $data['sql'] .= str_replace("')'", "')", str_replace(",", "',", "INSERT INTO fix_station VALUES('" . join("),('", $sql->toArray()) . ");"));

        //Mobile Station
        $mobile = MobileModel::all();
        $sql = $mobile->map(function ($item, $key) {
            return join(",'", $item->toArray()) . "'";
        });
        $data['sql'] .= str_replace("')'", "')", str_replace(",", "',", "INSERT INTO mobile_station VALUES('" . join("),('", $sql->toArray()) . ");"));

        //Owner
        $owner = OwnerModel::all();
        $sql = $owner->map(function ($item, $key) {
            return join(",'", $item->toArray()) . "'";
        });
        $data['sql'] .= str_replace("')'", "')", str_replace(",", "',", "INSERT INTO owner VALUES('" . join("),('", $sql->toArray()) . ");"));

        //User HE
        $userHe = OrganizationModel::all();
        $sql = $userHe->map(function ($item, $key) {
            return join(",'", $item->toArray()) . "'";
        });
        $data['sql'] .= str_replace("')'", "')", str_replace(",", "',", "INSERT INTO organization VALUES('" . join("),('", $sql->toArray()) . ");"));

        //User LV
        $userLV = UserLVModel::all();
        $sql = $userLV->map(function ($item, $key) {
            return join(",'", $item->toArray()) . "'";
        });
        $data['sql'] .= str_replace("')'", "')", str_replace(",", "',", "INSERT INTO userlv VALUES('" . join("),('", $sql->toArray()) . ");"));

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
