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
        <h2 class="mb-3">Tambah Wali</h2>
        @if (isset($wali))
        <form method="POST" action="/wali/update">
            @method('PUT')
        @else
            <form method="POST" action="/wali">
        @endif
                @csrf
                @if (isset($wali))
                    <input type="text" name="id" value="{{ $wali->id }}" hidden>
                     @endif            
            
            <div class="mb-3">
                <label class="form-label">Nama Wali</label>
                <input type="text" name="nama_wali" class="form-control" value="{{ old('name', $wali->nama_wali ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kontak</label>
                <input type="text" name="kontak_wali" class="form-control" value="{{ old('name', $wali->kontak_wali ?? '') }}" required>
            </div>
            
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/wali" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>