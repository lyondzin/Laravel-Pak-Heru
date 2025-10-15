<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function create()
    {
        return view('siswa.create');
    }

    public function index()
{
    // Ambil semua data dari model Siswa
    $siswas = \App\Models\Siswa::all();

  
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
        $validated = $request->validate([
            'nama'=>'required',
            'kelas'=>'required',
            'jurusan'=>'required',
        ]);


        Siswa::create([
            'nama'=>$request->get('nama'),
            'kelas'=>$request->get('kelas'),
            'jurusan'=>$request->get('jurusan'),
        ]);


        return redirect()->route('siswa.index')->with('message','Siswa berhasil ditambahkan');
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

