<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use Illuminate\Support\Facades\Storage;

class PermohonanController extends Controller
{
    // Tampilkan semua permohonan
    public function index()
    {
        $permohonans = Permohonan::latest()->get();
        return view('admin.permohonan.index', compact('permohonans'));
    }

    // Tampilkan form pengajuan permohonan
    public function showForm()
    {
        return view('formpermohonan');
    }

    // Proses submit form
    public function submitForm(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'jenis_donasi' => 'required|in:uang,barang,waktu',
            'deskripsi' => 'required|string',
            'foto_bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('foto_bukti')->store('permohonan_foto', 'public');

        Permohonan::create([
            'nama' => $request->nama,
            'judul' => $request->judul,
            'jenis_donasi' => $request->jenis_donasi,
            'deskripsi' => $request->deskripsi,
            'foto' => $path,
        ]);

        return back()->with('success', 'Permohonan berhasil dikirim!');
    }

    // Tampilkan detail permohonan
    public function show($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        return view('admin.permohonan.show', compact('permohonan'));
    }
    public function edit($id)
{
    $permohonan = \App\Models\Permohonan::findOrFail($id);
    return view('admin.permohonan.edit', compact('permohonan'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'jenis_donasi' => 'required|string',
        'status' => 'required|in:pending,diterima,ditolak'
    ]);

    $permohonan = \App\Models\Permohonan::findOrFail($id);
    $permohonan->update($request->all());

    return redirect()->route('admin.permohonan.index')->with('success', 'Permohonan berhasil diperbarui.');
}

public function destroy($id)
{
    $permohonan = Permohonan::findOrFail($id);
    $permohonan->delete();

    return redirect()->route('admin.dashboard')->with('success', 'Permohonan berhasil dihapus.');
}
public function create()
{
    return view('admin.permohonan.create');
}


}
