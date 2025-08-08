<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\DonasiBarang;
use App\Models\DonasiBarangMasuk;
use App\Models\DonasiWaktu;
use App\Models\Permohonan;
use App\Models\DonasiGabungan;

class AdminController extends Controller
{
    // Tampilkan dashboard admin
    public function index()
    {
        // Hitung jumlah untuk statistik
        $jumlahDonasiUang = Donasi::count();
        $jumlahDonasiBarang = DonasiBarang::count();
        $jumlahDonasiWaktu = DonasiWaktu::count();
        $jumlahPermohonan = Permohonan::count();

        // Ambil data riwayat untuk ditampilkan di tabel dashboard
        $donasiUang = Donasi::latest()->get();
        $donasiBarang = DonasiBarang::latest()->get();
        $donasiWaktu = DonasiWaktu::latest()->get();
        $permohonans = Permohonan::latest()->get();

        // ✅ Ambil data donasi barang masuk
        $barangMasuk = DonasiBarangMasuk::with('donasiBarang')->latest()->get();

        return view('admin.dashboard', compact(
            'jumlahDonasiUang',
            'jumlahDonasiBarang',
            'jumlahDonasiWaktu',
            'jumlahPermohonan',
            'donasiUang',
            'donasiBarang',
            'donasiWaktu',
            'permohonans',
            'barangMasuk' // <-- Tambahan ini
        ));
    }

    // Tampilkan grafik donasi
    public function grafikDonasi()
    {
        // Contoh data dummy
        $labels = ['Jan', 'Feb', 'Mar', 'Apr'];
        $data = [1500000, 1200000, 2000000, 1800000];

        return view('admin.grafik', compact('labels', 'data'));
    }

    // Tampilkan riwayat semua donasi (gabungan)
    public function riwayatDonasi()
    {
        $riwayat = DonasiGabungan::with('user')->latest()->paginate(10);
        return view('admin.riwayat', compact('riwayat'));
    }

    // Pencarian donasi gabungan berdasarkan kata kunci
    public function cariDonasi(Request $request)
    {
        $keyword = $request->input('keyword');

        $hasil = DonasiGabungan::where('jenis', 'like', "%$keyword%")
            ->orWhere('detail', 'like', "%$keyword%")
            ->orWhereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%");
            })
            ->paginate(10);

        return view('admin.hasilcari', compact('hasil', 'keyword'));
    }
}
