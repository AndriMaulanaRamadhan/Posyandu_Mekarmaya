@extends('layout.app')
@section('title', 'Data Bayi')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/viewbayi.css') }}">
@endsection
@section('content')
<div class="container mt-4 custom-container shadow p-4 bg-white rounded custom-card border custom-border mb-5">
    <h1 class="mb-4">Data Bayi</h1>
    <a href="{{ route('tambah_bayi.create') }}" class="btn btn-primary mb-3">Tambah Data Bayi</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center custom-table">
            <thead class="thead-dark custom-thead text-white text-center mb-3">
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 20%;">Nama</th>
                    <th style="width: 20%;">NIK</th>
                    <th style="width: 15%;">Tanggal Lahir</th>
                    <th style="width: 10%;">JK</th>
                    <th style="width: 10%;">Foto KK</th>
                    <th style="width: 10%;">Alamat</th>
                    <th style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataBayi as $bayi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $bayi->nama_bayi }}</td>
                    <td>{{ $bayi->nik_bayi }}</td>
                    <td>{{ $bayi->tanggal_lahir }}</td>
                    <td>{{ $bayi->jenis_kelamin }}</td>
                    <!-- foto kk menggunakan button untuk preview -->
                    <td>
                        @if ($bayi->foto_kk)
                        <a href="{{ asset('storage/' . $bayi->foto_kk) }}" target="_blank" class="btn btn-info btn-sm">Lihat Foto KK</a>
                        @else
                        <span class="text-muted">Tidak ada foto KK</span>
                        @endif
                    </td>
                    <td>{{ $bayi->alamat }}</td>
                    <td>
                        <a href="{{ route('view_bayi.edit', $bayi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('view_bayi.destroy', $bayi->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection