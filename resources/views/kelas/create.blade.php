<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Kelas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

  <h1 class="mb-4">Tambah Kelas</h1>

  <form action="{{ route('kelas.store') }}" method="POST" style="width:50%;">
    @csrf

    <div class="mb-3">
      <label for="nama_kelas" class="form-label">Nama Kelas</label>
      <input type="text" class="form-control" name="nama_kelas" required>
    </div>


    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
  </form>

</body>
</html>
