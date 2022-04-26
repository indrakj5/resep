<?php

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
    return view('auth.login');
});

Route::get('/master', function () {
    return view('layout.master');
});

Route::resource('kategori', 'KategoriController');

Route::resource('metode', 'MetodeController');

Route::resource('resep', 'ResepController');
Auth::routes();

//Profile

Route::resource('profile', 'ProfileController')->only([
    'index','update'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('komentar', 'KomentarController')->only([
    'index','store'
]);

