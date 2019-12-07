<?php

namespace App\Http\Controllers;

use App\Reloadingunit;
use Illuminate\Http\Request;

class ReloadingunitController extends Controller
{
    public function daf_pengisian()
    {
        $daf_pengisian = Reloadingunit::with('equipment','loginuser','fixstation','mobilestation')->get();

        return view('Daftar Pengisian.daf_pengisian', [
            'daf_pengisian' => $daf_pengisian,
        ]);
    }
}
