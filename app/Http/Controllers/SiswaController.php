<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;

class SiswaController extends Controller
{
    /**
     * Tampilkan daftar siswa.
     */
    public function index()
    {
        // Ambil siswa beserta relasi kelas dan jurusan
        $siswas = Siswa::with(['kelas', 'jurusan'])->get();
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Form create siswa baru.
     */
    public function create()
    {
        $kelas = Kelas::all();
        $jurusans = Jurusan::all(); // ⬅️ ambil semua jurusan
        return view('siswa.create', compact('kelas', 'jurusans'));
    }

    /**
     * Simpan data siswa baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusans,id', // ⬅️ validasi relasi jurusan
        ]);

        Siswa::create([
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
            'jurusan_id' => $request->jurusan_id,
        ]);

        return redirect()->route('siswa.index')->with('message', 'Siswa berhasil ditambahkan!');
    }

    /**
     * Form edit siswa.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $jurusans = Jurusan::all();
        return view('siswa.edit', compact('siswa', 'kelas', 'jurusans'));
    }

    /**
     * Update data siswa.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($validated);

        return redirect()->route('siswa.index')->with('message', 'Data siswa berhasil diperbarui');
    }

    /**
     * Hapus data siswa.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('message', 'Data siswa berhasil dihapus');
    }
}
