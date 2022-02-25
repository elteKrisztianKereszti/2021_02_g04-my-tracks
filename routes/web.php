<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TransposerController;
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
    return view('index');
});

// Route::get('/projects', function () {
//     return view('projects/index');
// });
//Route::view('/projects', 'projects.index');
Route::get('/projects', [ProjectController::class, 'index'])->name('foo');
Route::get('/projects/create', [ProjectController::class, 'create']);
Route::get('/projects/1', [ProjectController::class, 'detail']);
Route::get('/projects/1/tracks/create', [ProjectController::class, 'create_task']);
Route::get('/transposer', [TransposerController::class, 'index']);
