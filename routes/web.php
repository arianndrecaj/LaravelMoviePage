<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SerialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\PremiuminfoController;
use App\Http\Controllers\GlideController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/seriale', [SerialController::class, 'index'])->name('seriale');
Route::get('/premium', [PremiumController::class, 'index'])->name('premium');
Route::get('/premiuminfo', [PremiuminfoController::class, 'index'])->name('premiuminfo');

Route::post('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::post('/search-serial', [SerialController::class, 'search'])->name('search-seriale');

Route::get('/plan', [PremiumController::class, 'update'])->name('plan');





Route::get('/see-description/movie/{id}', [HomeController::class, 'description'])->name('descriptionMovie');
Route::get('/see-description/serial/{id}', [SerialController::class, 'description'])->name('description.serial');


Route::get('/seat/', [HomeController::class, 'seat'])->name('seat');


Route::get('/glide/movie/{image}', [GlideController::class, 'fixImage'])->name('glide.movie');
Route::get('/glide/serial/{image}', [GlideController::class, 'fixSerialImage'])->name('glide.serial');



Route::group(['middleware' => ['admin']], function () {
    Route::delete('/delete-movie/{id}', [HomeController::class, 'delete'])->name('delete.movie');
    Route::delete('/delete-serial/{id}', [SerialController::class, 'delete'])->name('delete.serial');

    Route::get('/add-movie', [ImageController::class, 'showAddMovieForm'])->name('add.movie.form');
    Route::post('/add-movie', [ImageController::class, 'addMovie'])->name('add.movie');

    Route::get('/add-serial', [SerialController::class, 'showAddSerialForm'])->name('add.serial.form');
    Route::post('/add-serial', [SerialController::class, 'addSerial'])->name('add.serial');
});
