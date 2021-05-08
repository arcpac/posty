<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPostController;
use GuzzleHttp\Psr7\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/post/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/post/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');

// PROFILE ROUTES
Route::get('/profile/{user:username}', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/details/{user:username}', [ProfileController::class, 'details'])->name('profile.details');
Route::get('/profile/credentials/{user:username}', [ProfileController::class, 'credentials'])->name('profile.credentials');

Route::post('/profile/details/{user:username}', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/credentials/{user:username}', [ProfileController::class, 'update_avatar'])->name('profile.update_avatar');
