<!-- resources/views/admin/kabupatens/create.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Kabupaten</h1>
    <form action="{{ route('admin.kabupaten.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_kabupaten">Nama Kabupaten</label>
            <input type="text" class="form-control" id="nama_kabupaten" name="nama_kabupaten" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

<style>
    .container{
        margin-top: 120px;
    }
</style>
