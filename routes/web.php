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
    Route::post('/getcity/{stateId}', 'cityController@getCityByStateId'); //show All Cities of specified State
    Route::get('/city/create', 'CityController@create')->name('profile.city.create'); //Show Form for Create City
    Route::post('/city/create', 'CityController@store')->name('profile.city.store'); //city store into database
    Route::get('/city/delete', 'CityController@destroy')->name('profile.city.delete'); //delete city of database
    Route::get('/city/edit', 'CityController@edit')->name('profile.city.edit');// show Form for Edit City
    Route::post('/city/edit', 'CityController@update')->name('profile.city.update'); //store edit of City in database
//   Routes For telecomcenter
    Route::get('/telecomcenter', 'TelecomcenterController@index')->name('profile.telecomcenter.list'); //show All telecomcenter
    Route::post('/getTelecom/{cityId}', 'TelecomcenterController@getTelecomBycityId'); //show All Telecome of specified City
    Route::get('/telecomcenter/create', 'TelecomcenterController@create')->name('profile.telecomcenter.create'); //Show Form for Create telecomcenter
    Route::post('/telecomcenter/create', 'TelecomcenterController@store')->name('profile.telecomcenter.store'); //city telecomcenter into database
    Route::get('/telecomcenter/delete', 'TelecomcenterController@destroy')->name('profile.telecomcenter.delete'); //delete telecomcenter of database
    Route::get('/telecomcenter/edit', 'TelecomcenterController@edit')->name('profile.telecomcenter.edit');// show Form for Edit telecomcenter
    Route::post('/telecomcenter/edit', 'TelecomcenterController@update')->name('profile.telecomcenter.update'); //store edit of telecomcenter in database
//   Routes For oprator
    Route::get('/oprator', 'OpratorController@index')->name('profile.oprator.list'); //show All oprator
    Route::get('/oprator/create', 'OpratorController@create')->name('profile.oprator.create'); //Show Form for Create oprator
    Route::post('/oprator/create', 'OpratorController@store')->name('profile.oprator.store'); //city oprator into database
    Route::get('/oprator/delete', 'OpratorController@destroy')->name('profile.oprator.delete'); //delete oprator of database
    Route::get('/oprator/edit', 'OpratorController@edit')->name('profile.oprator.edit');// show Form for Edit oprator
    Route::post('/oprator/edit', 'OpratorController@update')->name('profile.oprator.update'); //store edit of oprator in database
//   Routes For areacode
    Route::get('/areacode', 'AreacodeController@index')->name('profile.areacode.list'); //show All areacode
    Route::get('/areacode/create', 'AreacodeController@create')->name('profile.areacode.create'); //Show Form for Create areacode
    Route::post('/areacode/create', 'AreacodeController@store')->name('profile.areacode.store'); //city areacode into database
    Route::get('/areacode/delete', 'AreacodeController@destroy')->name('profile.areacode.delete'); //delete areacode of database
    Route::get('/areacode/edit', 'AreacodeController@edit')->name('profile.areacode.edit');// show Form for Edit areacode
    Route::post('/areacode/edit', 'AreacodeController@update')->name('profile.areacode.update'); //store edit of areacode in database
//   Routes For Oprator Services
    Route::get('oprator/service', 'ServiceController@index')->name('profile.service.list'); //show All Services of Oprator
    Route::get('oprator/service/create', 'ServiceController@create')->name('profile.service.create'); //Show Form for Create Services of Oprator
    Route::post('oprator/service/create', 'ServiceController@store')->name('profile.service.store'); //Services of Oprator into database
    Route::get('oprator/service/delete', 'ServiceController@destroy')->name('profile.service.delete'); //delete Services of database
    Route::get('oprator/service/edit', 'ServiceController@edit')->name('profile.service.edit');// show Form for Edit Services of Oprator
    Route::post('oprator/service/edit', 'ServiceController@update')->name('profile.service.update'); //store edit of Services in database
//   Routes For Category
    Route::get('category', 'CategoryController@index')->name('profile.category.list'); //show All category
    Route::get('category/create', 'CategoryController@create')->name('profile.category.create'); //Show Form for Create category
    Route::post('category/create', 'CategoryController@store')->name('profile.category.store'); //store category into database
    Route::get('category/delete', 'CategoryController@destroy')->name('profile.category.delete'); //delete category
    Route::get('category/edit', 'CategoryController@edit')->name('profile.category.edit');// show Form for Edit category
    Route::post('category/edit', 'CategoryController@update')->name('profile.category.update'); //store edit of category in database
    Route::post('/getCategoryOfCatType/{catTypeNum}', 'CategoryController@getCategoriesOfCategoryTypeNum'); //store edit of category in database
//   Routes For Product
    Route::get('product', 'ProductController@index')->name('profile.product.list'); //show All product
    Route::get('product/create', 'ProductController@create')->name('profile.product.create'); //Show Form for create product
    Route::post('product/create', 'ProductController@store')->name('profile.product.store'); //store product into database
    Route::get('product/delete', 'ProductController@destroy')->name('profile.product.delete'); //delete product
    Route::get('product/edit', 'ProductController@edit')->name('profile.product.edit');// show Form for Edit product
    Route::post('product/edit', 'ProductController@update')->name('profile.product.update'); //store edit of product in database

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
    Route::get('/page', 'HomeController@showPage')->name('showpage');
//    Check number for support or no

    Route::post('/checkAdslSupport', 'AdslController@chekAdslSupport')->name('chekAdslSupport');
//    for buy online afte check number
    Route::get('/registerAdslUser', 'AdslController@index')->name('registerAdslUser');
//    when select one state then show city of that state (ajax)
    Route::post('/registerAdslUser/{stateId}', 'AdslController@getCityFromStateId')->name('getCityFromStateId');
    Route::post('/registerAdslUser', 'AdslController@checkAdslSupportWithStateAndCity')->name('checkAdslWitStateAndCity');
    Route::post('/showServiceOfOprator/{opratorId}', 'AdslController@showServiceOfOprator')->name('showServiceOfOprator');
    Route::post('/addServiceForUser/{serviceId}', 'AdslController@addServiceForUser')->name('addServiceForUser');


});

