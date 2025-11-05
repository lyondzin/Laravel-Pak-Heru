<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Jurusan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Daftar Jurusan</h1>
    <a href="{{ route('jurusan.create') }}" class="btn btn-success">+ Tambah Jurusan</a>
  </div>

  @if (session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
  @endif

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Jurusan</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($jurusan as $index => $j)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $j->nama_jurusan }}</td>
          <td>{{ $j->keterangan ?? '-' }}</td>
          <td>
            <a href="{{ route('jurusan.edit', $j->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('jurusan.destroy', $j->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jurusan ini?')">Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="4" class="text-center">Belum ada data jurusan</td></tr>
      @endforelse
    </tbody>
  </table>

</body>
</html>
