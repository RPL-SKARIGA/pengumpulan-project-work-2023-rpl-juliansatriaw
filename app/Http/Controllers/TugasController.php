<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Kelas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        // Ambil semua tugas
        $tugas = Tugas::all();

        return view('kelas.show', compact('tugas'));
    }
    public function show($kelasId, $tugasId)
    {   
        $kelas = Kelas::with(['tugas'])->findOrFail($kelasId);
        $tugas = Tugas::findOrFail($tugasId);

        return view('tugas.showtugas', compact('kelas', 'tugas'));
    }

    public function create($kelasId)
    {
        $kelas = Kelas::findOrFail($kelasId);
        return view('tugas.tugascreate', compact('kelas'));
    }

    public function store(Request $request, $kelasId)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'file' => 'nullable|file|mimes:jpeg,png,mp4|max:2048',
        ]);

        $file = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file')->store('tugas', 'public');
        }

        $kelas = Kelas::findOrFail($kelasId);
        $tugas = $kelas->tugas()->create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'file' => $file,
        ]);

        return redirect()->route('kelas.show', $kelasId)->with('success', 'Tugas berhasil dibuat!');
    }
    
}
