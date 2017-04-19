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
    return view('login.welcome');
});

Route::get('/admin', function () {
    return view('login.admin');
});

Route::get('/bookreader', function () {
    //return view('bookreader');
    return 'fbdskj';
});

Route::get('/bookshelf', function () {
    return view('bookshelf');
});

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/book/{id}', ['uses'=>'BookController@update']);

Route::get('/searchbook', function () {
    return view('searchbook');
});

Route::post('/login',array('uses'=>'HomeController@doLogin'));
    
Route::get('/logout', function () {
    return view('login.welcome');
});

Route::post('/signup',array('uses'=>'HomeController@doSignUp'));

Route::get('/test', function () {
    return hash('md5','piyal');
});