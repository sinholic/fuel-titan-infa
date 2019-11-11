<?php

namespace App\Http\Controllers;

use App\Equipmentcard;
use Illuminate\Http\Request;

class EquipmentcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function card()
    {
        $card = Equipmentcard::all();
        return view('Card.card', ['card' => $card]);
    }

    public function tambah()
    {
        return view('Card.tambah_card');
    }

    public function create(Request $request)
    {
        Equipmentcard::create($request->all());
        return redirect('/card')->with('sukses', 'Data Berhasil Di Input!');
    }

    public function edit($id)
    {
        $card = Equipmentcard::find($id);
        return view('Card.edit_card', ['card' => $card]);
    }

    public function update(Request $request, $id)
    {
        $card = Equipmentcard::find($id);
        $card->update($request->all());
        return redirect('/card')->with('sukses', 'Data Berhasil Di Update!');
    }

    public function delete($id)
    {
        $card = Equipmentcard::find($id);
        $card->delete($card);
        return redirect('/card')->with('sukses', 'Data berhasil dihapus!');
    }
}
