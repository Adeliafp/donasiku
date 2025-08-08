<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index()
    {
        return view('donatur.beranda'); // Akan mencari resources/views/berandadonatur.blade.php
    }
}
