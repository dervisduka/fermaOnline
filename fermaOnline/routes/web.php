<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignUpController;
use App\Http\Middleware\CheckIfRouteExists;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CompanyDescriptionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AddProductsController;
use App\Http\Controllers\AddAnimalController;
use Illuminate\Support\Facades\Route;
use app\Http\Middleware\URLRedirect;


Route::get('/', [LoginController::class, 'show'])->name('emptyUrl');

Route::get('/login', [LoginController::class, 'show'])->name('login');

Route::get('/animal/{guid_id}', [AnimalController::class, 'show'])->name('animal');

Route::get('/companyDescription/{guid_id}', [CompanyDescriptionController::class, 'show'])->name('companyDescription');

Route::get('/transaction/{guid_id}', [TransactionController::class, 'show'])->name('transaction');

Route::get('/addProducts/{guid_id}', [AddProductsController::class, 'show'])->name('addProducts');

Route::post('/addProduct/{guid_id}', [AddProductsController::class, 'addProduct'])->name('addProduct');

Route::get('/addAnimal/{guid_id}', [AddAnimalController::class, 'show'])->name('addAnimal');

Route::get('/mainPage/{guid_id}', [MainPageController::class, 'show'])->name('mainPage');

Route::put('/update-product/{guid_id}/{product_id}', [MainPageController::class, 'updateProduct'])->name('updateProduct');

Route::get('/profile/{guid_id}', [ProfileController::class, 'show'])->name('profile');

Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');

Route::get('/signup', [SignUpController::class, 'show'])->name('signup');

Route::post('/signup-post', [SignUpController::class, 'signupPost'])->name('signup-post');

Route::post('/login-post', [LoginController::class, 'loginPost'])->name('login-post');

Route::post('/profile/{guid_id}/changePass-post', [ProfileController::class, 'changePassword'])->name('changePassword');

