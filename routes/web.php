<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CategoryController;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;


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
    return view('pages.homepage', ['albums' => Album::all()]);
});

// About Page
Route::get('/about', function () {
    return view('pages.about');
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


// Single - Album
Route::get('/album/{id}', [AlbumController::class, 'show']);

// Archive - Album
Route::get('/albums/', function()
{
    return view('pages.archive.album', ['albums' => Album::all()]);
});

// Archive - Artist
Route::get('/artists/', function()
{
    return view('pages.archive.artist', ['artists' => Artist::all()]);
});

// Single - Artist
Route::get('/artist/{id}', [ArtistController::class, 'show']);

// Archive - Song
Route::get('/songs', function()
{
    return view('pages.archive.song', ['songs' => Song::all()]);
});

// Single - Song
Route::get('/song/{id}', [SongController::class, 'show']);

Route::resource('dashboard/artist', ArtistController::class);
Route::resource('dashboard/song', SongController::class);
Route::resource('dashboard/album', AlbumController::class);
Route::resource('dashboard/category', CategoryController::class);



