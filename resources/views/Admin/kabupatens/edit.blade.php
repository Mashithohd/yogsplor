<!-- resources/views/admin/kabupatens/edit.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Kabupaten</h1>
        <form action="{{ route('admin.kabupaten.update', $kabupaten->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_kabupaten">Nama Kabupaten</label>
                <input type="text" class="form-control" id="nama_kabupaten" name="nama_kabupaten" value="{{ $kabupaten->nama_kabupaten }}" required>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="form-control">
                @if($kabupaten->gambar)
                    <img src="{{ asset('storage/' . $kabupaten->gambar) }}" width="100" alt="{{ $kabupaten->nama_kabupaten }}">
                @else
                    <p>Tidak ada gambar</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection

<style>
    .container {
        margin-top: 120px;
    }
</style>
