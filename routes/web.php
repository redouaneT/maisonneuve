<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\EtudiantController as AdminEtudiantController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\CustomAuthController;
use App\Http\Controllers\ArticleController;

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
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');



/**
 * admin  routes
 *
 */
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.home')->middleware('auth');
Route::get('/admin/home', [DashboardController::class, 'index'])->name('admin.home')->middleware('auth');

Route::get('/admin/etudiant/index', [AdminEtudiantController::class, 'index'])->name('admin.etudiant.index')->middleware('auth');
Route::get('/admin/etudiant/create', [AdminEtudiantController::class, 'create'])->name('admin.etudiant.create')->middleware('auth');
Route::post('/admin/etudiant/create', [AdminEtudiantController::class, 'store'])->name('admin.etudiant.store')->middleware('auth');
Route::get('/adminetudiant/edit/{etudiant}', [AdminEtudiantController::class, 'edit'])->name('admin.etudiant.edit')->middleware('auth');
Route::put('/adminetudiant/edit/{etudiant}', [AdminEtudiantController::class, 'update'])->name('admin.etudiant.update')->middleware('auth');
Route::delete('/adminetudiant/edit/{etudiant}', [AdminEtudiantController::class, 'destroy'])->name('admin.etudiant.delete')->middleware('auth');
route::get('/admin/etudiant/show/{etudiant}', [AdminEtudiantController::class, 'show'])->name('admin.etudiant.show')->middleware('auth');

/**
 * student etudiant routes
 *
 */

Route::get('/etudiant/create', [EtudiantController::class, 'create'])->name('etudiant.create')->middleware('auth');
Route::post('/etudiant/create', [EtudiantController::class, 'store'])->name('etudiant.store')->middleware('auth');
Route::get('etudiant/edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit')->middleware('auth');
Route::put('etudiant/edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update')->middleware('auth'); // Modification de profil étudiant
route::get('/etudiant/show/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show')->middleware('auth'); // Consultation de profil étudiant

// Auth::routes();

Route::get('registration', [CustomAuthController::class, 'create'])->name('user.registration');
Route::post('registration', [CustomAuthController::class, 'store']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication']);
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout')->middleware('auth');

// CRUD routes for Articles

Route::resource('articles', ArticleController::class)->middleware('auth');
Route::get('/my-articles', [App\Http\Controllers\ArticleController::class, 'myArticles'])->name('articles.my')->middleware('auth');
