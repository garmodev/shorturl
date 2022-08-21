<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortURLController;
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
Route::get('/block', function () {
    return view('block');
});
Route::get('shortURL', [ShortURLController::class, 'index']);
Route::post('store', [ShortURLController::class, 'store']);
Route::resource('url', ShortURLController::class);
Route::get('{old_url}', [ShortURLController::class,'edit'])->name('ShortURL.Link');
