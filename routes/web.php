<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicDetailController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'App\Http\Controllers\HomePageController@index');
Route::get('/detail', 'App\Http\Controllers\ComicDetailController@index');
Route::post('/fav', [ComicDetailController::class, 'markAsFavourite'])->name('comic.markAsFavourite');
Route::get('/fav', [ComicDetailController::class, 'getFavourites'])->name('comic.seeFavs');