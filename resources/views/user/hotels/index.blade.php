@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($hotels as $hotel)
    <div class="hotel-card">
        <div class="hotel-header">
            <h1>{{ $hotel->nama_hotel }}</h1>
            <div class="rating">
                <span>{{ $hotel->rating }}</span>
                <div class="stars">
                    @for ($i = 0; $i < $hotel->rating; $i++)
                        <i class="fas fa-star"></i>
                    @endfor
                    @if ($hotel->rating % 1 != 0)
                        <i class="fas fa-star-half-alt"></i>
                    @endif
                </div>
            </div>
        </div>
        <div class="hotel-images">
            <img src="{{ asset('storage/' . $hotel->gambar) }}" alt="Gambar Hotel">
        </div>
        <div class="hotel-info">
            <div class="price">Rp {{ number_format($hotel->harga, 2) }}</div>
            <div class="address">{{ $hotel->lokasi }}</div>
            <a href="{{ $hotel->lokasi }}" class="maps" target="_blank"><i class="fas fa-map-marker-alt"></i> Rute</a>
            <a href="/catatan/tambah" class="add-note" id="add-note-link">Tambah ke Catatan</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
<style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgba(67, 104, 80, 0.5);
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .hotel-card {
            margin-top: 180px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .hotel-header {
            text-align: center;
            margin-bottom: 30px;
            margin-top: 30px;
        }
        .hotel-header h1 {
            font-size: 28px;
            margin: 0;
            color: rgba(67, 104, 80, 1);
            margin-bottom: 10px;
        }
        .hotel-header .stars {
            color: #ffc107;
        }
        .hotel-header .rating {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hotel-header .rating span {
            margin-left: 10px;
            font-size: 18px;
            color: #333;
        }
        .hotel-images {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            margin-bottom: 20px;
        }
        .hotel-images img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }
        .hotel-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .hotel-info .price {
            font-size: 24px;
            margin-bottom: 10px;
            color: rgba(67, 104, 80, 1);
        }
        .hotel-info .address {
            font-size: 16px;
            margin-bottom: 10px;
            color: #666;
        }
        .hotel-info .maps,
        .hotel-info .add-note {
            font-size: 16px;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 10px;
            display: inline-block;
        }
        .hotel-info .maps {
            background-color: rgba(67, 104, 80, 1);
        }
        .hotel-info .maps:hover {
            background-color: rgba(67, 104, 80, 0.5);
        }
        .hotel-info .add-note {
            background-color: rgba(67, 104, 80, 1);
        }
        .hotel-info .add-note:hover {
            background-color: rgba(67, 104, 80, 0.5);
        }
    </style>