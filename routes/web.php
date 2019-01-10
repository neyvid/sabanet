<?php

//Routes For Admin Application with NameSpace admin and Prefix Admin(prefix for before route for exp /admin/home)

Route::group(['prefix' => 'profile', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'adminController@index')->name('profile.home');
    Route::get('/logout', 'userController@logout')->name('profile.logout');
//    Routes For States
    Route::get('/states', 'StateController@index')->name('profile.state.list'); //show All States
    Route::get('/states/create', 'StateController@create')->name('profile.state.create'); //Show Form for Create State
    Route::post('/states/create', 'StateController@store')->name('profile.state.store'); //state store into database
    Route::get('/states/delete', 'StateController@destroy')->name('profile.state.delete'); //delete state of database
    Route::get('/states/edit', 'StateController@edit')->name('profile.state.edit');// show Form for Edit State
    Route::post('/states/edit', 'StateController@update')->name('profile.state.update'); //store edit of state in database
//   Routes For Cities
    Route::get('/city', 'cityController@index')->name('profile.city.list'); //show All Cities
    Route::get('/city/create', 'CityController@create')->name('profile.city.create'); //Show Form for Create City
    Route::post('/city/create', 'CityController@store')->name('profile.city.store'); //city store into database
    Route::get('/city/delete', 'CityController@destroy')->name('profile.city.delete'); //delete city of database
    Route::get('/city/edit', 'CityController@edit')->name('profile.city.edit');// show Form for Edit City
    Route::post('/city/edit', 'CityController@update')->name('profile.city.update'); //store edit of City in database
});


//Routes For FrontEnd Application with NameSpace FrontEnd

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/login', 'UserController@showLogin')->name('login');
    Route::post('/login', 'UserController@doLogin')->name('doLogin');
    Route::get('/logout', 'UserController@doLogOut')->name('dologout');
    Route::get('/register', 'UserController@showRegister')->name('register');
    Route::post('/register', 'UserController@doRegister')->name('doRegister');
    Route::get('/resetpasswordform', 'UserController@ResetPasswordForm')->middleware('RememberTokenIsExist')->name('resetpasswordform');
    Route::post('/resetpasswordform', 'UserController@setNewPassword')->name('setnewpassword');
    Route::get('/resetpasswordrequestform', 'UserController@resetPasswordRequestForm')->name('resetpasswordrequestform');
    Route::post('/resetpasswordrequestform', 'UserController@sendResetPassEmail')->name('resetpasswordrequestform');
//    For add Role and Permision (Initial System)
//    Route::get('/createRole', 'UserController@CreateRole');
//    Route::get('/createPermission', 'UserController@CreatePermission');
//    Route::get('/assignPermissionToRole', 'UserController@assignPermissionToRole');
//        Route::get('/assingRoleToUser', 'UserController@assingRoleToUser');
//        Route::get('/assignPermissionToUser', 'UserController@assignPermissionToUser');

});

