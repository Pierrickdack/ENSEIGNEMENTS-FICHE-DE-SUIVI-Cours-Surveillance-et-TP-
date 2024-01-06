<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FicheController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DelegueController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AuthDelegueController;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/signin', function () {
    return view('signin/signindel');
})->name('signin');

Route::get('/signinprof', function () {
    return view('signin/signinprof');
})->name('signinprof');

Route::get('/signinchef', function () {
    return view('signin/signinchef');
})->name('signinchef');

Route::post('/delegue', function () {
    return view('delegue/accueil');
})->name('delegue');

Route::get('/fiche', function () {
    return view('delegue/fiche');
})->name('fiche');

Route::get('/accueilDel', function () {
    return view('delegue/accueil');
})->name('accueilDel');




Route::post('/delegue/accueil', [AuthDelegueController::class, 'login'])->name('delegue.login');
Route::post('/enregistrer-fiche', [FicheController::class, 'enregistrerFiche'])->name('enregistrer-fiche');

// Routes du MenuList
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/delegue', [DelegueController::class, 'index'])->name('delegue');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');

// Route::get('/analytics', [FicheController::class, 'index'])->name('analytics');
// routes/web.php





// Route::get('/analytics', [FicheController::class, 'index']);
// Route pour afficher toutes les fiches
Route::get('/fiches', [FicheController::class, 'showFiches'])->name('fiches.index');

// Route pour supprimer une fiche
//Route::delete('/fiches/{fiche}', [FicheController::class, 'destroyFiche'])->name('fiches.destroy');

Route::delete('/fiches/{fiche}', [AnalyticsController::class, 'destroy'])->name('fiche.destroy');


