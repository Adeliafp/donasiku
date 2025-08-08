<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonasiBarang;
use App\Models\DonasiBarangMasuk;

class DonasiBarangController extends Controller
{
    public function index()
    {
        $donasiBarang = DonasiBarang::all();

        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('admin.donasi_barang.index', compact('donasiBarang'));
        }

        return view('donasibarang.index', compact('donasiBarang'));
    }

    public function create()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Halaman hanya untuk admin.');
        }

        return view('admin.donasi_barang.create');
    }

    public function store(Request $request)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Halaman hanya untuk admin.');
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        DonasiBarang::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.donasi-barang.index')->with('success', 'Donasi barang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $donasi = DonasiBarang::findOrFail($id);

        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('admin.donasi_barang.show', compact('donasi'));
        }

        return view('donasibarang.show', compact('donasi'));
    }

    public function edit($id)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Halaman hanya untuk admin.');
        }

        $donasi = DonasiBarang::findOrFail($id);
        return view('admin.donasi_barang.edit', compact('donasi'));
    }

    public function update(Request $request, $id)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Halaman hanya untuk admin.');
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $donasi = DonasiBarang::findOrFail($id);
        $donasi->update($request->only('judul', 'deskripsi'));

        return redirect()->route('admin.donasi-barang.index')->with('success', 'Donasi barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Halaman hanya untuk admin.');
        }

        DonasiBarang::destroy($id);
        return redirect()->route('admin.donasi-barang.index')->with('success', 'Donasi barang berhasil dihapus.');
    }

    public function storeBarangMasuk(Request $request, $id)
    {
        if (!auth()->check() || auth()->user()->role !== 'user') {
            abort(403, 'Hanya pengguna biasa yang dapat mengirim donasi.');
        }

        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'nomor_telepon_pengirim' => 'required|string|max:20',
            'alamat_pengiriman' => 'required|string',
            'deskripsi' => 'required|string',
            'foto_barang' => 'required|image|max:2048',
        ]);

        $file = $request->file('foto_barang')->store('bukti_barang', 'public');

        DonasiBarangMasuk::create([
            'donasi_barang_id' => $id,
            'nama_pengirim' => $request->nama_pengirim,
            'nomor_telepon_pengirim' => $request->nomor_telepon_pengirim,
            'alamat_pengirim' => $request->alamat_pengiriman,
            'deskripsi' => $request->deskripsi,
            'foto_barang' => $file,
        ]);

        return redirect()->back()->with('success', 'Donasi barang berhasil dikirim.');
    }
}
