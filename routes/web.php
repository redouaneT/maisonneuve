<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomAuthController;

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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::get('/etudiant/index', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/etudiant/create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('/etudiant/create', [EtudiantController::class, 'store'])->name('etudiant.store');
Route::get('etudiant/edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('etudiant/edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('etudiant/edit/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete');
route::get('/etudiant/show/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');

// Auth::routes();

Route::get('registration', [CustomAuthController::class, 'create'])->name('user.registration');
Route::post('registration', [CustomAuthController::class, 'store']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication']);
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout')->middleware('auth');