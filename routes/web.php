<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
//
//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'name' => 'Astrit Kurtishaj'
//    ]);
//});



Route::get('/items', [ItemController::class, 'index'])->name('items.index');

Route::post('/store', [ItemController::class, 'store'])->name('item.store');

Route::delete('/items/{id}', [ItemController::class, 'destroy']);

Route::put('/items/{id}', [ItemController::class, 'isCompleted']);
