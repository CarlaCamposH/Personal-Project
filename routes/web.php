<?php

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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/reload',[App\Http\Controllers\HomeController::class, 'reload']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/phase2', 'fase2');
Route::post('/fase2', [App\Http\Controllers\HomeController::class, 'updateUser']);
Route::get('/profile/{id}', [App\Http\Controllers\HomeController::class, 'showProfile']);
Route::get('/search', [App\Http\Controllers\HomeController::class, 'searchUsers']);
Route::get('/edit', [App\Http\Controllers\HomeController::class, 'editUserView']);
Route::post('/editUser', [App\Http\Controllers\HomeController::class, 'editUser']);
Route::get('/followers/{id}', [App\Http\Controllers\HomeController::class, 'showFollowers']);
Route::get('/following/{id}', [App\Http\Controllers\HomeController::class, 'showFollowing']);

