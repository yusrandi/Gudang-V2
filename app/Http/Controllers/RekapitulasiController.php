<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class RekapitulasiController extends Controller
{
    //
    public function index()
    {
        // return Report::with('penerimaan')
        //     ->orderBy('date')
        //     ->get()->sortby('penerimaan.barang_id');
        return view('pages.rekapitulasi');
    }
}
