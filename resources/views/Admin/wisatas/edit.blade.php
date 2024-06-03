@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Wisata</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.wisatas.update', $wisata) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_wisata">Nama Wisata</label>
                <input type="text" name="nama_wisata" class="form-control" value="{{ $wisata->nama_wisata }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="5" required>{{ $wisata->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label for="lokasi">Link Google Maps</label>
                <input type="url" name="lokasi" class="form-control" placeholder="Masukkan link Google Maps" required>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="form-control">
                <img src="{{ asset('storage/wisata/' . $wisata->gambar) }}" width="100" alt="{{ $wisata->nama_wisata }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
<style>
    .container{
        margin-top: 120px;
    }
</style>