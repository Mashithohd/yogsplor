@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Daftar Wisata</h1>
        <a href="{{ route('admin.wisatas.create') }}" class="btn btn-primary">Tambah Wisata</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Wisata</th>
                    <th>Deskripsi</th>
                    <th>Kabupaten</th>
                    <th>Lokasi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($wisatas as $wisata)
                    <tr>
                        <td>{{ $wisata->id }}</td>
                        <td>{{ $wisata->nama_wisata }}</td>
                        <td>{{ $wisata->deskripsi }}</td>
                        <td>{{ $wisata->kabupaten }}</th>
                        <td>
                            <a href="{{ $wisata->lokasi }}" target="_blank">
                                {{ Str::limit($wisata->lokasi, 30) }} <!-- Membatasi teks menjadi 30 karakter -->
                            </a>
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="Gambar Wisata" style="width: 100px;">
                        </td>
                        <td>
                            <a href="{{ route('admin.wisatas.edit', $wisata) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.wisatas.destroy', $wisata) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
<style>
    .container{
        margin-top: 120px;
    }
</style>