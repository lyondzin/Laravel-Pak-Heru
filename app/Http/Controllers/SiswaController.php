<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create() {
    $kelas = Kelas::all();
    return view('siswa.create', compact('kelas'));
}


  public function index()
{
    $siswas = Siswa::with('kelas')->get();
    return view('siswa.index', compact('siswas'));
}



    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'kelas_id' => 'required|exists:kelas,id',
        'jurusan' => 'required',
    ]);

    Siswa::create([
        'nama' => $request->nama,
        'kelas_id' => $request->kelas_id, // ⬅️ ini wajib
        'jurusan' => $request->jurusan,
    ]);

    return redirect()->route('siswa.index')->with('message', 'Siswa berhasil ditambahkan!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         

   $siswa = Siswa::find($id);
    return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $validated = $request->validate([
        'nama' => 'required',
        'kelas' => 'required',
        'jurusan' => 'required',
    ]);

    $siswa = Siswa::findOrFail($id);
    $siswa->update([
        'nama' => $request->nama,
        'kelas' => $request->kelas,
        'jurusan' => $request->jurusan,
    ]);

    return redirect()->route('siswa.index')->with('message', 'Data siswa berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $siswa = Siswa::findOrFail($id);
    $siswa->delete();

    return redirect()->route('siswa.index')->with('message', 'Data siswa berhasil dihapus');
    }
    

    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kelas');
            $table->string('jurusan');
            $table->timestamps();
        });
    }

}

