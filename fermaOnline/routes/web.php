<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignUpController;
use App\Http\Middleware\CheckIfRouteExists;
use App\Http\Controllers\MainPageController;
use Illuminate\Support\Facades\Route;
use app\Http\Middleware\URLRedirect;


Route::get('/', [LoginController::class, 'show'])->name('emptyUrl');

Route::get('/login', [LoginController::class, 'show'])->name('login');

Route::get('/mainPage/{guid_id}', [MainPageController::class, 'show'])->name('mainPage');

Route::get('/profile/{guid_id}', [ProfileController::class, 'show'])->name('profile');

Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');

Route::get('/signup', [SignUpController::class, 'show'])->name('signup');

Route::post('/signup-post', [SignUpController::class, 'signupPost'])->name('signup-post');

Route::post('/login-post', [LoginController::class, 'loginPost'])->name('login-post');

Route::get('/profile/{guid_id}/changePass', [ProfileController::class, 'showChangePassword'])->name('showChangePassword');

Route::post('/profile/{guid_id}/changePass-post', [ProfileController::class, 'changePassword'])->name('changePassword');





