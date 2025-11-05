<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Tambah Siswa</title>
</head>
<body>
    <div class="d-flex justify-content-center">
        <h1 style="width:75%; margin-top:50px;">Tambah Siswa</h1>
    </div>

    <div class="d-flex justify-content-center">
        <form style="width:75%; margin-top:50px;" action="{{ route('siswa.store') }}" method="post">
            @csrf

            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif

            {{-- Input Nama --}}
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Dropdown Kelas --}}
            <div class="mb-3">
                <label for="kelas_id" class="form-label">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }}
                        </option>
                    @endforeach
                </select>
                @error('kelas_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

           <div class="mb-3">
  <label for="jurusan_id" class="form-label">Jurusan</label>
  <select name="jurusan_id" id="jurusan_id" class="form-select" required>
      <option value="">-- Pilih Jurusan --</option>
      @foreach($jurusans as $jurusan)
          <option value="{{ $jurusan->id }}" {{ old('jurusan_id', $siswa->jurusan_id ?? '') == $jurusan->id ? 'selected' : '' }}>
              {{ $jurusan->nama_jurusan }}
          </option>
      @endforeach
  </select>
</div>


            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>
</html>
