<?php

use App\Http\Controllers\ArticleController;
use App\Modules\Categories\Http\Controllers\CategoryController;
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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [ArticleController::class, 'index']);
// Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
// Route::get('articles/detail/{id}', [ArticleController::class, 'show'])->name('articles.detail');

// Route::get('/articles/add', [ArticleController::class, 'create']);
// Route::post('/articles/add', [ArticleController::class, 'store']);
// Route::get('/articles/delete/{id}', [ArticleController::class, 'destroy']);
// Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);
// Route::post('/articles/edit/{id}', [ArticleController::class, 'update']);
Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);
