<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

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


Route::get('/', [ArticleController::class, 'index'])->name('articles');

Route::get('/hello', function() {
    return 'Hello world!';
});

Route::get('/message', function() {
    return response()->json(['statut'=>200, 'message'=>'Message Json']);
});

Route::get('/article/{id}', [ArticleController::class, 'show'])->name('single');

Route::get('/reservation/{debut}/{fin}', function($debut, $fin) {
    return 'Date début : '.$debut.' | Date fin : '.$fin;
});

Route::get('/create', [ArticleController::class, 'create'])->name('create');
Route::post('/article', [ArticleController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('edit');
Route::put('/article/{id}', [ArticleController::class, 'update'])->name('update');
Route::delete('/article/{id}', [ArticleController::class, 'destroy'])->name('destroy');
Route::resource('comments',CommentController::class);

