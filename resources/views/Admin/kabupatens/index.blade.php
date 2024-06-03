<!-- resources/views/admin/kabupatens/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Kabupaten</h1>
        <a href="{{ route('admin.kabupaten.create') }}" class="btn btn-primary">Tambah Kabupaten</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Kabupaten</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kabupatens as $kabupaten)
            <tr>
                <td>{{ $kabupaten->nama_kabupaten }}</td>
                <td>
                    @if($kabupaten->gambar)
                        <img src="{{ asset('storage/' . $kabupaten->gambar) }}" alt="{{ $kabupaten->nama_kabupaten }}" width="100">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.kabupaten.edit', $kabupaten->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.kabupaten.destroy', $kabupaten->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
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