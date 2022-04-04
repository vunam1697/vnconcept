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
// Website
Route::get('/', 'IndexController@getHome')->name('home.index');

Route::get('/san-pham', 'IndexController@getListProduct')->name('home.products');

Route::get('/san-pham/{slug}', 'IndexController@getSingleProduct')->name('home.single-products');

// Đăng nhập website
Route::get('/login', 'LoginController@login')->name('home.login');

Route::post('/login', 'LoginController@postLogin')->name('home.post-login');

Route::get('/logout', 'LoginController@postLogout')->name('home.logout');

// Đăng nhập facebook, google
Route::get('/auth/redirect/{provider}', 'LoginController@redirect');

Route::get('/callback/{provider}', 'LoginController@callback');

// Quên mật khẩu
Route::get('/forgot-password', 'LoginController@forgotPassword')->name('home.forgot-password');

Route::post('/forgot-password', 'LoginController@postForgotPassword')->name('home.post-forgot-password');

Route::post('/send-otp', 'LoginController@sendOtp')->name('home.send-otp');

Route::get('/resetPassword/{token}', 'LoginController@resetPassword')->name('home.resetPassword');

Route::post('/new-password', 'LoginController@newPassword')->name('home.new-password');

// Đăng nhập khách hàng
Route::group(['middleware' => 'customer_auth'], function () {
    Route::get('/admin', 'AdminController@getHome')->name('admin.index');

    Route::get('/total-revenue/{key}', 'AdminController@getTotalRevenue')->name('admin.total-revenue');

    // Quản lý đại lý

    Route::get('/dai-ly', 'AdminController@getListAgency')->name('admin.agency');

    Route::get('/don-hang', 'AdminController@getListOrder')->name('admin.orders');

    // Quản lý tài khoản

    Route::get('/thong-tin-tai-khoan', 'AdminController@getInformation')->name('admin.information');

    Route::post('/thong-tin-tai-khoan', 'AdminController@postInformation')->name('admin.post-information');

    Route::get('/thay-doi-mat-khau', 'AdminController@getChangePasswoord')->name('admin.change-password');

    Route::post('/thay-doi-mat-khau', 'AdminController@postChangePasswoord')->name('admin.post-change-password');

});

Route::get('/quan-huyen/{id}', 'AdminController@getDistrict')->name('backend.get-district');

Route::get('/phuong-xa/{id}', 'AdminController@getWard')->name('backend.get-ward');



// Đăng nhập Admin
Route::group(['namespace' => 'Admin'], function () {

    Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function () {
       	Route::get('/home', 'HomeController@index')->name('backend.home');

        Route::resource('users', 'UserController', ['except' => [
            'show'
        ]]);
        Route::resource('image', 'ImageController', ['except' => [
            'show'
        ]]);
        Route::post('image/postMultiDel', ['as' => 'image.postMultiDel', 'uses' => 'ImageController@deleteMuti']);

        // Sản phẩm
        Route::resource('products', 'ProductsController', ['except' => ['show']]);
        Route::post('products/postMultiDel', ['as' => 'products.postMultiDel', 'uses' => 'ProductsController@deleteMuti']);
        Route::get('products/get-slug', 'ProductsController@getAjaxSlug')->name('products.get-slug');

        Route::get('products/sync-data', ['as' => 'products.sync-data', 'uses' => 'ProductsController@syncData']);

        // Danh mục sản phẩm
        Route::resource('category', 'CategoryController', ['except' => ['show']]);

        Route::get('category/sync-data', ['as' => 'category.sync-data', 'uses' => 'CategoryController@syncData']);

        // Tài khoản thành viên
        Route::resource('member', 'MemberController', ['except' => ['show']]);

        Route::post('member/postMultiDel', ['as' => 'member.postMultiDel', 'uses' => 'MemberController@deleteMuti']);

        // Liên hệ
        Route::group(['prefix' => 'contact'], function () {
            Route::get('/', ['as' => 'get.list.contact', 'uses' => 'ContactController@getListContact']);
            Route::post('/delete-muti', ['as' => 'contact.postMultiDel', 'uses' => 'ContactController@postDeleteMuti']);
            Route::get('{id}/edit', ['as' => 'contact.edit', 'uses' => 'ContactController@getEdit']);
            Route::post('{id}/edit', ['as' => 'contact.post', 'uses' => 'ContactController@postEdit']);
            Route::delete('{id}/delete', ['as' => 'contact.destroy', 'uses' => 'ContactController@getDelete']);
        });

        Route::group(['prefix' => 'pages'], function() {
            Route::get('/', ['as' => 'pages.list', 'uses' => 'PagesController@getListPages']);
            Route::get('build', ['as' => 'pages.build', 'uses' => 'PagesController@getBuildPages']);
            Route::post('build', ['as' => 'pages.build.post', 'uses' => 'PagesController@postBuildPages']);
            Route::post('/create', ['as' => 'pages.create', 'uses' => 'PagesController@postCreatePages']);
        });

        Route::group(['prefix' => 'options'], function() {
            Route::get('/general', 'SettingController@getGeneralConfig')->name('backend.options.general');
            Route::post('/general', 'SettingController@postGeneralConfig')->name('backend.options.general.post');

            Route::get('/developer-config', 'SettingController@getDeveloperConfig')->name('backend.options.developer-config');
            Route::post('/developer-config', 'SettingController@postDeveloperConfig')->name('backend.options.developer-config.post');
        });

        Route::group(['prefix' => 'menu'], function () {
            Route::get('/', ['as' => 'setting.menu', 'uses' => 'MenuController@getListMenu']);
            Route::get('edit/{id}', ['as' => 'backend.config.menu.edit', 'uses' => 'MenuController@getEditMenu']);
            Route::post('add-item/{id}', ['as' => 'setting.menu.addItem', 'uses' => 'MenuController@postAddItem']);
            Route::post('update', ['as' => 'setting.menu.update', 'uses' => 'MenuController@postUpdateMenu']);
            Route::get('delete/{id}', ['as' => 'setting.menu.delete', 'uses' => 'MenuController@getDelete']);
            Route::get('edit-item/{id}', ['as' => 'setting.menu.geteditItem', 'uses' => 'MenuController@getEditItem']);
            Route::post('edit', ['as' => 'setting.menu.editItem', 'uses' => 'MenuController@postEditItem']);
        });

        Route::get('/get-layout', 'HomeController@getLayOut')->name('get.layout');


    });
});

Route::group(['prefix' => 'admin'], function () {
    Auth::routes(
        [
            'register' => false,
            'verify' => false,
            'reset' => false,
        ]
    );

});
