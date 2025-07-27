<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\Auth\welcomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\JadwalBusController;

// Tampilan awal (menu user/admin)
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Untuk menampilkan semua user
Route::get('/users', [UserController::class, 'index']);

// Untuk menampilkan user 
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/login.user', function () { return view('auth.auth');})->name('auth');
Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('auth');

// Route POST
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [registerController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk form lupa password
Route::get('/forgot-password', function () {return view('auth.forgot'); });
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/kirim-kode-verifikasi', [ForgotPasswordController::class, 'sendVerificationCode']);

// Route untuk kirim email reset password
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Route untuk form reset password yang diklik lewat email
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Route untuk update password baru
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/test-email', function () {
    Mail::raw('Ini email test dari Laravel', function ($message) {
        $message->to('alamatemailtujuan@gmail.com') // ganti ke email tujuan test
                ->subject('Test Email Laravel');
    });

    return 'Email sudah dikirim!';
});

// Route ke dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/data-diri', [PesanController::class, 'storeDataDiri'])->name('store.datadiri');
Route::post('/batal', [PesanController::class, 'batal'])->name('batal');
Route::get('/jadwal', [JadwalBusController::class, 'index'])->name('jadwal-bus');

