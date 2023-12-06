<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $kelas = Kelas::getKelasByUserId($userId)->get();

        return view('userboard.home', compact('kelas'));
    }

    public function create(){
        return view('kelas.create');
    }

    public function gabungKelas(Request $request)
    {
        $request->validate([
            'kode_kelas' => 'required|string', // Sesuaikan validasi sesuai kebutuhan
        ]);

        $kodeKelas = $request->input('kode_kelas');
        $userId = auth()->id();

        $kelas = Kelas::where('kode_akses', $kodeKelas)->first();

        if (!$kelas) {
            return redirect()->route('home');
        }

        if ($kelas->users->contains($userId)) {
            return redirect()->route('home');
        }

        $kelas->users()->attach($userId, ['nama' => $kelas->nama, 'deskripsi' => $kelas->deskripsi]);

        return redirect()->route('home');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $code = Str::random(10);

        $kelas = Kelas::create([
            'nama' => $data['nama'],
            'deskripsi' => $data['deskripsi'],
            'user_id' => Auth::user()->id,
            'kode_akses' => $code,
        ]);

        return redirect()->route('kelas.show', $kelas);
    }
    public function edit(Kelas $kelas)
    {
        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        // Update data di database
        $kelas->update([
            'nama' => $data['nama'],
            'deskripsi' => $data['deskripsi'],
        ]);

        return redirect()->route('kelas.show', $kelas);
    }   
    
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('home');
    }

    public function show(Kelas $kelas)
    {
        return view('kelas.show', compact('kelas'));
    }

    public function showpengaturan(Kelas $kelas)
    {
        return view('kelas.pengaturankelas', compact('kelas'));
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'kelas_user', 'user_id');
    }

}