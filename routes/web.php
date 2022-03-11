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
// Projects
// Route::get('/projects', [ProjectController::class, 'index'])->name('projects.list');

// Route::get('/projects/{project}/show', [ProjectController::class, 'show'] )->name('projects.show');

// Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
// Route::post('projects/create', [ProjectController::class, 'store'] )->name('projects.store');

// Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'] )->name('projects.edit');
// Route::put('/projects/{project}', [ProjectController::class, 'update'] )->name('projects.update');
// Route::delete('/projects/{project}', [ProjectController::class, 'delete'] )->name('projects.delete');

Route::resource('projects', ProjectController::class);
Route::resource('projects.tracks', TrackController::class)->shallow()->except(['index']);

Route::get('/projects/1/tracks/create', [ProjectController::class, 'create_tracks']);

// Transposer
Route::get('/transposer', [TransposerController:: class, 'index'])->name('transposer');
Route::post('/transposer', [TransposerController:: class, 'transpose'])->name('dotransposer');
