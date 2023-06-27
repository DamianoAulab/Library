<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

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
    
Route::get('/annunci/crea', [AnnouncementController::class, 'create'])->name('announcements.create');
Route::get('/annunci/{announcement}/modifica', [AnnouncementController::class, 'edit'])->name('announcements.edit');
Route::get('/annunci/{announcement}/dettagli', [AnnouncementController::class, 'show'])->name('announcements.show');
