<?php



Route::get('/', 'Frontend\SiteController@index')->name('index');
Route::get('/contact', 'Frontend\SiteController@contact')->name('contact');



Route::group(['prefix'=> 'products'],function(){
////Product routes
Route::get('/products', 'Frontend\ProductsController@index')->name('product');
Route::get('/product/{slug}', 'Frontend\ProductsController@show')->name('product.show');
Route::get('/new/search', 'Frontend\ProductsController@search')->name('search');

///Categories Route
Route::get('/categories', 'Frontend\CategoriesController@index')->name('categories');
Route::get('/categories/{id}', 'Frontend\CategoriesController@show')->name('categories.show');

});

///USer Route
Route::group(['prefix'=> 'user'],function(){

   Route::get('/token/{token}', 'Frontend\VerificationController@verify')->name('user.verify');
   Route::get('/dashbroad', 'Frontend\UsersController@dashbroad')->name('user.dashbroad');
   Route::get('/profile', 'Frontend\UsersController@profile')->name('user.profile');
   Route::post('/profileUpdate', 'Frontend\UsersController@profileUpdate')->name('user.profile.update');


});
///Cart Route
Route::group(['prefix'=> 'cart'],function(){

    Route::get('/', 'Frontend\CartsController@index')->name('carts');
    Route::post('/cart', 'Frontend\CartsController@store')->name('carts.store');
    Route::post('/update/{id}','Frontend\CartsController@update')->name('carts.update');
    Route::post('/delete/{id}','Frontend\CartsController@destroy')->name('carts.delete');
 
 
 });

 ////Checkouts Route
 Route::group(['prefix' => 'checkouts'], function(){
     Route::get('/', 'Frontend\CheckoutsController@index')->name('checkouts');
     Route::post('/store','Frontend\CheckoutsController@store')->name('checkouts.store');
 });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//////API Routes
Route::get('get-district/{id}' , function($id){
    return json_encode(App\Models\District::where('division_id',$id)->get());
});


   ///  Admin routes
Route::group(['prefix'=> 'admin'],function(){
    
    Route::get('/', 'Backend\PagesController@index')->name('admin.index');

    ////For Admin login Route
    Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit','Auth\Admin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout','Auth\Admin\LoginController@logout')->name('admin.logout');

    ///For Admin Reset Password  email Route
    Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/resetPost', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    ///For Admin Reset Password Route
    Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');
    
       //Products routes
        Route::group(['prefix'=> 'products'],function(){
             
            Route::get('/', 'Backend\ProductController@index')->name('admin.products');
            Route::get('/create', 'Backend\ProductController@create')->name('admin.product.create');
            Route::post('/store', 'Backend\ProductController@store')->name('admin.product.store');
            Route::get('/edit/{id}', 'Backend\ProductController@edit')->name('admin.product.edit');
            Route::post('/update/{id}', 'Backend\ProductController@update')->name('admin.product.update');
            Route::get('/delete/{id}', 'Backend\ProductController@delete')->name('admin.product.delete');
                

        });


       // Order confirms Route
       Route::group(['prefix' => '/orders'] ,function(){
           Route::get('/', 'Backend\OrdersController@index')->name('admin.orders');
           Route::get('/view/{id}', 'Backend\OrdersController@show')->name('admin.orders.show');
           Route::get('/delete/{id}', 'Backend\OrdersController@delete')->name('admin.orders.delete');

           Route::post('/completed/{id}', 'Backend\OrdersController@completed')->name('admin.orders.completed');

           Route::post('/paid/{id}', 'Backend\OrdersController@paid')->name('admin.orders.paid');
           Route::post('/charge-update/{id}', 'Backend\OrdersController@chargeUpdate')->name('admin.orders.charge');


           Route::get('/invoice/{id}', 'Backend\OrdersController@generateInvoice')->name('admin.orders.invoice');

       });

       //Category routes
       Route::group(['prefix'=> 'categories'],function(){
            
        Route::get('/', 'Backend\CategoryController@index')->name('admin.categories');
        Route::get('/create', 'Backend\CategoryController@create')->name('admin.category.create');
        Route::post('/store', 'Backend\CategoryController@store')->name('admin.category.store');
        Route::get('/edit/{id}', 'Backend\CategoryController@edit')->name('admin.category.edit');
        Route::post('/update/{id}', 'Backend\CategoryController@update')->name('admin.category.update');
        Route::get('/delete/{id}', 'Backend\CategoryController@delete')->name('admin.category.delete');
            

    });
       //Brand routes
       Route::group(['prefix'=> 'brands'],function(){
            
        Route::get('/', 'Backend\BrandController@index')->name('admin.brands');
        Route::get('/create', 'Backend\BrandController@create')->name('admin.brands.create');
        Route::post('/store', 'Backend\BrandController@store')->name('admin.brands.store');
        Route::get('/edit/{id}', 'Backend\BrandController@edit')->name('admin.brands.edit');
        Route::post('/update/{id}', 'Backend\BrandController@update')->name('admin.brands.update');
        Route::get('/delete/{id}', 'Backend\BrandController@delete')->name('admin.brands.delete');
            

    });
       //Division routes
       Route::group(['prefix'=> 'division'],function(){
            
        Route::get('/', 'Backend\DivisionController@index')->name('admin.divisions');
        Route::get('/create', 'Backend\DivisionController@create')->name('admin.division.create');
        Route::post('/store', 'Backend\DivisionController@store')->name('admin.division.store');
        Route::get('/edit/{id}', 'Backend\DivisionController@edit')->name('admin.division.edit');
        Route::post('/update/{id}', 'Backend\DivisionController@update')->name('admin.division.update');
        Route::get('/delete/{id}', 'Backend\DivisionController@delete')->name('admin.division.delete');
            

    });
       //District routes
       Route::group(['prefix'=> 'districts'],function(){
            
        Route::get('/', 'Backend\DistrictController@index')->name('admin.districts');
        Route::get('/create', 'Backend\DistrictController@create')->name('admin.district.create');
        Route::post('/store', 'Backend\DistrictController@store')->name('admin.district.store');
        Route::get('/edit/{id}', 'Backend\DistrictController@edit')->name('admin.district.edit');
        Route::post('/update/{id}', 'Backend\DistrictController@update')->name('admin.district.update');
        Route::get('/delete/{id}', 'Backend\DistrictController@delete')->name('admin.district.delete');
            

    });
        //Slider routes
        Route::group(['prefix'=> 'sliders'],function(){
                
            Route::get('/', 'Backend\SlidersController@index')->name('admin.sliders');
            Route::post('/store', 'Backend\SlidersController@store')->name('admin.slider.store');
            Route::post('/update/{id}', 'Backend\SlidersController@update')->name('admin.slider.update');
            Route::get('/delete/{id}', 'Backend\SlidersController@delete')->name('admin.slider.delete');
                

        });

});