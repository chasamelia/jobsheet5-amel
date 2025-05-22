<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-3">Tambah Siswa</h2>
        @if (isset($siswa))
            <form method="POST" action="/siswa/update/">
                @method('PUT')
            @else
                <form method="POST" action="/siswa">
            @endif
                @csrf
                @if (isset($siswa))
                    <input type="text" name="id" value="{{ $siswa->id }}" hidden>
                     @endif            
            
            <div class="mb-3">
                <label class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control" value="{{ old('name', $siswa->nis ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama_siswa" class="form-control" value="{{ old('name', $siswa->nama_siswa ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="L" {{ old('jk', $siswa->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }} >Laki-laki</option>
                    <option value="P" {{ old('jk', $siswa->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ old('name', $siswa->tempat_lahir ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('name', $siswa->tanggal_lahir ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <select name="id_kelas" class="form-control" required>
                    @foreach($kelas as $k)    
                <option value="{{ $k->id }}" {{ old('kelas', $siswa->id_kelas ?? '') == $k->id  ? 'selected' : '' }} >{{ $k->nama_kelas }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Wali Murid</label>
                <select name="id_wali" class="form-control" required>
                    @foreach($wali as $w)
                        <option value="{{ $w->id }}" {{ old('wali', $siswa->id_wali ?? '') ==  $w->id  ? 'selected' : '' }}>{{ $w->nama_wali}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>