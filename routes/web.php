<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Vue.jsの反映を見るためのテストルーティング
Route::get('/hello', function () {
    return view('index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//やんばるアプリから
Route::get('/', [ArticleController::class,'index'])->name('articles.index');
//リソースルートの追加
Route::resource('/articles', ArticleController::class)->except(['index', 'show'])->middleware('auth'); //-- この行を編集
Route::resource('/articles', ArticleController::class)->only(['show']);
Route::prefix('articles')->name('articles.')->group(function () {
    Route::put('/{article}/like', [ArticleController::class,'like'])->name('like')->middleware('auth');
    Route::delete('/{article}/like', [ArticleController::class,'unlike'])->name('unlike')->middleware('auth');
});
Route::get('/tags/{name}', [TagController::class,'show'])->name('tags.show');