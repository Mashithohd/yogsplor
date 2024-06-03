@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Tambah Wisata</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.wisatas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_wisata">Nama Wisata</label>
                <input type="text" name="nama_wisata" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="kabupaten">Kabupaten</label>
                <!-- Mengganti input text menjadi dropdown -->
                <select name="kabupaten" class="form-control" required>
                    <option value="">Pilih Kabupaten</option>
                    @foreach($kabupatens     as $kabupaten)
                        <option value="{{ $kabupaten->id }}">{{ $kabupaten->nama_kabupaten }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="lokasi">Link Google Maps</label>
                <input type="url" name="lokasi" class="form-control" placeholder="Masukkan link Google Maps" required>
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