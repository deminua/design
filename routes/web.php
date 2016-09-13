<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

	Route::get('porfolio', [
		'uses'=>'PorfolioController@index',
		'as'=> 'porfolio.index',
		]);

	Route::get('porfolio/show/{id}', [
		'uses'=>'PorfolioController@show',
		'as'=> 'porfolio.show',
		]);



	Route::get('page/{view}', function ($view) {
	    return view('page.'.$view.'');
	})->name('page');

/*
Route::get('/assets/{img}/{w?}', function($image, $w=80){
        #return \Image::make(public_path("/uploads/$img"))->resize($h, $w)->response('jpg');
		#$img = \Image::make(public_path("/uploads/$img"));
		
		$img = Image::cache(function($image) {
	    $image->make('public/foo.jpg')->resize(300, 200)->greyscale();
		});

		Image::cache(function($img, $w) {
		   $img->make($img);
	        $img->resize(null, $w, function ($constraint) {
			    $constraint->aspectRatio();
			});
			return $img;
		}, 10, true);

  //       $img->resize(null, $w, function ($constraint) {
		//     $constraint->aspectRatio();
		// });
		// return $img->response('jpg'); 

 });
*/

Auth::routes();

	Route::get('porfolio/create', [
		'uses'=>'PorfolioController@create',
		'as'=> 'porfolio.create',
		]);

	Route::get('porfolio/update/{id}', [
		'uses'=>'PorfolioController@edit',
		'as'=> 'porfolio.edit',
		]);

	Route::post('porfolio/store', [
		'uses'=>'PorfolioController@store',
		'as'=> 'porfolio.store',
		]);

	Route::post('porfolio/update/{id}', [
		'uses'=>'PorfolioController@update',
		'as'=> 'porfolio.update',
		]);

	Route::get('file/{id}/{type}', [
		'uses'=>'FileController@update',
		'as'=> 'file.update',
		]);

Route::get('/home', 'HomeController@index');