<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\App\Dashboard;
use App\Livewire\App\CreateUrl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ShortUrl;
use App\Livewire\App\Result;
use App\Livewire\App\RiwayatUrl;

// Auth
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
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

// Redirect url
Route::get('/{code}', function ($code) {
  $short = ShortUrl::where('short_url', $code)->first();

  if (!$short || ($short->expired_at && now()->gt($short->expired_at))) {
    abort(404);
  }

  $short->increment('visit_count');
  return redirect($short->url);
})->where('code', '[A-Za-z0-9]{6}');
