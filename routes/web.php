<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
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

//Rotte generali
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/macrocategoria/{macro}', [PublicController::class, 'macro'])->name('macro');
Route::post('/annunci/cerca', [PublicController::class, 'search'])->name('search');

//Rotte categorie
Route::get('/lista-annunci', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/annunci/crea', [AnnouncementController::class, 'create'])->middleware('auth')->name('announcements.create');
Route::get('/annunci/{announcement}/modifica', [AnnouncementController::class, 'edit'])->middleware('auth')->name('announcements.edit');
Route::get('/annunci/{announcement}/dettagli', [AnnouncementController::class, 'show'])->name('announcements.show');
Route::delete('annunci/{announcement}', [AnnouncementController::class, 'destroy'])->middleware('auth')->name('announcements.destroy');

Route::get('/categorie/{category}', [CategoryController::class, 'show'])->name('categories.show');

//Rotte profilo
Route::get('/profilo/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/profilo/{user}/modifica', [UserController::class, 'edit'])->name('users.edit');
Route::put('/profilo/{user}/update', [UserController::class, 'update'])->name('users.update');

//Rotte profilo revisore
Route::get('/revisore/annunci', [RevisorController::class, 'index'])->middleware('auth', 'isRevisor')->name('revisor.index');
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');
Route::post('/revisore/anunncio-undo/{announcement}', [RevisorController::class, 'undoAnnouncement'])->middleware('isRevisor')->name('revisor.undo_announcement');

//Rotte richiesta diventare revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/richiesta/revisore/{user}', [RevisorController::class, 'makeRevisor'])->middleware('auth')->name('make.revisor');


//rotta per ricerca annunci
Route::get('/ricerca/annuncio', [PublicController::class, 'searchAnnouncements'])->name('announcements.search');



Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('socialite.login.google');
 
Route::get('/login/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();
 


      $user = User::updateOrCreate(
        [
   
        'name' => $googleUser->name,
        'email' => $googleUser->email,
        'gender' => 'Non binario',
        'phone' => ' ' ,
        'password' => bcrypt(''),
        ]
);
 
    Auth::login($user);
 
    return redirect('/');

    
});

    