<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StockglobalModel;
use App\StockOpname;
use App\InventoriModel;



class StockGlobalController extends Controller
{
    //
    public function stockglobal(){
        // $this->validate($request,[
        //     'kode_barang'=>['required', 'unique:stockopnameglobal,kode_barang'],
        // ]); 
        $stokfisik = StockOpname::all()->sum('qty');
        $inv = InventoriModel::all()->where('kode_barang','=','1')->first();
        $saldoakhir = $inv->saldo_akhir;
        $stkmodel = StockglobalModel::all()->where('kode_barang','=','1')->first();
        if ($stkmodel == null){
            $stkglobalnew = new StockglobalModel;
            $stkglobalnew->kode_barang = '1';
            $stkglobalnew->saldo_akhir = $saldoakhir;
            $stkglobalnew->saldo_fisik = $stokfisik;
            $stkglobalnew->selisih = $stokfisik - $saldoakhir;
            $stkglobalnew->save();
        }else if ($stkmodel != null){
            $stkglobalnew = StockglobalModel::all()->first();
            $stkglobalnew->kode_barang = '1';
            $stkglobalnew->saldo_akhir = $saldoakhir;
            $stkglobalnew->saldo_fisik = $stokfisik;
            $stkglobalnew->selisih = $stokfisik - $saldoakhir;
            $stkglobalnew->update();
        }
        else if ($stkmodel->kode_barang != '1'){
            $stkglobalnew = new StockglobalModel;
            $stkglobalnew->kode_barang = '1';
            $stkglobalnew->saldo_akhir = $saldoakhir;
            $stkglobalnew->saldo_fisik = $stokfisik;
            $stkglobalnew->selisih = $stokfisik - $saldoakhir;
            $stkglobalnew->save();
        };
       
        $stockglobal = StockglobalModel::all();

        return view('stockglobal.stockglobal',['stockglobal'=> $stockglobal,'saldoakhir'=>$saldoakhir]);
    }
}
