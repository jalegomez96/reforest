<?php

use App\Http\Controllers\LotOfTreeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TreeSpeciesController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/treespecie', [TreeSpeciesController::class, 'getIndex'])->name('tree_specie.getIndex');
Route::get('/treespecie/show/{id}', [TreeSpeciesController::class, 'getShow'])->name('tree_specie.getShow');

Route::group(['middleware' => ['role:admin']], function () {
    //
    Route::get('/treespecie/create', [TreeSpeciesController::class, 'getCreate'])->name('tree_specie.getCreate');
    Route::get('/treespecie/edit/{id}', [TreeSpeciesController::class, 'getEdit'])->name('tree_specie.getEdit');
    Route::post('/treespecie/create', [TreeSpeciesController::class, 'postCreate'])->name('tree_specie.postCreate');
    Route::put('/treespecie/edit', [TreeSpeciesController::class, 'putEdit'])->name('tree_specie.putEdit');
    Route::delete('/treespecie/delete', [TreeSpeciesController::class, 'delete'])->name('tree_specie.delete');

    Route::get('/stock', [StockController::class, 'getIndex'])->name('stock.getIndex');
    Route::get('/stock/show/{id}', [StockController::class, 'getShow'])->name('stock.getShow');
    Route::get('/stock/create', [StockController::class, 'getCreate'])->name('stock.getCreate');
    Route::get('/stock/edit/{id}', [StockController::class, 'getEdit'])->name('stock.getEdit');
    // Route::post('/lotoftree/create', [LotOfTreeController::class, 'postCreate'])->name('lot_of_tree.postCreate');
    Route::put('/stock/edit', [StockController::class, 'putEdit'])->name('stock.putEdit');
    // Route::delete('/lotoftree/delete', [LotOfTreeController::class, 'delete'])->name('lot_of_tree.delete');


    Route::get('/lotoftree/all', [LotOfTreeController::class, 'getAll'])->name('lot_of_tree.getAll');
    Route::put('/lotoftree/approve', [LotOfTreeController::class, 'putApprove'])->name('lot_of_tree.putApprove');
    Route::put('/lotoftree/deny', [LotOfTreeController::class, 'putDeny'])->name('lot_of_tree.putDeny');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/lotoftree', [LotOfTreeController::class, 'getIndex'])->name('lot_of_tree.getIndex');
    Route::get('/lotoftree/show/{id}', [LotOfTreeController::class, 'getShow'])->name('lot_of_tree.getShow');
    Route::get('/lotoftree/create/{id}', [LotOfTreeController::class, 'getCreate'])->name('lot_of_tree.getCreate');
    Route::get('/lotoftree/edit/{id}', [LotOfTreeController::class, 'getEdit'])->name('lot_of_tree.getEdit');
    Route::post('/lotoftree/create', [LotOfTreeController::class, 'postCreate'])->name('lot_of_tree.postCreate');
    Route::put('/lotoftree/edit', [LotOfTreeController::class, 'putEdit'])->name('lot_of_tree.putEdit');
    Route::delete('/lotoftree/delete', [LotOfTreeController::class, 'delete'])->name('lot_of_tree.delete');
});
