<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;

class DonasiController extends Controller
{
    public function index()
{
    $donasi = Donasi::where('jenis_donasi', 'uang')->get();

    if (auth()->check() && auth()->user()->is_admin) {
        return view('admin.donasi_uang.index', compact('donasi'));
    }

    return view('donasi.donasiuang.index', compact('donasi')); // untuk donatur
}


    public function create()
    {
        return view('admin.donasi_uang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'target' => 'required|numeric|min:1000',
        ]);

        Donasi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'target' => $request->target,
            'jenis_donasi' => 'uang',
            'terkumpul' => 0,
            'status' => 'disetujui', // bisa juga 'menunggu'
        ]);

        return redirect()->route('donasi-uang.index')->with('success', 'Donasi uang berhasil ditambahkan.');
    }

  public function show($id)
{
    $donasi = Donasi::findOrFail($id);

    if (auth()->check() && auth()->user()->is_admin) {
        return view('admin.donasi_uang.show', compact('donasi'));
    }

    return view('donasi.donasiuang.show', compact('donasi'));
}


    public function edit($id)
    {
        $donasi = Donasi::findOrFail($id);
        return view('admin.donasi_uang.edit', compact('donasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'target' => 'required|numeric|min:1000',
        ]);

        $donasi = Donasi::findOrFail($id);
        $donasi->update($request->all());

        return redirect()->route('donasi-uang.index')->with('success', 'Donasi uang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Donasi::destroy($id);
        return redirect()->route('donasi-uang.index')->with('success', 'Donasi uang berhasil dihapus.');
    }

    // Proses donasi publik
    public function proses(Request $request, $id)
    {
        $request->validate([
            'nominal' => 'required|numeric|min:1000'
        ]);

        $donasi = Donasi::findOrFail($id);
        $donasi->terkumpul += $request->nominal;
        $donasi->save();

        return back()->with('success', 'Terima kasih atas donasinya!');
    }
}
