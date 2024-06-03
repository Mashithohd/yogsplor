@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Daftar Makanan</h1>
        <a href="{{ route('admin.makans.create') }}" class="btn btn-primary">Tambah Makanan</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Makan</th>
                    <th>Kabupaten</th>
                    <th>Lokasi</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($makans as $makan)
                    <tr>
                        <td>{{ $makan->id }}</td>
                        <td>{{ $makan->nama_makan }}</td>
                        <td>{{ $makan->kabupaten }}</td>
                        <td>
                            <a href="{{ $makan->lokasi }}" target="_blank">
                                {{ Str::limit($makan->lokasi, 30) }} <!-- Membatasi teks menjadi 30 karakter -->
                            </a>
                        </td>
                        <td>{{ $makan->jenis }}</td>
                        <td>{{ $makan->harga }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $makan->gambar) }}" alt="Gambar Makan" style="width: 100px;">
                        </td>
                        <td>
                            <a href="{{ route('admin.makans.edit', $makan) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.makans.destroy', $makan) }}" method="POST" style="display:inline-block;">
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