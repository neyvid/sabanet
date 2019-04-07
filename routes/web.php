<?php

//Routes For Admin Application with NameSpace admin and Prefix Admin(prefix for before route for exp /admin/home)

Route::group(['prefix' => 'profile', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'adminController@index')->name('profile.home');
    Route::get('/logout', 'userController@logout')->name('profile.logout');
    Route::get('/user', 'userController@index')->name('user.index');
    Route::get('/user/edit', 'userController@edit')->name('user.edit');
    Route::post('/user/edit', 'userController@update')->name('user.update');
    Route::get('/user/orders', 'orderController@index')->name('user.orders');
    Route::get('/user/comment', 'AdminCommentController@commentOfUser')->name('user.comment');
    Route::get('/user/orders/pay/{orderId}', 'orderController@pay')->name('user.orders.pay');
    Route::get('/user/orders/detail/{orderId}', 'orderController@showOrderDetails')->name('orderItemDetail');


    Route::group(['middleware' => 'checkIsAdmin'], function () {
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

//   Routes For Orders
        Route::get('orders', 'AdminOrderController@index')->name('profile.orders.list'); //show All Orders
        Route::get('order/create', 'AdminOrderController@create')->name('profile.orders.create'); //Show Form for create Orders
        Route::post('order/create', 'AdminOrderController@store')->name('profile.orders.store'); //store Order into database
        Route::get('order/delete', 'AdminOrderController@destroy')->name('profile.orders.delete'); //delete Order
        Route::get('order/edit', 'AdminOrderController@edit')->name('profile.orders.edit');// show Form for Edit Order
        Route::post('order/edit', 'AdminOrderController@update')->name('profile.orders.update'); //store edit of Order in database
//   Routes For Users
        Route::get('users', 'AdminUserController@index')->name('profile.users.list'); //show All users
        Route::get('user/admin/create', 'AdminUserController@create')->name('profile.user.create'); //Show Form for create users
        Route::post('user/admin/create', 'AdminUserController@store')->name('profile.user.store'); //store users into database
        Route::get('user/admin/delete', 'AdminUserController@destroy')->name('profile.user.delete'); //delete users
        Route::get('user/admin/edit', 'AdminUserController@edit')->name('profile.user.edit');// show Form for Edit users
        Route::post('user/admin/edit', 'userController@update')->name('profile.user.update'); //store edit of users in database
    });
//   Routes For Article
        Route::get('articles', 'ArticleController@index')->name('profile.articles.list'); //show All articles
        Route::get('article/create', 'ArticleController@create')->name('profile.article.create'); //Show Form for create article
        Route::post('article/create', 'ArticleController@store')->name('profile.article.store'); //store article into database
        Route::get('article/delete', 'ArticleController@destroy')->name('profile.article.delete'); //delete article
        Route::get('article/edit', 'ArticleController@edit')->name('profile.article.edit');// show Form for Edit article
        Route::post('article/edit', 'ArticleController@update')->name('profile.article.update'); //store edit of article in database


//   Routes For comments
        Route::get('comments', 'AdminCommentController@index')->name('profile.comments.list'); //show All comments
        Route::get('comments/status/{status}', 'AdminCommentController@changeStatus')->name('profile.comments.status.change'); //change status of comments
        Route::get('comment/create', 'AdminCommentController@create')->name('profile.comment.create'); //Show Form for create comments
        Route::post('comment/create', 'AdminCommentController@store')->name('profile.comment.store'); //store comments into database
        Route::get('comment/delete', 'AdminCommentController@destroy')->name('profile.comment.delete'); //delete comments
        Route::get('comment/edit', 'AdminCommentController@edit')->name('profile.comment.edit');// show Form for Edit comments
        Route::post('comment/edit', 'AdminCommentController@update')->name('profile.comment.update'); //store edit of comments in database
        Route::post('comment/action/all', 'AdminCommentController@actionAll')->name('profile.comment.action.all'); //store edit of comments in database
        Route::get('comment/search', 'AdminCommentController@search')->name('profile.comment.search'); //store edit of comments in database

//   Routes For Attachment
        Route::get('attachments', 'AttachmentController@index')->name('profile.attachment.list'); //show All attachment
        Route::get('attachment/delete', 'AttachmentController@destroy')->name('profile.attachment.delete'); //show All attachment

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
//    Route::get('/assingRoleToUser', 'UserController@assingRoleToUser');
//    Route::get('/assignPermissionToUser', 'UserController@assignPermissionToUser');
    Route::get('/page', 'HomeController@showPage')->name('showpage');
//    Check number for support or not
    Route::post('/checkAdslSupport', 'AdslController@chekAdslSupport')->name('chekAdslSupport');
//    For buy online after check number(after click on buyonline btn)
    Route::get('/registerAdslUser', 'AdslController@registerAdslUser')->name('registerAdslUser');
//    when select one state then show city of that state (ajax)
    Route::post('/getCity/{stateId}', 'AdslController@getCityFromStateId')->name('getCity');
//    when select state and city and put number and click confirm run this route

    Route::post('/checkSupport', 'AdslController@checkAdslSupportWithStateAndCity')->name('checkSupport');
    Route::get('/checkSupport', 'AdslController@showStep1')->name('showStep1');
    Route::get('/sessiondelete', 'AdslController@deletesession')->name('deletesession');

//    Route::post('/registerAdslUser', 'AdslController@checkAdslSupportWithStateAndCity')->name('checkSupport');

//    when come in of top route,for show service of oprator of areacode (ajax)
    Route::post('/showServiceOfOprator/{opratorId}', 'AdslController@showServiceOfOprator')->name('showServiceOfOprator');
//    when click on one service of oprator (ajax)
    Route::post('/addServiceForUser/{serviceId}', 'AdslController@addServiceForUser')->name('addServiceForUser');
    Route::get('/showEquipmentOFService', 'AdslController@showEquipmentOFService')->name('showEquipmentOFService');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/infoOfUser', 'AdslController@showStep3')->name('showStep3');
        Route::get('/ordercontract', 'AdslController@showStep5')->name('showStep5');
        Route::post('/ordercontract', 'AdslController@confirmContract')->name('showStep5');

        Route::get('/order/create', 'OrderController@create')->name('orderCreate');
        Route::get('/order/verifyPayment', 'OrderController@verifyPayment')->name('verifyPayment');
        Route::post('/user/edit', 'UserController@update')->name('frontend.user.update');
        Route::get('/user/edit', 'UserController@addInfo')->name('frontend.user.addinfo');
        Route::post('/typeselection/', 'AdslController@typeselection')->name('typeselection');
        Route::post('/typeselectionAjax/{userType?}', 'AdslController@typeselectionAjax')->name('typeselectionAjax');
        Route::get('/ordercontroll', 'AdslController@orderController')->name('orderControllerShow');
        Route::get('/orderreview', 'AdslController@orderReview')->name('orderReviewShow');
        Route::get('/returnOrder', 'OrderController@returnGateway')->name('returnGateway');


    });

    Route::get('/goBack/{number}', 'AdslController@goback')->name('goback');

    Route::post('/addEquipmentForUser/{equType}/{equipmentId}', 'AdslController@addEquipmentForUser')->name('addEquipmentForUser');


//    show Single Article
    Route::get('/article/{articleId}','ArticleController@index')->name('article.show');
//    Comments Route
    Route::post('/comment/store','CommentController@store')->name('comment.store');

});

