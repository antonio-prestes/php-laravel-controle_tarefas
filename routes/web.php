<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

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

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->middleware('verified')->name('home');
Route::get('/task/create', [TaskController::class, 'create'])->middleware('verified')->name('create');
Route::post('/task/store', [TaskController::class, 'store'])->middleware('verified')->name('store');
Route::get('/task/show/{task}', [TaskController::class, 'show'])->middleware('verified')->name('show');
Route::get('/task', [TaskController::class, 'index'])->middleware('verified')->name('index');
Route::get('/task/{task}/edit', [TaskController::class, 'edit'])->middleware('verified')->name('edit');
Route::post('/task/{task}/update', [TaskController::class, 'update'])->middleware('verified')->name('update');
Route::delete('/task/{task}/delete', [TaskController::class, 'destroy'])->middleware('verified')->name('delete');
Route::get('/task/export/{format}', [TaskController::class, 'export'])->middleware('verified')->name('export');
Route::get('/task/exportDOM', [TaskController::class, 'exportDOM'])->middleware('verified')->name('exportDOM');
