<?php


Route::redirect('', '/ar');
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/', 'HomeController@splash');
    Route::get('/packages', 'website\PackageController@packages');
    Auth::routes();
Route::get('pay-by-bank/{user}','HomeController@payBank')->name('pay.bankPage');
    Route::post('pay-by-bank/{user}','HomeController@payByBank')->name('pay.bank');
    // Route::get('/login/{branch}', 'Auth\LoginController@showBranchLogin');
    //  Route::post('/login/{branch}', 'Auth\LoginController@branchLogin');
    Route::get('/get/meals/{cat_id}/{res_id}', function ($cat_id, $res_id) {
        $data = App\Meal::where('user_id', $res_id)->where('category_id', $cat_id)->get();
        return $data;
    });

    // Route::post('/search', 'HomeController@search')->name('search');
    Route::get('/restaurants/{user}/{table_id?}', 'HomeController@index')->name('restaurants');
    // Route::post('/restaurants/{user}','HomeController@branchMeals')->name('branch.meals');
    Route::get('/restaurants/{user}/categories/{id}', 'HomeController@categoryProducts')->name('cat-products');
    Route::get('/restaurants/{user}/products/{id}', 'HomeController@showProduct')->name('products.show');
    Route::get('/restaurants/{user}/meal/{id}', 'HomeController@chooseProduct')->name('choose-meal');
//    Route::get('/nour/subscribe/{$id}','HomeController@choosePackage')->name('choose_package');

    Route::get('/restaurant/cart/{user}', 'HomeController@getCart')->name('get-cart');
    Route::get('/subscribe/{id}', 'website\PackageController@chooseProduct')->name('choose_package');
    Route::post('/subscribe/{id}', 'website\PackageController@restaurantSubscribe')->name('restaurant_subscribe');

    // Route::get('/restaurants/cart/{user}', 'HomeController@getCart')->name('get-cart');
    Route::post('/check/coupon', 'website\PackageController@checkCoupon')->name('check_coupon');
    Route::post('/meal/{id}/add-to-cart', 'website\CartController@addToCart')->name('add-to-cart');
    Route::GET('/meal/{id}/delete-from-cart', 'website\CartController@remove')->name('cart.remove');

    Route::get('/home', 'HomeController@landpage');
    Route::get('/landpage', 'HomeController@home')->name('home');

    Route::post('/order', 'HomeController@postOrder')->name('post-order');
    Route::post('/order/{id}/payment', 'HomeController@postPayment')->name('post-payment');

    Route::get('/my-fatoora-status/{id?}/{id1?}', 'HomeController@fatooraStatus');
    Route::get('/fatoora/success', function () {
        return view('fatoora');
    })->name('fatoora-success');
    Route::get('/contacts', 'HomeController@getContacts')->name('get-contacts');
    Route::post('contacts', 'HomeController@postContacts')->name('contacts');

    Route::get('/get_branches/{id}','website\CartController@get_branches');


    /*admin panel routes*/

    Route::get('/admin/home', ['middleware' => 'auth:admin', 'uses' => 'AdminController\HomeController@index'])->name('admin.home');

    Route::prefix('admin')->group(function () {

        Route::get('login', 'AdminController\Admin\LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'AdminController\Admin\LoginController@login')->name('admin.login.submit');
        Route::get('password/reset', 'AdminController\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('password/email', 'AdminController\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('password/reset/{token}', 'AdminController\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
        Route::post('password/reset', 'AdminController\Admin\ResetPasswordController@reset')->name('admin.password.update');
        Route::post('logout', 'AdminController\Admin\LoginController@logout')->name('admin.logout');

        Route::get('get/regions/{id}', 'AdminController\HomeController@get_regions');




        Route::group(['middleware' => ['web', 'auth:web']], function () {

            Route::get('/orders/new', 'AdminController\OrderController@new')->name('orders.index');
            Route::get('/orders/active', 'AdminController\OrderController@activeOrders')->name('orders.active');
            Route::get('/orders/compeleted', 'AdminController\OrderController@compeletedOrders')->name('orders.compeleted');
            Route::get('/orders/canceled', 'AdminController\OrderController@canceledOrders')->name('orders.canceled');
            Route::get('/orders/{id}', 'AdminController\OrderController@showOrder')->name('orders.show');

            Route::get('/orders/{id}/delete', 'AdminController\OrderController@deleteOrder')->name('orders.delete');
            Route::get('/delivery/orders', 'HomeController@deliveryOrder')->name('delivery.order');
            // Route::get('/delivery/orders/finished', 'HomeController@deliveryOrderFinished')->name('delivery.orderFinished');
            Route::get('/subscripe/package','PackageController@showPackageSubscripe')->name('show.packageSubscripe');
            Route::get('/subscripe/package/{id}','PackageController@changePackage')->name('change.package');
            Route::post('/subscripe/package/{id}','PackageController@changeedPackage')->name('changed.package');

            Route::get('/delivery/order/{id}', 'HomeController@redirectOrderPage')->name('redirect.order');
            Route::post('/delivery/order/{id}', 'HomeController@redirectOrder')->name('send.orderBranch');
            // Route::get('/show/order/{id}', 'HomeController@showOrderInfo')->name('show.orderInfo');

            Route::get('bank/payments/edit/{id}', 'AdminController\HomeController@bank_payments_edit')->name('AdminEditBankPayment');
            Route::post('bank/payments/update/{id}', 'AdminController\HomeController@bank_payments_update')->name('AdminUpdateBankPayment');
Route::group(['middleware'=>['restaurant']],function(){
    Route::get('/edit-profile', 'HomeController@editProfile')->name('res-update-info');
    Route::post('/update-profile', 'HomeController@updateProfile');


    // Route::get('/edit-profile', 'HomeController@editProfile')->name('res-update-info');
    // Route::get('/orders/new', function(){dd('here');});





Route::get('/change-password', 'HomeController@changePasswordPage')->name('res.changePass');
    Route::post('/change-password', 'HomeController@changePassword');
    Route::get('/show-barcode', 'HomeController@barcodeRes')->name('res.barcode');

    route::get('cities/{id}/delete', 'AdminController\CityController@destroy');
    Route::resource('cities', 'AdminController\CityController');

    route::get('branches/{id}/delete', 'AdminController\BranchController@destroy');
    Route::resource('branches', 'AdminController\BranchController');



    route::get('additions/{id}/delete', 'AdminController\AdditionController@destroy');
    Route::resource('additions', 'AdminController\AdditionController');

    route::get('categories/{id}/delete', 'AdminController\CategoryController@destroy');
    Route::resource('categories', 'AdminController\CategoryController');

    route::get('shifts/{id}/delete', 'AdminController\ShiftController@destroy');
    Route::resource('shifts', 'AdminController\ShiftController');

    route::get('tables/{id}/delete', 'AdminController\TableController@destroy');
    Route::resource('tables', 'AdminController\TableController');

    route::get('sliders/{id}/delete', 'AdminController\SliderController@destroy');
    Route::resource('sliders', 'AdminController\SliderController');

    route::get('meals/{id}/delete', 'AdminController\MealController@destroy');
    route::get('meals/{id}/add-size', 'AdminController\MealController@addSize')->name('meals.addSize');
    route::post('meals/{id}/add-size', 'AdminController\MealController@storeSize')->name('meals.storeSize');
    route::get('meals/{size_id}/edit-size', 'AdminController\MealController@editSize')->name('editSize');
    route::post('meals/{size_id}/update-size', 'AdminController\MealController@updateSize')->name('updateSize');
    route::get('meals/{meal_id}/{size_id}/delete-size', 'AdminController\MealController@deleteSize')->name('deleteSize');
    Route::resource('meals', 'AdminController\MealController');

});

        });


        Route::group(['middleware' => ['web', 'auth:admin']], function () {


            route::get('/page/{page}/delete', 'AdminController\PagesController@destroy');
            Route::resource('page', 'AdminController\PagesController');

            Route::get('setting', 'AdminController\SettingController@index');
            Route::post('settings', 'AdminController\SettingController@store');
            Route::get('setting/create', 'AdminController\SettingController@create');
            Route::post('setting', 'AdminController\SettingController@addBank');
            Route::delete('settings', 'AdminController\SettingController@deleteBank');

            Route::get('info-setting', 'AdminController\SettingController@infoSetting');
            Route::post('info-setting', 'AdminController\SettingController@postInfoSetting');

            Route::get('social', 'AdminController\SettingController@social');
            Route::post('social', 'AdminController\SettingController@postSocial');


            Route::get('pages/contacts', 'AdminController\PageController@contacts');
            Route::get('delete/{id}/contact', 'AdminController\PageController@deleteContact')->name('delete-contacts');



            Route::get('pages/terms', 'AdminController\PageController@terms');
            Route::post('add/pages/terms', 'AdminController\PageController@saveTerms')->name('postTerms');

            route::get('shops/{id}/delete', 'AdminController\ShopController@destroy');
            route::get('shops/{id}/add-branch', 'AdminController\ShopController@addBranch')->name('shops.addBranch');
            route::post('shops/{id}/add-branch', 'AdminController\ShopController@storeBranch')->name('shops.storeBranch');
            route::get('shops/{branch_id}/edit-branch', 'AdminController\ShopController@editBranch')->name('editBranch');
            route::post('shops/{branch_id}/update-branch', 'AdminController\ShopController@updateBranch')->name('updateBranch');
            route::get('shops/{branch_id}/delete-branch', 'AdminController\ShopController@deleteBranch')->name('deleteBranch');
            Route::resource('shops', 'AdminController\ShopController');



            // ================================packages====================================
            Route::get('/packages/{package}/delete', 'AdminController\PackageController@destroy');
            Route::resource('packages', 'AdminController\PackageController')->except(['store','edit','update','destroy','create']);

            // ================================seller-code====================================
            Route::get('/seller-code/{id}/delete', 'AdminController\SellerCodeController@destroy');
            Route::resource('seller-code', 'AdminController\SellerCodeController');

            // ================================coupon====================================
            Route::get('/coupons/{coupon}/delete', 'AdminController\CouponController@destroy');
            Route::resource('coupons', 'AdminController\CouponController');



            Route::get('/subscriptions', 'AdminController\SubscriptionController@index')->name('subscriptions.index');
            Route::get('/subscriptions/paid', 'AdminController\SubscriptionController@paid')->name('subscriptions.paid');
            Route::get('/subscriptions/finished', 'AdminController\SubscriptionController@finished')->name('subscriptions.finished');
            Route::get('/subscriptions/{subscription}/delete', 'AdminController\SubscriptionController@delete')->name('subscriptions.delete');
            Route::get('subscriptions/{id}/update-status', 'AdminController\SubscriptionController@updateStatus')->name('subscriptions.update-status');
            Route::post('subscriptions/{id}/update-status', 'AdminController\SubscriptionController@postUpdateStatus')->name('subscriptions.post-update-status');






            //        ===================================users============================================

            Route::get('users', 'AdminController\UserController@index')->name('users.index');
            Route::get('users/create', 'AdminController\UserController@create');
            Route::post('users/store', 'AdminController\UserController@store');
            Route::get('users/edit/{user}', 'AdminController\UserController@edit')->name('users.edit');
            Route::get('edit/userAccount/{id}/{type}', 'AdminController\UserController@edit_account');
            Route::post('update/userAccount/{id}/{type}', 'AdminController\UserController@update_account');
            Route::post('users/update/{id}', 'AdminController\UserController@update')->name('users.update');
            Route::post('update/pass/{id}', 'AdminController\UserController@update_pass');
            Route::get('update/privacy/{id}', 'AdminController\UserController@update_privacy');
            Route::get('delete/{id}/user', 'AdminController\UserController@destroy');

            //===============================================================


            // Admins Route
            Route::resource('admins', 'AdminController\AdminController');

            Route::get('/profile', [
                'uses' => 'AdminController\AdminController@my_profile',
                'as' => 'my_profile' // name
            ]);
            Route::post('/profileEdit', [
                'uses' => 'AdminController\AdminController@my_profile_edit',
                'as' => 'my_profile_edit' // name
            ]);
            Route::get('/profileChangePass', [
                'uses' => 'AdminController\AdminController@change_pass',
                'as' => 'change_pass' // name
            ]);
            Route::post('/profileChangePass', [
                'uses' => 'AdminController\AdminController@change_pass_update',
                'as' => 'change_pass' // name
            ]);

            Route::get('/admin_delete/{id}', [
                'uses' => 'AdminController\AdminController@admin_delete',
                'as' => 'admin_delete' // name
            ]);
        });
    });

    Route::post('user/store', 'website\UserController@store')->name('storeUser');
    Auth::routes();
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});
