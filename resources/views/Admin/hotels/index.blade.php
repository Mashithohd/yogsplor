@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Daftar Hotel</h1>
        <a href="{{ route('admin.hotels.create') }}" class="btn btn-primary">Tambah Hotel</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Hotel</th>
                    <th>Kabupaten</th>
                    <th>Lokasi</th>
                    <th>Rating</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $hotel)
                    <tr>
                        <td>{{ $hotel->id }}</td>
                        <td>{{ $hotel->nama_hotel }}</td>
                        <td> {{$hotel->kabupaten }}</td>
                        <td>
                            <a href="{{ $hotel->lokasi }}" target="_blank">
                                {{ Str::limit($hotel->lokasi, 30) }} <!-- Membatasi teks menjadi 30 karakter -->
                            </a>
                        </td>
                        <td>{{ $hotel->rating }}</td>
                        <td>{{ $hotel->harga }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $hotel->gambar) }}" alt="Gambar Hotel" style="width: 100px;">
                        </td>
                        <td>
                            <a href="{{ route('admin.hotels.edit', $hotel) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.hotels.destroy', $hotel) }}" method="POST" style="display:inline-block;">
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
