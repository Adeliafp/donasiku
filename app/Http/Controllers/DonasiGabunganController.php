<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\DonasiBarang;
use App\Models\DonasiWaktu;

class DonasiGabunganController extends Controller
{
    public function index()
    {
        $donasiUang = Donasi::all();
        $donasiBarang = DonasiBarang::all();
        $donasiWaktu = DonasiWaktu::all();

        return view('donasigabungan.index', compact('donasiUang', 'donasiBarang', 'donasiWaktu'));
    }
}
