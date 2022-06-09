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
    return view('main');
});

Route::get('/task', function () {
    return view('task');
})->middleware(['auth'])->name('task');

require __DIR__.'/auth.php';

Route::view('/{any}', 'task')
    ->middleware('auth')
    ->where('any', '.*');
