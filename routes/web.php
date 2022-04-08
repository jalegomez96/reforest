<?php

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

Route::group(['middleware' => ['role:admin']], function () {
    //
    Route::get('/treespecie', [TreeSpeciesController::class, 'getIndex'])->name('tree_specie.getIndex');
    Route::get('/treespecie/show/{id}', [TreeSpeciesController::class, 'getShow'])->name('tree_specie.getShow');
    Route::get('/treespecie/create', [TreeSpeciesController::class, 'getCreate'])->name('tree_specie.getCreate');
    Route::get('/treespecie/edit/{id}', [TreeSpeciesController::class, 'getEdit'])->name('tree_specie.getEdit');
    Route::post('/treespecie/create', [TreeSpeciesController::class, 'postCreate'])->name('tree_specie.postCreate');
    Route::put('/treespecie/edit', [TreeSpeciesController::class, 'putEdit'])->name('tree_specie.putEdit');
    Route::delete('/treespecie/delete', [TreeSpeciesController::class, 'delete'])->name('tree_specie.delete');
});
