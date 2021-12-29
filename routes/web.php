<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ScheduleController;

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
    
    Route::get('/collection', [CollectionController::class, 'index'])->name('collection.index');
    Route::post('/collection', [CollectionController::class, 'store'])->name('collection.store');

    Route::get('/collection/create/{id}', [CollectionController::class, 'createCard'])->name('collection.create-collection');
    Route::post('/collection/update/{id}', [CollectionController::class, 'update'])->name('collection.update');
    Route::post('/collection/card/store', [CollectionController::class, 'storeCard'])->name('card.store');
    Route::get('/collection/card/show', [CollectionController::class, 'showCard'])->name('collection.show-card');
    Route::post('/collection/card/update', [CollectionController::class, 'updateCard'])->name('collection.update-card');
    Route::delete('/collection/card/destroy', [CollectionController::class, 'deleteCard'])->name('collection.delete-card');
    Route::delete('/collection/destroy', [CollectionController::class, 'delete'])->name('collection-delete');
    Route::get('/collection/index', [CollectionController::class, 'showCollection'])->name('collection.index-card');
    Route::get('/card/show', [CardController::class, 'index'])->name('card.index');
 
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('collection.schedule');
    Route::get('/card/easy', [ScheduleController::class, 'setSchedule'])->name('card.schedule.easy');
    Route::post('/schedule/update', [ScheduleController::class, 'update'])->name('schedule.update');
    Route::get('/schedule/collection', [ScheduleController::class, 'show'])->name('schedule.collection');
});
