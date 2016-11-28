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

Route::get('/', 'HomeController@welcome');
Route::get('/contact', 'HomeController@contact');
Route::post('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout');
Route::get('/ver/{id}', 'HomeController@ver');
Route::get('/busqueda', 'HomeController@busqueda');

Route::group(['prefix' => 'admin' , 'middleware' => ['Admin']], function() {
	CRUD::resource('residencia', 'Admin\ResidenciaCrudController');
	CRUD::resource('contacto', 'Admin\ContactoCrudController');
	CRUD::resource('ciudad', 'Admin\CiudadCrudController');
	CRUD::resource('barrio', 'Admin\BarrioCrudController');

	Route::get('residencia/{id}/fotos', 'AdminController@editarFotos');
	Route::get('residencia/{residencia_id}/image/{image_id}/default','AdminController@defaultPhoto');
	Route::post('residencia/{id}/uploadPhoto','AdminController@uploadPhoto' );
});


Route::group(['prefix' => 'api'], function() {
	Route::get('image/{id}', 'ApiController@GetImage');
	Route::get('image/{id}/delete', 'ApiController@deleteImage');
});