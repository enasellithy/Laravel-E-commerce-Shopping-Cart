<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
  Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
    ],
    function()
    {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', function()
        {
            return View::make('hello');
        });

        Route::get('test',function(){
            return View::make('test');
        });
       Route::group(['middleware'=>'web'],function(){
	Route::get('/', function () {
	    return view('welcome');
	});
	Auth::routes();
	Route::get('/home', 'HomeController@index');
	Route::resource('/','FrontController');
	Route::resource('/category','CatFrontController');
	Route::get('/category/{category}/show','CatFrontController@show');
	Route::resource('/adv','AdFrontController');
	Route::get('/adv/{adv}/show','AdFrontController@show');
	Route::get('add-to-cart/{id}/cart',[
		'uses' => 'SaleClientController@getAddToCart',
		'as'   => 'product.addToCart'
		]);
	Route::get('shopping-cart',[
		'uses' => 'SaleClientController@getCart',
		'as'   => 'product.shoppingCart'
		]);
	Route::get('/checkout',[
		'uses' => 'SaleClientController@getCheckout',
		'as'   => 'checkout'
		]);
	Route::post('/checkout',[
		'uses' => 'SaleClientController@postCheckout',
		'as'   => 'checkout'
		]);
	//Route::get('checkout','PaypalController@checkout');
	Route::get('done',function(){
		return 'Done';
	});
	Route::get('cancel',function(){
		return 'Cancel';
	});
	//Route::get('all','PaypalController@all');
	Route::get('all','SaleClientController@all');

	// Lang
	Route::group(['prefix' => LaravelLocalization::setLocale()], function()
    {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', function()
        {
            return view('hello');
        });

        Route::get('test',function(){
            return View::make('test');
        });
    });

	/*Route::get('welcome/{locale}', function ($locale) {
    App::setLocale($locale);
    Route::get('{locale}','LangController@index');

    //
});*/
	/*Route::get('{loacle}',function(){
		return view('welcome');
	});
	Route::get('{locale}','FrontController@changeLanguage');*/
});
    });


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware'=>['web','admin']],function(){
	Route::resource('/admin','AdminController');
	Route::resource('/cat','CatController');
	Route::get('cat/{cat}/delete','CatController@destroy');
	Route::get('cat/{cat}/edit','CatController@edit');
	Route::post('cat/{cat}/update','CatController@update');
	Route::resource('/ad','AdBackController');
	Route::get('ad/{ad}/delete','AdBackController@destroy');
	Route::get('cat/{ad}/edit','CatController@edit');
	Route::get('/images/{$image_cover}',function($name){
			return public_path('images/'.$name); 
		});
	Route::get('/images/{$image1}',function($name){
			return public_path('images/'.$name); 
		});
	Route::get('/images/{$image2}',function($name){
			return public_path('images/'.$name); 
		});
});


