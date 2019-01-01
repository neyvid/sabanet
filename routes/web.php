<?php
////Routes For FrontEnd Application with NameSpace FrontEnd
//Route::group(['namespace' => 'Frontend'], function () {
//    Route::get('/', function () {
//        return view('home');
//    });
//});
//
////Routes For Admin Application with NameSpace admin and Prefix Admin(prefix for before route for exp /admin/home)
//Route::group(['prefix' => 'Admin', 'namespace' => 'admin'], function () {
//
//});

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
Route::get('/admin', function () {
    return view('admin');
})->name('admin');
