<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    // Menampilkan daftar anggota
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    // Menampilkan form untuk menambah anggota
    public function create()
    {
        return view('anggota.create');
    }

    // Menyimpan anggota baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:anggota',
            'alamat' => 'required',
        ]);

        // Simpan anggota baru
        Anggota::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan');
    }

    // Menampilkan detail anggota berdasarkan ID
    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota.show', compact('anggota'));
    }

    // Menampilkan form untuk mengedit anggota
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota.edit', compact('anggota'));
    }

    // Mengupdate data anggota di database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:anggota,email,' . $id,
            'alamat' => 'required',
        ]);

        // Cari anggota dan update datanya
        $anggota = Anggota::findOrFail($id);
        $anggota->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diupdate');
    }

    // Menghapus anggota dari database
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus');
    }
}
