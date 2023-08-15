<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categorieController;
use App\Http\Controllers\produitController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/boutique/ajouter-categorie', [categorieController::class, 'index'])->name('categorie.index');
Route::post('/boutique/ajouter-categorie', [categorieController::class, 'store'])->name('categorie.store');


Route::get('/boutique/gerer-produit', [produitController::class, 'index'])->name('produit.index');
Route::post('/boutique/gerer-produit', [produitController::class, 'store'])->name('produit.store');
Route::delete('/boutique/gerer-produit/{id}', [produitController::class, 'effacer'])->name('produit.effacer');
Route::get('/boutique/gerer-produit/{id}/edit', [produitController::class, 'edit'])->name('produit.edit');
Route::put('/boutique/gerer-produit/{id}', [produitController::class, 'update'])->name('produit.update');
Route::get('/boutique/afficher', [produitController::class, 'afficher'])->name('produit.afficher');
