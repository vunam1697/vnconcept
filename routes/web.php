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

Route::get('/tim-kiem', 'IndexController@getSearch')->name('home.search');

Route::get('/san-pham', 'IndexController@getListProduct')->name('home.products');

Route::get('/san-pham/{slug}', 'IndexController@getSingleProduct')->name('home.single-products');

Route::get('/danh-muc-san-pham/{slug}', 'IndexController@getCategoryProduct')->name('home.category-product');

Route::post('/filter-products', 'IndexController@getFilterProductsAjax')->name('home.filterProducts');

Route::get('/rooms', 'IndexController@getRooms')->name('home.rooms');

Route::get('/rooms/{slug}', 'IndexController@getSingleRooms')->name('home.single-rooms');

Route::get('/load-more-ajax', 'IndexController@getLoadMoreAjax')->name('home.load-more-ajax');

Route::get('/collection', 'IndexController@getCollection')->name('home.collection');

Route::get('/collection/{slug}', 'IndexController@getSingleCollection')->name('home.single-collection');

// Giỏ hàng

Route::post('add-cart', 'IndexController@postAddCart')->name('home.post-add-cart');

Route::post('add-cart-more', 'IndexController@postAddCartMore')->name('home.post-add-cart-more');

Route::get('gio-hang', 'IndexController@getCart')->name('home.cart');

Route::get('update-cart', 'IndexController@getUpdateCart')->name('home.update.cart');

Route::get('remove/{rowID}', 'IndexController@getRemoveCart')->name('home.remove.cart');

Route::get('check-cart', 'IndexController@getCheckCart')->name('home.check-cart');

Route::post('check-out', 'IndexController@postCheckOut')->name('home.check-out.post');

// Đăng nhập website
Route::get('/login', 'LoginController@login')->name('home.login');

Route::post('/login', 'LoginController@postLogin')->name('home.post-login');

Route::get('/logout', 'LoginController@postLogout')->name('home.logout');

// Đăng nhập facebook, google
Route::get('/auth/redirect/{provider}', 'LoginController@redirect');

Route::get('/auth/callback/{provider}', 'LoginController@callback');

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

    Route::post('/tim-kiem', 'AdminController@searchAll')->name('admin.search-all');

    // Quản lý đại lý

    Route::get('/dai-ly', 'AdminController@getListAgency')->name('admin.agency');

    Route::get('/don-hang', 'AdminController@getListOrder')->name('admin.orders');

    Route::get('/don-hang/{id}', 'AdminController@getDetailOrder')->name('admin.detail-orders');

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

        // Quản lý đơn hàng
        Route::resource('orders', 'OrdersController', ['except' => ['show']]);

        // Route::resource('category-filter', 'AttributesController', ['except' => ['show']]);
        Route::get('category-filter', 'AttributesController@getListCategory')->name('list-category-filter');

        Route::get('filter', 'AttributesController@index')->name('filter.index');

        Route::post('filter/store', 'AttributesController@store')->name('filter.store');

        Route::get('filter/edit/{id}', 'AttributesController@edit')->name('filter.edit');

        Route::post('filter/update/{id}', 'AttributesController@update')->name('filter.update');

        Route::post('filter/destroy', 'AttributesController@destroy')->name('filter.destroy');

        // Thuộc tính sản phẩm
        // Route::group(['prefix' => 'product-attributes'], function() {
        //     Route::get('/', 'ProductAttributeTypesController@getList')->name('product-attributes.index');
        //     Route::post('/store', 'ProductAttributeTypesController@postStore')->name('product-attributes.store');
        //     Route::get('/{id}/edit', 'ProductAttributeTypesController@getEdit')->name('product-attributes.edit');
        //     Route::post('/{id}/edit', 'ProductAttributeTypesController@postEdit')->name('product-attributes.post.edit');
        //     Route::delete('/{id}/delete', 'ProductAttributeTypesController@delete')->name('product-attributes.destroy');
        // });

        // Rooms
        Route::resource('category-rooms', 'CategoryRoomsController', ['except' => ['show']]);

        Route::resource('rooms', 'RoomsController', ['except' => ['show']]);

        Route::post('rooms/postMultiDel', ['as' => 'rooms.postMultiDel', 'uses' => 'RoomsController@deleteMuti']);

        // Collection
        Route::resource('category-collection', 'CategoryCollectionController', ['except' => ['show']]);

        Route::resource('collection', 'CollectionController', ['except' => ['show']]);

        Route::post('collection/postMultiDel', ['as' => 'collection.postMultiDel', 'uses' => 'CollectionController@deleteMuti']);


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