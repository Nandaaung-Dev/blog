<?php

use App\Http\Controllers\ArticleController;
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
Route::get('/', [ArticleController::class, 'index']);
Route::get('articles', [ArticleController::class , 'index'])->name('articles.index');
Route::get('articles/detail/{id}', [ArticleController::class, 'detail'])->name('articles.detail');