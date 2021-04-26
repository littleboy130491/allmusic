<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CategoryController;

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
    return view('pages.home-page');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('dashboard')->group(function () {

    Route::get('/song/create', function () {
        return view('dashboard.song.create');
    });

    Route::post('/song', [SongController::class, 'store']);
    Route::get('/song', [SongController::class, 'index']);

});
  



require __DIR__.'/auth.php';

Route::get('/dashboard/song/create', [SongController::class, 'create']);
Route::get('/dashboard/song/{id}/edit', [SongController::class, 'edit']);
Route::put('/dashboard/song/{id}', [SongController::class, 'update']);
Route::delete('/dashboard/song/{id}', [SongController::class, 'destroy']);

Route::resource('dashboard/artist', ArtistController::class);
Route::resource('dashboard/album', AlbumController::class);
Route::resource('dashboard/category', CategoryController::class);

