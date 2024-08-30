<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('post.show');
Route::post('/posts/{slug}', [CommentController::class, 'store'])->name('post.comment')->middleware('auth');

Route::get('/login', [AuthController::class, 'login_form'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [UserController::class, 'create'])->name('register.form');
Route::post('/register', [UserController::class, 'store'])->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/profile/', [UserController::class, 'show'])->name('profile')->middleware('auth');
Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/newpost', [PostController::class, 'create'])->name('post.create')->middleware('auth');
Route::post('/newpost', [PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit')->middleware('auth');
Route::post('/edit/{id}', [PostController::class, 'update'])->name('post.update')->middleware('auth');
Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('post.delete')->middleware('auth');
