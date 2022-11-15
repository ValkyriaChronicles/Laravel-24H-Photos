<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'submit_register'])->name('auth.submit_register');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'submit_login'])->name('auth.submit_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/feed', [PhotoController::class, 'index'])->name('photos.index');

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/photos/new', [PhotoController::class, 'create'])->name('photos.create');
    Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
    Route::get('/photos/search', [PhotoController::class, 'search'])->name('photos.search');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
});