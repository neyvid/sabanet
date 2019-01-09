<?php

//Routes For Admin Application with NameSpace admin and Prefix Admin(prefix for before route for exp /admin/home)

Route::group(['prefix' => 'profile', 'namespace' => 'Admin','middleware'=>'auth'], function () {
    Route::get('/', 'adminController@index')->name('profile.home');
    Route::get('/logout', 'userController@logout')->name('profile.logout');
//    Routes For States
    Route::get('/states', 'stateController@index')->name('profile.state.list');
    Route::get('/states/create', 'stateController@create')->name('profile.state.create');
    Route::post('/states/create', 'stateController@store')->name('profile.state.store');

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

