<!-- resources/views/admin/kabupatens/show.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>{{ $kabupaten->nama_kabupaten }}</h1>
    <img src="{{ asset('storage/' .
