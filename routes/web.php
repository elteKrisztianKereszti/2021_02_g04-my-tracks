<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\TransposerController;

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
    return view('index');
})->name('home');

Route::view('/about', 'about')->name('about');

Route::resource('projects', ProjectController::class);
Route::resource('projects.tracks', TrackController::class)->shallow()->except(['index']);

Route::get('/projects/1/tracks/create', [ProjectController::class, 'create_tracks']);

// Transposer
Route::get('/transposer', [TransposerController:: class, 'index'])->name('transposer');
Route::post('/transposer', [TransposerController:: class, 'transpose'])->name('dotransposer');

Auth::routes();

