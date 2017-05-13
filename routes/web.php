<?php
use Illuminate\Support\Facades\Input;


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
    return view('index');
    //return "ok";
});



Route::get('/bookreader', array('uses'=>'BookController@updateArrivals'));

/*
Route::get('/bookshelf', function () {
    return view('bookshelf');
});
*/

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/book/{id}', ['uses'=>'BookController@update']);

Route::get('/buy/{id}', ['uses'=>'BookController@buy']);

/**
Route::get('/searchbook', function () {
    return view('searchbook');
});
**/



Route::get('/searchbook',['uses'=>'BookController@search']);


Route::post('/login',array('uses'=>'HomeController@doLogin'));
    
Route::get('/logout', array('uses'=>'HomeController@logout'));

Route::post('/signup',array('uses'=>'HomeController@doSignUp'));

Route::post('/sellerregister',array('uses'=>'SellerController@register'));

Route::get('/completed/{id}', ['uses'=>'BookController@completed']);

Route::get('/toread/{id}', ['uses'=>'BookController@toread']);

Route::get('/bookshelf', array('uses'=>'BookController@updateCompleted'));

Route::post('/comment',array('uses'=>'BookController@comment'));

Route::post('/categories/submit',array('uses'=>'UserController@submitCategory'));

Route::get('/test', function () {
    $avg = DB::table('comments')
        ->select(DB::raw('avg(rating) as rating'))
        ->where('bookid',2)
        ->get();
        
    return $avg[0]->rating;
});

Route::get('getsession',function(){
    dd(Session::all());
});

Route::get('/signupbookseller', function () {
    return view('signupbookseller');
});