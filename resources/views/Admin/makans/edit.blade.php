@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Makanan</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.makans.update', $makan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_makan">Nama Makan</label>
                <input type="text" name="nama_makan" class="form-control" value="{{ $makan->nama_makan }}" required>
            </div>
            <div class="form-group">
                <label for="lokasi">Link Google Maps</label>
                <input type="url" name="lokasi" class="form-control" placeholder="Masukkan link Google Maps" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ $makan->jenis }}" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" step="0.01" name="harga" class="form-control" value="{{ $makan->harga }}" required>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="form-control">
                <img src="{{ asset('storage/images/' . $makan->gambar) }}" width="100" alt="{{ $makan->nama_makan }}">
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