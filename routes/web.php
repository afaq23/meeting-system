<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use APP\Http\Controllers\MeetingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/add', [App\Http\Controllers\MeetingController::class, 'add'])->name('add');
    Route::post('/adding-data', [App\Http\Controllers\MeetingController::class, 'adding_data'])->name('adding_data');
    Route::get('/all-data', [App\Http\Controllers\MeetingController::class, 'all_data'])->name('all_data');
    Route::get('/all-data/delete/{id}', [App\Http\Controllers\MeetingController::class, 'delete_data']);
    Route::get('/all-data/edit/{id}', [App\Http\Controllers\MeetingController::class, 'edit_data']);
    Route::post('/all-data/update/{id}', [App\Http\Controllers\MeetingController::class, 'update_data']);
});
