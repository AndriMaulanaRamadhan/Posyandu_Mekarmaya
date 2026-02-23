@extends('layout')
@section('title', 'Data Penduduk')
@section('content')
    <!-- buatlah div untuk membuat halaman menjadi justify di browser -->
    <div class="d-flex justify-content-center">
        <h1>Data Penduduk</h1>
    </div>
    <!-- membuat flash massage -->
     @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <!-- membuat flash massage danger -->
    @if(session('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <!-- membuat flash massage warning -->
    @if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <!-- membuat tombol tambah penduduk -->
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('tambah_penduduk.create') }}" class="btn btn-success">Tambah Penduduk</a>
    </div>
    <!-- membuat tabel untuk menampilkan data penduduk -->
    <div class="d-flex justify-content-center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">
                        <a href="{{ route('view_penduduk', ['sort' => $sort == 'asc' ? 'desc' : 'asc']) }}"
       class="text-dark text-decoration-none">
        Nama
        <i class="bi {{ $sort == 'asc' ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i>
    </a>
                    </th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- membuat perulangan foreach untuk memenggil isi database kedalama tabel -->
                @foreach ($dataPenduduk as $p)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->jenis_kelamin }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>
                            <!-- membuat tombol edit -->
                            <a href="{{ route('view_penduduk.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                            <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$p->id}}" >
  Hapus
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{$p->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus data {{ $p->nama }}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <!-- form Hapus -->
        <form action="{{ route('view_penduduk.destroy', $p->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
            <div class="d-flex justify-content-center mb-3">
            {{ $dataPenduduk->links() }}
        </div>
@endsection