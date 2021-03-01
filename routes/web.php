<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class,'index'])->name('welcome');

//dashboard
route::get('/home','App\Http\Controllers\HomeController@index')->name('dashboard');

//user
route::get('/user','App\Http\Controllers\UserController@index')->name('user.index');
route::post('/user/post',[\App\Http\Controllers\UserController::class,'store'])->name('user.store');
route::put('/user/{user}',[\App\Http\Controllers\UserController::class,'update'])->name('user.update');
route::delete('/user/{user}',[\App\Http\Controllers\UserController::class,'destroy'])->name('user.destroy');

//profil
route::get('/profil',[\App\Http\Controllers\ProfilController::class,'index'])->name('profil.index');
route::post('/profil',[\App\Http\Controllers\ProfilController::class,'store'])->name('profil.store');
route::put('/profil/{profil}',[\App\Http\Controllers\ProfilController::class,'update'])->name('profil.update');
route::delete('/profil/{profil}',[\App\Http\Controllers\ProfilController::class,'destroy'])->name('profil.destroy');

//articles
route::get('/article',[\App\Http\Controllers\ArticleController::class,'index'])->name('article.index');
route::post('/article',[\App\Http\Controllers\ArticleController::class,'store'])->name('article.store');
route::put('/article/{article}',[\App\Http\Controllers\ArticleController::class,'update'])->name('article.update');
route::delete('/article/{article}',[\App\Http\Controllers\ArticleController::class,'destroy'])->name('article.destroy');

//categorie
route::get('/categorie',[CategorieController::class,'index'])->name('categorie.index');
route::post('/categorie',[CategorieController::class,'store'])->name('categorie.store');
route::put('/categorie/{categorie}',[CategorieController::class,'update'])->name('categorie.update');
route::delete('/categorie/{categorie}',[CategorieController::class,'destroy'])->name('categorie.destroy');

//reservations
route::get('/reservation', [ReservationController::class, 'index'])->name('reservation.index');
route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
route::put('/reservation/{reservation}', [ReservationController::class, 'update'])->name('reservation.update');
route::delete('/reservation/{reservation}', [ReservationController::class, 'destroy'])->name('reservation.delete');

//frontend-Menu
route::get('/special',[ArticleController::class,'special'])->name('menu.special');
route::get('/brakefast',[ArticleController::class, 'brakefast'])->name('menu.brakefast');
route::get('/lunch',[ArticleController::class, 'lunch'])->name('menu.lunch');
route::get('/dinner',[ArticleController::class, 'dinner'])->name('menu.dinner');

