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

Route::get('/', 'welcome@index');
Route::get('', 'welcome@index');

route::get('/login', 'login@tampilLogin');
route::get('/dashboard', 'HomeController@dashboard');
route::post('/cari', 'HomeController@carisiswa');
route::post('/input', 'HomeController@inputAbsen');
route::post('/cariulangan', 'HomeController@cariulangan');
route::post('/inputUlanganHarian', 'HomeController@inputUlanganHarian');
route::post('/inputTtsTas', 'HomeController@inputTtsTas');
route::post('/inputEkskul', 'HomeController@inputEkskul');
route::post('/inputKarakter', 'HomeController@inputKarakter');
route::post('/showraport', 'showRaport@showraport');
route::post('/showraportadmin', 'showRaport@showraportadmin');
route::get('/showraport', 'showRaport@showraport');
route::get('/landing', 'visitor@landing');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
route::get('/update', 'HomeController@update');
route::POST('/updateulhar', 'HomeController@updateUlanganHarian');
route::POST('/deleteulhar', 'HomeController@deleteUlanganHarian');
route::POST('/updatetts', 'HomeController@updatetts');
route::POST('/updatetas', 'HomeController@updatetas');
route::POST('/deletetas', 'HomeController@deletetas');
route::POST('/deletetts', 'HomeController@deletetts');
route::POST('/updateabsensi', 'HomeController@updateabsensi');
route::POST('/deleteabsensi', 'HomeController@deleteabsensi');
route::POST('/updateekskul', 'HomeController@updateekskul');
route::POST('/deleteekskul', 'HomeController@deleteekskul');
route::POST('/updatekarakter', 'HomeController@updatekarakter');
route::POST('/deletekarakter', 'HomeController@deletekarakter');
