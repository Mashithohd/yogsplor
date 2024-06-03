@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Hotel</h5>
                        <p class="card-text">{{ $hotels }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Tempat Makan</h5>
                        <p class="card-text">{{ $tempatMakan }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Tempat Wisata</h5>
                        <p class="card-text">{{ $tempatWisata }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Pengguna</h5>
                        <p class="card-text">{{ $users }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .container{
        margin-top: 120px;
    }
</style>