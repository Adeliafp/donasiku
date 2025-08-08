<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonasiWaktu;
use App\Models\Donasi;
use App\Models\DonasiBarang;
use App\Models\Permohonan;

class DonasiWaktuController extends Controller
{
    // Tampilkan semua donasi waktu dan data lain di dashboard admin
    public function index()
    {
        $jumlahDonasiUang = Donasi::count();
        $jumlahDonasiBarang = DonasiBarang::count();
        $jumlahDonasiWaktu = DonasiWaktu::count();
        $jumlahPermohonan = Permohonan::count();

        $donasiUang = Donasi::latest()->get();
        $permohonans = Permohonan::latest()->get();
        $donasiWaktu = DonasiWaktu::latest()->get();

        return view('admin.dashboard', compact(
            'jumlahDonasiUang',
            'jumlahDonasiBarang',
            'jumlahDonasiWaktu',
            'jumlahPermohonan',
            'donasiUang',
            'donasiWaktu',
            'permohonans'
        ));
    }

    // Tampilkan form tambah donasi waktu
    public function create()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        return view('admin.donasi_waktu.create');
    }

    // Simpan data donasi waktu baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'durasi' => 'required|numeric|min:1',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'jenis_donasi' => 'required|string'
        ]);

        DonasiWaktu::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'durasi' => $request->durasi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'jenis_donasi' => $request->jenis_donasi,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('donasi-waktu.index')->with('success', 'Donasi waktu berhasil ditambahkan.');
    }

    // Tampilkan detail donasi waktu
    public function show($id)
    {
        $donasi = DonasiWaktu::findOrFail($id);
        return view('donasiwaktu.show', compact('donasi'));
    }

    // Tampilkan form edit donasi waktu
    public function edit($id)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $donasi = DonasiWaktu::findOrFail($id);
        return view('admin.donasi_waktu.edit', compact('donasi'));
    }

    // Update data donasi waktu
    public function update(Request $request, $id)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'durasi' => 'required|numeric|min:1',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'jenis_donasi' => 'required|string'
        ]);

        $donasi = DonasiWaktu::findOrFail($id);
        $donasi->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'durasi' => $request->durasi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'jenis_donasi' => $request->jenis_donasi,
        ]);

        return redirect()->route('donasi-waktu.index')->with('success', 'Donasi waktu berhasil diperbarui.');
    }

    // Hapus donasi waktu
    public function destroy($id)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        DonasiWaktu::destroy($id);
        return redirect()->route('donasi-waktu.index')->with('success', 'Donasi waktu berhasil dihapus.');
    }
}
