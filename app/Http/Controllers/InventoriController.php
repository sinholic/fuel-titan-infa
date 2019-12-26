<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InventoriModel;
use App\BarangModel;
use App\MaterialsModel;
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
        // return $inventori;
        //sum qty out
        $out = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','out')->sum('qty');
        $in = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','In')->sum('qty');
        return view('Inventori.inventori',['inventori' => $inventori,'sumout'=> $out,'sumin' => $in]);

    }
    public function addinventori(){
        $b = MaterialsModel::all();
        $out = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','out')->sum('qty');
        $in = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','In')->sum('qty');
        return view('Inventori.add_inventori',['databarang' => $b,'sumout'=> $out,'sumin' => $in]);
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
            'kode_barang'=>['required', 'unique:inventori,kode_barang'],
            'saldo_awal'=> "required",
        ]); 
        $out = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','out')->sum('qty');
        $in = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','In')->sum('qty');
        
        $request->barang_in = $in;
        $invModel = new InventoriModel;
        $invModel->kode_barang = $request->kode_barang;
        $invModel->saldo_awal = $request->saldo_awal;
        $invModel->barang_in = $in;
        $invModel->barang_out = $out;
        $invModel->saldo_akhir = $request->saldo_awal + $in - $out;
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
    public function refresh(Request $request, $id)
    {
        //
        $out = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','out')->sum('qty');
        $in = Materialtransaction::join('materials','materialtransactions.material_id','=','materials.id')->where('transaction_type','=','In')->sum('qty');
        
        $invModel = InventoriModel::find($id);

        $invModel->barang_in = $in;
        $invModel->barang_out = $out;
        $invModel->saldo_akhir = $invModel->saldo_awal + $in - $out;
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
        
    }
}
