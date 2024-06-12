<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('vendor', [App\Http\Controllers\VendorController::class, 'store']);

Route::get('/add-vendor', function () {
    return view('add-vendor');
})->name('add-vendor');

Route::get('/vendor-details', [App\Http\Controllers\HomeController::class, 'getVendorDetails'])->name('vendor-details');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('login');
})->name('logout');
