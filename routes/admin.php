<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeSlideController;
use App\Http\Controllers\Home\MultiImagesController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth', 'verified')->group(function () {
  Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
  Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
  Route::post('/edit-profile', [AdminController::class, 'editProfile'])->name('admin.edit-profile');
  Route::get('/change-password', [AdminController::class, 'changePassword'])->name('admin.password');
  Route::post('/update-password', [AdminController::class, 'updatePassword'])->name('admin.update-password');

  // Home slider route
  Route::resource('home-sliders', HomeSlideController::class)->only(['index', 'edit', 'update']);


  // Home about route
  Route::resource('about', AboutController::class)->only(['index', 'edit', 'update']);

  // Home about's image route
  Route::resource('images', MultiImagesController::class)->only(['index', 'edit', 'update']);
});