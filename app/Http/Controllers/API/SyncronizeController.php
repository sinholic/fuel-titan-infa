<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\EquipmentModel;
use App\VoucherModel;
use App\Vouchercode;
use App\FixStationModel;
use App\MobileModel;
use App\OwnerModel;
use App\User;
use App\QtySolarModel;

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

        if (request()->method() == "POST") {
            if (!Auth::user()) {
                $data['message'] = "No user detected, are you try to hack?";
                return response()->json([
                    'success' => false,
                    'data' => $data
                ], 200);
            }

            if (Auth::user()->syncpassword != request('syncpassword')) {
                $data['message'] = "Are you forgot your sync password?";
                return response()->json([
                    'success' => false,
                    'data' => $data
                ], 200);
            }
        }

        $equipments = EquipmentModel::all(); // No get()!
        $sql = $equipments->map(function ($item, $key) {
            return join(",'", $item->toArray()) . "'";
        });

        // dd($sql);

        $data['sql'] = str_replace("')'", "')", str_replace(",", "',", "INSERT INTO equipment_unitdata VALUES('" . join("),('", $sql->toArray()) . ");"));
        //$data['sql'] = str_replace($data['sql'], ",", "',");

        //Vocher
        $vouchers = VoucherModel::all(); // No get()!
        $sql = $vouchers->map(function ($item, $key) {
            //return implode(",", $item->toArray());
            return join(",'", $item->toArray()) . "'";
        });
        $data['sql'] .= str_replace("')'", "')", str_replace(",", "',", "INSERT INTO voucher VALUES('" . join("),('", $sql->toArray()) . ");"));

        //Vochercode
        $vouchercoodes = Vouchercode::all(); // No get()!
        $sql = $vouchercoodes->map(function ($item, $key) {
            //return implode(",", $item->toArray());
            return join(",'", $item->toArray()) . "'";
        });
        $data['sql'] .= str_replace("')'", "')", str_replace(",", "',", "INSERT INTO vouchercodes VALUES('" . join("),('", $sql->toArray()) . ");"));


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
        $userHe = User::all();
        $sql = $userHe->map(function ($item, $key) {
            return join(",'", $item->toArray()) . "'";
        });
        $data['sql'] .= str_replace("')'", "')", str_replace(",", "',", "INSERT INTO users VALUES('" . join("),('", $sql->toArray()) . ");"));

        //Qty Solar
        $qtysolar = QtySolarModel::select('id', 'qty_solar', 'created_at', 'updated_at')->get();
        $sql = $qtysolar->map(function ($item, $key) {
            return join(",'", $item->toArray()) . "'";
        });
        $data['sql'] .= str_replace("')'", "')", str_replace(",", "',", "INSERT INTO qty_solar ('id, 'qty_solar, 'created_at, 'updated_at') VALUES('" . join("),('", $sql->toArray()) . ");"));

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function upload(Request $request)
    {
        $data['message'] = "Syncronize succeccfully";

        if (request()->method() == "POST") {
            if (!Auth::user()) {
                $data['message'] = "No user detected, are you try to hack?";
                return response()->json([
                    'success' => false,
                    'data' => $data
                ], 200);
            }

            if (Auth::user()->syncpassword != request('syncpassword')) {
                $data['message'] = "Are you forgot your sync password?";
                return response()->json([
                    'success' => false,
                    'data' => $data
                ], 200);
            }
        }

        $file = $request->file('filesql')->storeAs(
            'sqlfiles',
            Auth::user()->id . "-" . \Carbon\Carbon::now()->timestamp . ".sql"
        );

        // dd(storage_path('app/filesql')."/7-1573198561.sql");

        \Artisan::call('import:sqlfile', [
            'sqlfile' => storage_path('app/') . $file
        ]);

        if ($file) {
            $data['filepath'] = $file;
            return response()->json([
                'success' => true,
                'data' => $data
            ], 200);
        }
        return response()->json([
            'success' => false,
            'data' => $data
        ], 200);
    }

    public function exec_bg($cmd)
    {
        if (substr(php_uname(), 0, 7) == "Windows") {
            pclose(popen("start /B " . $cmd, "r"));
        } else {
            exec($cmd . " > /dev/null &");
        }
    }
}
