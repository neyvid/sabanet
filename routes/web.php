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
    return view('home');
});
Route::get('/ourservice', function () {
    return view('page');
})->name('ourService');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/regsiter', function () {
    return view('register');
})->name('register');