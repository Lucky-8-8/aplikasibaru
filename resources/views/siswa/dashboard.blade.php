@extends('layouts.app')

@section('title','Dashboard Siswa')

@section('content')

<h4>Dashboard Siswa</h4>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- FORM KIRIM ASPIRASI -->
<div class="card mb-4">
    <div class="card-header bg-success text-white">
        Kirim Aspirasi
    </div>

    <div class="card-body">
        <form action="{{ route('siswa.aspirasi.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id_kategori }}">
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
            </div>

            <button class="btn btn-success">
                Kirim Aspirasi
            </button>
        </form>
    </div>
</div>

<!-- RIWAYAT ASPIRASI -->
<div class="card">
    <div class="card-header bg-primary text-white">
        Riwayat Aspirasi
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Judul</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>

            @foreach($aspirasi as $a)
            <tr>
                <td>{{ $a->judul }}</td>
                <td>{{ $a->status }}</td>
                <td>{{ $a->tanggal_pengaduan }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
