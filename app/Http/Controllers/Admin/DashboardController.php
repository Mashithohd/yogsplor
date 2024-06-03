<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Wisata;
use App\Models\Makan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $hotels = Hotel::count();
        $tempatWisata = Wisata::count();
        $tempatMakan = Makan::count();
        $users = User::count();
        return view('admin.dashboard', compact('hotels', 'tempatWisata', 'tempatMakan', 'users'));
    }
}

