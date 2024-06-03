@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container-fluid p-5 profile">
    <div class="sidebar p-3">
        <div class="user-profile mb-2 fs-4 fw-bold" style="font-size:30px">User Profile</div>
        <div class="user-info mb-2">
            <a href="{{ route('profil.show') }}" class="nav-link">User Info</a>
        </div>
        <div class="mt-auto d-flex align-items-center justify-content-center">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="btn btn-danger">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
    </div>

    <div class="line-15 my-3"></div>

    <div class="profile-content">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('profil.update', optional($user)->id) }}" method="POST" enctype="multipart/form-data">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @csrf
            @method('PUT')
            <div class="container-11 mb-3 d-flex align-items-center">
                <div class="position-relative me-2 photo-container">
                    @if ($user->photo)
                        <img src="{{ Storage::url('public/profil/' . $user->photo) }}" class="rounded-circle photo"
                            alt="Profile Photo" width="90" height="90">
                    @else
                        <img src="{{ asset('assets/images/default-profile.png') }}" class="rounded-circle photo"
                            alt="Default Profile Photo" width="113" height="113">
                    @endif
                    <label for="photo"
                        class="position-absolute top-0 start-0 translate-middle p-2 bg-primary text-white rounded-circle photo-label"
                        style="cursor: pointer;">
                        <i class="bi bi-pencil-fill"></i>
                        <input type="file" id="photo" name="photo" class="d-none">
                    </label>
                </div>
                <div>
                    <div class="hello-delwyn mb-1">Hello, {{ $user->name }}</div>
                    <span class="malang">{{ $user->alamat }}</span>
                </div>
            </div>
            <div class="user-details">
                <div class="d-flex flex-wrap">
                    <div class="container-input mb-3 d-flex align-items-center me-3">
                        <label for="username" class="me-3 username">Username</label>
                        <input type="text" id="username" name="username" class="form-control delwyn-zevanna fw-bold"
                            value="{{ $user->name }}">
                    </div>
                    <div class="container-input mb-3 d-flex align-items-center">
                        <label for="password" class="me-3 password">Password</label>
                        <input type="password" id="password" name="password" class="form-control fw-bold"
                            placeholder="Enter new password if you want to change">
                    </div>
                </div>
                <div class="d-flex flex-wrap">
                    <div class="container-input mb-3 d-flex align-items-center me-3">
                        <label for="email" class="me-3 email">Email</label>
                        <input type="email" id="email" name="email" class="form-control delwynnzvngmail-com fw-bold"
                            value="{{ $user->email }}">
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="fw-bold btn btn-danger">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
