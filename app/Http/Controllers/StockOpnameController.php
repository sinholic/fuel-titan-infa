<?php

namespace App\Http\Controllers;

use App\StockOpname;
use App\Materialtransaction;
use App\FixStationModel;
use App\Companycode;
use Illuminate\Http\Request;
use App\InventoriModel;

class StockOpnameController extends Controller
{
    public function stockopname()
    {
        $stockopname = \DB::select("SELECT * FROM (
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN reloadingunits r1 ON mt.transaction_id = r1.id AND origin = 'Mobile' AND mt.transaction_code = '01'
            JOIN mobile_station ms ON r1.station_id = ms.id
            JOIN fix_station fs ON ms.fixstation_id = fs.id
            JOIN companycodes cc ON fs.companycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN reloadingunits r2 ON mt.transaction_id = r2.id AND origin = 'Fix Station' AND mt.transaction_code = '02'
            JOIN fix_station fs ON r2.station_id = fs.id
            JOIN companycodes cc ON fs.companycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN userhe r3 ON mt.transaction_id = r3.id AND mt.transaction_code = '03'
            JOIN equipment_unitdata eu ON r3.equipment_id = eu.id
            JOIN companycodes cc ON eu.companycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN reloading r4 ON mt.transaction_id = r4.id AND mt.transaction_code = '04'
            JOIN fix_station fs ON r4.fixstation_id = fs.id
            JOIN companycodes cc ON fs.companycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN penerimaan r5 ON mt.transaction_id = r5.id AND mt.transaction_code = '05'
            JOIN fix_station fs ON r5.fixstation_id = fs.id
            JOIN companycodes cc ON fs.companycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN piutang r6 ON mt.transaction_id = r6.id AND mt.transaction_code = '06'
            JOIN fix_station fs ON r6.fixstation_id = fs.id
            JOIN companycodes cc ON fs.companycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN pengambilan r7 ON mt.transaction_id = r7.id AND mt.transaction_code = '07'
            JOIN pengajuan_hutang ph ON r7.credit_id = ph.id
            JOIN companycodes cc ON ph.borcompanycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN pengembalian r8 ON mt.transaction_id = r8.id AND mt.transaction_code = '08'
            JOIN pengajuan_hutang ph ON r8.credit_id = ph.id
            JOIN companycodes cc ON ph.borcompanycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN consignments r9 ON mt.transaction_id = r9.id AND mt.transaction_code = '09'
            JOIN fix_station fs ON r9.fixstation_id = fs.id
            JOIN companycodes cc ON fs.companycode_id = cc.id
            ) as unions 
            WHERE companycodeid = ?
            AND DATE(created_at) = ?
        ", [\Auth::user()->companycode_id, \Carbon\Carbon::yesterday()->toDateString()]);
        // dd($stockopname);
        // Materialtransaction::whereDate('created_at', \Carbon\Carbon::yesterday()->toDateString())->get();
        return view('StockOpname.stockopname', ['stockopname' => $stockopname]);
    }

    public function stockopnameByDate(Request $request)
    {
        $submit_date = $request->submit_date;
        $stockopname = \DB::select("SELECT * FROM (
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN reloadingunits r1 ON mt.transaction_id = r1.id AND origin = 'Mobile' AND mt.transaction_code = '01'
            JOIN mobile_station ms ON r1.station_id = ms.id
            JOIN fix_station fs ON ms.fixstation_id = fs.id
            JOIN companycodes cc ON fs.companycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN reloadingunits r2 ON mt.transaction_id = r2.id AND origin = 'Fix Station' AND mt.transaction_code = '02'
            JOIN fix_station fs ON r2.station_id = fs.id
            JOIN companycodes cc ON fs.companycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN userhe r3 ON mt.transaction_id = r3.id AND mt.transaction_code = '03'
            JOIN equipment_unitdata eu ON r3.equipment_id = eu.id
            JOIN companycodes cc ON eu.companycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN reloading r4 ON mt.transaction_id = r4.id AND mt.transaction_code = '04'
            JOIN fix_station fs ON r4.fixstation_id = fs.id
            JOIN companycodes cc ON fs.companycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN penerimaan r5 ON mt.transaction_id = r5.id AND mt.transaction_code = '05'
            JOIN fix_station fs ON r5.fixstation_id = fs.id
            JOIN companycodes cc ON fs.companycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN piutang r6 ON mt.transaction_id = r6.id AND mt.transaction_code = '06'
            JOIN fix_station fs ON r6.fixstation_id = fs.id
            JOIN companycodes cc ON fs.companycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN pengambilan r7 ON mt.transaction_id = r7.id AND mt.transaction_code = '07'
            JOIN pengajuan_hutang ph ON r7.credit_id = ph.id
            JOIN companycodes cc ON ph.borcompanycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN pengembalian r8 ON mt.transaction_id = r8.id AND mt.transaction_code = '08'
            JOIN pengajuan_hutang ph ON r8.credit_id = ph.id
            JOIN companycodes cc ON ph.borcompanycode_id = cc.id
            UNION
            SELECT cc.id as companycodeid, company_name, mt.qty, mt.transaction_type, mt.transaction_code, mt.created_at FROM `materialtransactions` mt
            JOIN consignments r9 ON mt.transaction_id = r9.id AND mt.transaction_code = '09'
            JOIN fix_station fs ON r9.fixstation_id = fs.id
            JOIN companycodes cc ON fs.companycode_id = cc.id
            ) as unions 
            WHERE companycodeid = ?
            AND DATE(created_at) = ?
        ", [\Auth::user()->companycode_id, $submit_date]);
        // dd($stockopname);
        // $stockopname = Materialtransaction::whereDate('created_at', $request->submit_date)->get();
        return view('StockOpname.stockopname', [
            'stockopname' => $stockopname,
            'submit_date' => $submit_date
        ]);
    }

    public function tambah()
    {
        $company = Companycode::all();
        $fixstation = FixStationModel::all();
        $fix = InventoriModel::all();
        // return $fix;
        return view('StockOpname.tambah_stockopname',['company' => $company,'fixstation' => $fix]);
    }

    public function create(Request $request)
    {
        // StockOpname::create($request->all());
        $inv = InventoriModel::where('fix_id','=',$request->fixstation_id)->first();
        $st = new StockOpname;
        $st->fixstation_id = $request->fixstation_id;
        $st->qty = $request->qty;
        $st->tanggal_pengukuran = $request->tanggal_pengukuran;
        if($inv != null){
            $st->saldo_akhir = $inv->saldo_akhir;
            $st->selisih = $request->qty - $inv->saldo_akhir;
        }
        $st->save();
        return redirect('/stockopname')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function stockopname1(){
        $stockopname = StockOpname::all();
        return view('StockOpname.stockopname', ['stockopname' => $stockopname]);
    }
    public function edit($id){
        $st = StockOpname::find($id);
        return view('StockOpname.edit_stokopname',['datastock'=>$st]);
    }
    public function update(Request $request, $id){
        $st = StockOpname::find($id);
        $st->qty = $request->qty;
        $st->update();
        return redirect('/stockopname');
    }
}
