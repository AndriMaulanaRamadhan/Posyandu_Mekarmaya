@extends('layout')
@section('title', 'Tambah Penduduk')
@section('content')
    <div class="d-flex justify-content-center">
        <h1>Tambah Penduduk</h1>
    </div>
    <div class="d-flex justify-content-center">
        <form action="{{ route('view_penduduk.store') }}" method="POST" class="w-50">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('view_penduduk') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection