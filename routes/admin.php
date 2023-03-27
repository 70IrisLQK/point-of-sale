<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeSlideController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
  Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
  Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
  Route::post('/edit-profile', [AdminController::class, 'editProfile'])->name('admin.edit-profile');
  Route::get('/change-password', [AdminController::class, 'changePassword'])->name('admin.password');
  Route::post('/update-password', [AdminController::class, 'updatePassword'])->name('admin.update-password');

  // Home slider route
  // Route::get('/home-sliders/{id}', [HomeSlideController::class, 'destroy'])
  //   ->name('home-sliders.destroy');
  Route::resource('home-sliders', HomeSlideController::class);


  // Home about route
  // Route::get('/about/{id}', [AboutController::class, 'destroy'])
  //   ->name('about.destroy');
  Route::resource('about', AboutController::class);
});