<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Jurusan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">

  <div class="container bg-white p-4 rounded shadow-sm">
    <h2 class="mb-4">Edit Jurusan</h2>

    <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
        <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" 
               value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}" required>
      </div>

      <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $jurusan->keterangan) }}</textarea>
      </div>

      <div class="d-flex justify-content-between">
        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>

</body>
</html>
