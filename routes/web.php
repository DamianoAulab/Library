<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AnnouncementController;

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

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/{macro}', [PublicController::class, 'macro'])->name('macro');
Route::post('/annunci/cerca', [PublicController::class, 'search'])->name('search');

Route::get('/annunci/crea', [AnnouncementController::class, 'create'])->middleware('auth')->name('announcements.create');
Route::get('/annunci/{announcement}/modifica', [AnnouncementController::class, 'edit'])->name('announcements.edit');
Route::get('/annunci/{announcement}/dettagli', [AnnouncementController::class, 'show'])->name('announcements.show');
Route::get('/annunci', [AnnouncementController::class, 'index'])->name('announcements.index');

Route::get('/categorie/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/profilo/{profile}', [UserController::class, 'show'])->name('users.show');
Route::get('/profilo/{profile}/modifica', [UserController::class, 'edit'])->name('users.edit');
Route::put('/profilo/{profile}/update', [UserController::class, 'update'])->name('users.update');