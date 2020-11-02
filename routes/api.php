<?php


Route::group(['prefix' => 'auth'], function () {
    Route::post('/register','Auth\RegisterController@action');
    Route::post('/login', 'Auth\LoginController@action');
    // Route::post('/register', 'Authenticate\RegisterController@action');
    // Route::post('/login', 'Authenticate\LoginController@action');
    Route::get('/me', 'Auth\MeController@action');

});

Route::resource('/categories', 'Categories\CategoriesController');
Route::resource('/products', 'Products\ProductController');
Route::resource('/addresses', 'Address\AddressController');
Route::resource('/countries', 'Countries\CountryController');



Route::resource('/cart', 'Cart\CartController',[
    'parameters'=>[
        'cart'=>'productVariation'
    ]
]);



