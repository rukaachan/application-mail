<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiSuratController extends Controller
{
    function index()
    {
        return view('transaksi.index');
    }
}
