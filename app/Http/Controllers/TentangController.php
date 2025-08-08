<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{
    /**
     * Menampilkan halaman Tentang Kami.
     */
    public function index()
    {
        return view('tentang');
    }
}
