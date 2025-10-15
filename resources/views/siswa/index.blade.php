  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="p-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1>Daftar Siswa</h1>
      <a href="{{ route('siswa.create') }}" class="btn btn-success">+ Tambah Siswa</a>
    </div>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Jurusan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($siswas as $index => $siswa)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->kelas }}</td>
            <td>{{ $siswa->jurusan }}</td>
            <td>
              <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center">Belum ada data siswa</td>
          </tr>
        @endforelse
      </tbody>
    </table>

  </body>
  </html>
