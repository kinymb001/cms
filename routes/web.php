<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function (){
    return view('home');
});

Route::prefix('category')->name('categories.')
    ->group(function (){
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('form_add');
        Route::post('/store', [CategoryController::class, 'post'])->name('add_category');
        Route::get('/edit/{id}', [CategoryController::class, 'getEdit'])->name('getEdit');
        Route::post('/edit/{id}', [CategoryController::class, 'postEdit'])->name('postEdit');
        Route::get('/delete/{id}', [CategoryController::class, 'deletedCategory'])->name('deleted');
    });
Route::prefix('tag')->name('tags.')
    ->group(function (){
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('/create', [TagController::class, 'create'])->name('form_add');
        Route::post('/store', [TagController::class, 'post'])->name('add_tag');
        Route::get('/edit/{id}', [TagController::class, 'getEdit'])->name('getEdit');
        Route::post('/post/{id}', [TagController::class, 'postEdit'])->name('postEdit');
    });
