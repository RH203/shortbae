<?php

use App\Livewire\App\CreateUrl;
use App\Livewire\App\Dashboard;
use App\Livewire\App\Result;
use App\Livewire\App\RiwayatUrl;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\App\RedirectUrl;
use App\Livewire\App\Akun;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Livewire\Auth\VerifyEmail;

// Auth
Route::middleware('throttle:20,1')->group(function () {
  Route::get('/login', Login::class)->name('login');
  Route::get('/register', Register::class)->name('register');
});

Route::post('/logout', function (Request $request) {
  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect()->route('login');

})->middleware(['auth', 'role:user|admin'])->name('logout');


Route::middleware(['auth', 'role:user|admin'])->group(function () {
  Route::get('/', Dashboard::class)->name('index');
  Route::get('create-url', CreateUrl::class)->name('create.url');
  Route::get('/url/{id}', Result::class)->name('result');
  Route::get('/riwayat-url', RiwayatUrl::class)->name('riwayat.url');
});

Route::get('/profile', Akun::class)->name('profile')->middleware('auth', 'role:user|admin');

// Redirect url
Route::get('/{code}', RedirectUrl::class)->where('code', '[\w\-]+');


// Verify email
Route::get('/email/verify', VerifyEmail::class)
  ->middleware('auth')
  ->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
  $request->fulfill();

  return redirect()->route('index');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
  $request->user()->sendEmailVerificationNotification();

  return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
