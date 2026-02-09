@extends('layouts.app')

@section('title','Dashboard Admin')

@section('content')

<h4>Dashboard Admin</h4>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@include('layouts.navbar')

<h1>Dashboard Admin</h1>

{{-- Konten dashboard admin --}}

<div class="card">
    <div class="card-header bg-warning">
        Data Aspirasi Siswa
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <th>Nama Siswa</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            @foreach($aspirasi as $a)
            <tr>
                <td>{{ $a->siswa->nama_lengkap }}</td>
                <td>{{ $a->judul }}</td>
                <td>{{ $a->status }}</td>
                <td>
                    <form action="{{ route('admin.aspirasi.update', $a->id_aspirasi) }}" method="POST">
                        @csrf

                        <select name="status" class="form-control mb-2">
                            <option value="Diproses">Diproses</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>

                        <input type="text" name="catatan" class="form-control mb-2"
                               placeholder="Catatan admin">

                        <button class="btn btn-success btn-sm">
                            Update
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
