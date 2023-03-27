<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\PortfolioController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/portfolios/{id}', [PortfolioController::class, 'show'])->name('portfolios.show');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blog.show');