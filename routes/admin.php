<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\HomeSlideController;
use App\Http\Controllers\Home\MultiImagesController;
use App\Http\Controllers\Home\PortfolioController;
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

  // Home portfolio route
  Route::resource('portfolios', PortfolioController::class);

  // Blog Category route
  Route::resource('categories', BlogCategoryController::class);

  // Blog route
  Route::resource('blogs', BlogController::class);
});