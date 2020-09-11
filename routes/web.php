<?php

use App\Http\Controllers\TodoController;
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

Route::redirect('/', '/todo')->name('index');

Route::group([
    'prefix' => 'todo',
    'as' => 'todo.'
], function () {
    Route::get('/', [TodoController::class, 'index'])->name('index');
    Route::get('/create', [TodoController::class, 'create'])->name('create');
    Route::post('/', [TodoController::class, 'store'])->name('store');
    Route::get('/{id}', [TodoController::class, 'show'])->name('show');
    Route::put('/{id}/toggleDone', [TodoController::class, 'toggleDone'])->name('toggleDone');
});
