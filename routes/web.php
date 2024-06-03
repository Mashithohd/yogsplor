<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\MoreController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\RincianController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\Admin\MakanController;
use App\Http\Controllers\Admin\AdminKabupatenController;
use App\Http\Controllers\HotelUserController;
use App\Http\Controllers\MakanUserController;
use App\Http\Controllers\WisataUserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserKabupatenController;
use App\Http\Controllers\NoteController;

Route::post('/api/save-notes', [NoteController::class, 'saveNotes']);
Route::get('/api/generate-pdf', [NoteController::class, 'generatePDF']);
Route::get('/api/view-pdf', [NoteController::class, 'viewPDF']);


// Routes for user authentication
Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome')->middleware('web');
Route::get('/kabupaten/{kabupaten}', [UserKabupatenController::class, 'show'])->name('user.kabupaten.index');
Route::get('/hotel/{id}', [HotelUserController::class, 'show'])->name('hotel.show');
Route::get('/wisata/{id}', [WisataUserController::class, 'show'])->name('wisata.show');
Route::get('/makan/{id}', [MakanUserController::class, 'show'])->name('makan.show');

// routes/web.php

Route::get('/hotels', [App\Http\Controllers\HotelUserController::class, 'index'])->name('hotels.index');
Route::get('/hotels/{id}', [App\Http\Controllers\HotelUserController::class, 'show'])->name('hotels.show');

// Route for getting hotel details as JSON
Route::get('/api/hotel/{id}', [App\Http\Controllers\HotelUserController::class, 'getHotelDetails'])->name('hotels.details');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes for admin authentication
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// Routes for other functionalities (registration, profile, etc.)
// User registration
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


// User profile
    Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil', [ProfilController::class, 'update'])->name('profil.update');
    Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show')->middleware('auth');
Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update')->middleware('auth');


    Route::get('/catatan', [CatatanController::class, 'index'])->name('catatan.index');
    Route::get('/catatan', [CatatanController::class, 'show'])->name('catatan.show');
    Route::post('/api/save-notes', [CatatanController::class, 'saveNotes']);
    Route::get('/catatan/tambah/{id_hotel}', [CatatanController::class, 'tambah'])->name('catatan.tambah');
    Route::post('/catatan/tambah', [CatatanController::class, 'tambah'])->name('catatan.store');



// Routes for admin panel
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('hotels', HotelController::class)->names('admin.hotels');
    Route::resource('makans', MakanController::class)->names('admin.makans');
    Route::resource('wisatas', WisataController::class)->names('admin.wisatas');
    Route::resource('kabupatens', AdminKabupatenController::class)->names('admin.kabupaten');
});

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
});
