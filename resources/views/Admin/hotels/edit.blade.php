@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Hotel</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.hotels.update', $hotel) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_hotel">Nama Hotel</label>
                <input type="text" name="nama_hotel" class="form-control" value="{{ $hotel->nama_hotel }}" required>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ $hotel->lokasi }}" required>
            </div>
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" step="0.1" name="rating" class="form-control" value="{{ $hotel->rating }}" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" step="0.01" name="harga" class="form-control" value="{{ $hotel->harga }}" required>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="form-control">
                <img src="{{ asset('storage/images/' . $hotel->gambar) }}" width="100" alt="{{ $hotel->nama_hotel }}">
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