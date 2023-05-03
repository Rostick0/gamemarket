<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\GameBuyersController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'show'])->name('main');

Route::get('/catalog', [CatalogController::class, 'show'])->name('catalog');

Route::get('/login', [LoginController::class, 'show'])->name('login');

Route::post('/login', [LoginController::class, 'store']);

Route::get('/registration', [RegistrationController::class, 'show'])->name('registration');

Route::post('/registration', [RegistrationController::class, 'store']);

Route::get('/game/{id}', [GameController::class, 'show'])->name('game');
Route::post('/game/{id}', [GameBuyersController::class, 'buy']);

Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');
Route::get('/profile-edit', [ProfileEditController::class, 'show'])->name('profile_edit')->middleware('auth');
Route::post('/profile-edit', [ProfileEditController::class, 'edit'])->middleware('auth');
Route::post('/profile-delete', [ProfileEditController::class, 'delete'])->name('profile_delete')->middleware('auth');
Route::get('/profile-exit', [ProfileController::class, 'logout'])->name('profile_exit');

Auth::routes([
    'login' => false,
    'registration' => false
]);