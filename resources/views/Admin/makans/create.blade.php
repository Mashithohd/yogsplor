@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Tambah Makanan</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.makans.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_makan">Nama Makan</label>
                <input type="text" name="nama_makan" class="form-control" required>
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
                <label for="lokasi">Link Google Maps</label>
                <input type="url" name="lokasi" class="form-control" placeholder="Masukkan link Google Maps" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <input type="text" name="jenis" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" step="0.01" name="harga" class="form-control" required>
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