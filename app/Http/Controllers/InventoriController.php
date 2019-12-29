<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InventoriModel;
use App\BarangModel;
use App\MaterialsModel;
use App\FixStationModel;
use App\Reloadingunit;
use App\PenerimaanModel;

use App\Materialtransaction;



class InventoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inventori()
    {
        //
        $inventori = InventoriModel::all();
        $transaction = Materialtransaction::all();
        
        // return $inventori;
        //sum qty out
        $out = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','out')->sum('qty');
        $in = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','In')->sum('qty');
        return view('Inventori.inventori',['transaction'=>$transaction,'inventori' => $inventori,'sumout'=> $out,'sumin' => $in]);

    }
    public function addinventori(){
        $b = MaterialsModel::all();
        $fix_station = FixStationModel::all();
        $out = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','out')->sum('qty');
        $in = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','In')->sum('qty');
        return view('Inventori.add_inventori',['databarang' => $b,'sumout'=> $out,'sumin' => $in,'fix_station'=>$fix_station]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $this->validate($request,[
            'fix_id'=>['required','unique:inventori,fix_id'],
            'saldo_awal'=> "required",
        ]); 
        $out = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','out')->sum('qty');
        $in = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','In')->sum('qty');
        $qtyout = Reloadingunit::where('origin','=','Fix Station')->where('station_id','=',$request->fix_id)->sum('qty');
        $qtyin = PenerimaanModel::where('fixstation_id','=',$request->fix_id)->sum('qty');

        $request->barang_in = $in;
        $invModel = new InventoriModel;
        $invModel->kode_barang = $request->kode_barang;
        $invModel->saldo_awal = $request->saldo_awal;
        $invModel->fix_id = $request->fix_id;
        $invModel->barang_in = $qtyin;
        $invModel->barang_out = $qtyout;
        $invModel->saldo_akhir = $request->saldo_awal + $qtyin - $qtyout;
        $invModel->save();


        // InventoriModel::create($request->all());
        return redirect('/inventori')->with('sukses', 'Data Berhasil Di Input!');

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $idInv = InventoriModel::find($id);

        $b = MaterialsModel::all();
        $fix_station = FixStationModel::all();
        $out = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','out')->sum('qty');
        $in = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','In')->sum('qty');
        return view('Inventori.editinventori',['dataInv'=>$idInv,'databarang' => $b,'sumout'=> $out,'sumin' => $in,'fix_station'=>$fix_station]);

        // return view('Inventori.editinventori',['dataInv'=>$idInv]);
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
        $invModel = InventoriModel::find($id);
        // $idInv->barang_out = $request->barang_out;
        // $idInv->saldo_akhir = $idInv->saldo_awal + $idInv->barang_in - $request->barang_out;
        // $idInv->update();

        $out = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','out')->sum('qty');
        $in = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','In')->sum('qty');
        $qtyout = Reloadingunit::where('origin','=','Fix Station')->where('station_id','=',$request->fix_id)->sum('qty');
        $qtyin = PenerimaanModel::where('fixstation_id','=',$request->fix_id)->sum('qty');

        $request->barang_in = $in;
        $invModel->kode_barang = $request->kode_barang;
        $invModel->saldo_awal = $request->saldo_awal;
        $invModel->fix_id = $request->fix_id;
        $invModel->barang_in = $qtyin;
        $invModel->barang_out = $qtyout;
        $invModel->saldo_akhir = $request->saldo_awal + $qtyin - $qtyout;
        $invModel->update();

        return redirect('/inventori');
    }
    public function refresh(Request $request, $id)
    {
        //
        $out = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','out')->sum('qty');
        $in = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','In')->sum('qty');
        $qtyout = Reloadingunit::where('origin','=','Fix Station')->where('station_id','=',$request->fix_id)->sum('qty');
        $qtyin = PenerimaanModel::where('fixstation_id','=',$request->fix_id)->sum('qty');

        $request->barang_in = $in;
        $invModel = new InventoriModel;
        $invModel->kode_barang = $request->kode_barang;
        $invModel->saldo_awal = $request->saldo_awal;
        $invModel->fix_id = $request->fix_id;
        $invModel->barang_in = $qtyin;
        $invModel->barang_out = $qtyout;
        $invModel->saldo_akhir = $request->saldo_awal + $qtyin - $qtyout;
        $invModel->update();
        return redirect('/inventori');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    //
    $inv = InventoriModel::find($id);
    $inv-delete($inv);
    return redirect('/inventori');

        
    }
}
