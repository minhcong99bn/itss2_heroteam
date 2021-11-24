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

// Route::group([])middleware(['auth:sanctum', 'verified'])->get('/', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group([
    'middleware' => ['auth:sanctum', 'verified']
], function () {
    Route::get('/', function () {
        return view('collection.home');
    })->name('dashboard');
    
    Route::get('/collection', function () {
        return view('collection.index');
    })->name('collection.index');

    Route::get('/collection/create', function () {
        return view('collection.create-collection');
    })->name('collection.create-collection');

    Route::get('/collection/index', function () {
        return view('collection.index-card');
    })->name('collection.index-card');

    Route::get('/schedule', function () {
        return view('collection.schedule');
    })->name('collection.schedule');
});


