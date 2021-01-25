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

Route::get('/', function () {
    //return view('welcome');
    return view('home');
    //return 'mihiran';
});

Route::get('contact',function(){
   return 'contact us!';
});

Route::get('about',function(){
	return 'about us!';
});

/*Route::get('/contact',function(){
	return view('contact');
});

Route::get('/about',function(){
	return view('about');
});*/

Route::view('contact','contact');

Route::view('about','about');

/*Route::get('customers',function(){
	return view('customers');
});*/

/*Route::get('customers',function(){
   $customers = [
         'mihiran',
         'krishantha',
         'sameera'
      ];

	return view('internals.customers', ['customers' => $customers]);
});*/

//Route::get('customers','CustomersController@list');
Route::get('customers','CustomersController@index');
Route::get('customers/create','CustomersController@create');
Route::post('customers','CustomersController@store');
