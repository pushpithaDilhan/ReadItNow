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
    // analytics on page views
    $date = date("Y/m/d");
    $rec = DB::table('appviews')
    ->where('date', '=', $date)
    ->first();
    if(is_null($rec)){
        DB::table('appviews')
        ->insert([
            'date' => $date,
            'views'=> 1
            ]);
    }else{
        DB::table('appviews')->where('date',$date)->increment('views');
    }
    
    // view the home page
    return view('login.welcome');
});

Route::get('/bookreader', array('uses'=>'BookController@updateArrivals'));

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/book/{id}', ['uses'=>'BookController@update']);

Route::get('/buy/{id}', ['uses'=>'BookController@buy']);

Route::get('/searchbook',['uses'=>'BookController@search']);


Route::post('/login',array('uses'=>'HomeController@doLogin'));
    
Route::get('/logout', array('uses'=>'HomeController@logout'));

Route::post('/signup',array('uses'=>'HomeController@doSignUp'));

Route::post('/sellerregister',array('uses'=>'SellerController@register'));

Route::get('/completed/{id}', ['uses'=>'BookController@completed']);

Route::get('/list/{id}', ['uses'=>'SellerController@listseller']);

Route::get('/toread/{id}', ['uses'=>'BookController@toread']);

Route::get('/bookshelf', array('uses'=>'BookController@updateCompleted'));

Route::post('/comment',array('uses'=>'BookController@comment'));

Route::post('/categories/submit',array('uses'=>'UserController@submitCategory'));

Route::get('/signupbookseller', function () {
    return view('signupbookseller');
});

Route::get('/addbook', function () {
    return view('addbook');
});

Route::get('/bookseller', function () {
    return view('bookseller');
});

Route::post('/addbook/request',array('uses'=>'SellerController@request'));

Route::get('/bookviews', ['uses'=>'SellerController@views']);

Route::get('/index', function () {
    return view('index');
});

Route::get('/admin',  ['uses'=>'AdminController@dashboard']);

Route::get('/admin/readers', ['uses'=>'AdminController@readers']);


Route::get('/admin/reviews',  ['uses'=>'AdminController@reviews']);

Route::get('/admin/books',  ['uses'=>'AdminController@views']);

Route::get('/admin/addadmin', function () {
    return view('adminview.addadmin');
});

Route::get('/admin/bookrequests', ['uses'=>'AdminController@bookrequests']);

Route::post('/admin/signup',array('uses'=>'AdminController@doSignUp'));

//not working fix again
Route::get('/admin/accept/{$id}', ['uses'=>'AdminController@acceptBook']);

Route::get('/admin/reject/{$id}', ['uses'=>'AdminController@rejectBook']);
//------------------------


// testing routes
Route::get('/test1', function () {
    $date = date("Y/m/d");
    $rec = DB::table('appview')
    ->where('date', '=', $date)
    ->first();
    if(is_null($rec)){
        DB::table('appview')
        ->insert([
            'date' => $date,
            'count'=> 1
            ]);
    }else{
        DB::table('appview')->where('date',$date)->increment('count');
    }
    
});

Route::get('/test2', function () {
    return view('dragdroptest');
});


Route::get('/test3', function () {
    $avg = DB::table('comments')
        ->select(DB::raw('avg(rating) as rating'))
        ->where('bookid',2)
        ->get();
        
    return $avg[0]->rating;
});

Route::get('/test4', function () {
    $allbooks = DB::table('book')->count();
    $newbooks = DB::table('analytics')->where('refno', '=', 3)->first()->count;  
    $viewstoday = DB::table('analytics')->where('refno', '=', 1)->first()->count; 
    $overall = DB::table('bookview')
                ->select(DB::raw('SUM(views) as views'))
                ->first()->views;
    return $overall;
});

Route::get('/test5', function () {
    $request = DB::table('request')->get();
    return $request;
});

Route::get('getsession',function(){
    dd(Session::all());
});

Route::get('/test6', function () {
    $allbooks = DB::table('book')->count();
    $allreaders = DB::table('user')->count();
    $allsellers = DB::table('seller')->count();
    $alladmins = DB::table('admin')->count();
    
    $appviews = DB::table('appviews')->orderBy('id', 'desc')->first()->views;
    $reviewcount = DB::table('reviewcount')->orderBy('id', 'desc')->first()->count;
    $readercount = DB::table('readercount')->orderBy('id', 'desc')->first()->count;
    $activeusers = DB::table('analytics')->where('refno', '=', 2)->first()->count;
    
    $graphdata = DB::table('appviews')->orderBy('id','desc')->take(15)->get();
    
    return view('adminview.index', [
        'graphdata'=>$graphdata,
        
        'appviews'=>$appviews,
        'reviews'=>$reviewcount,
        'newusers'=>$readercount,
        'activeusers'=>$activeusers,
        
        'allbooks'=>$allbooks,
        'allreaders'=>$allreaders,
        'allsellers'=>$allsellers,
        'alladmins'=>$alladmins
        
        ]);
});

Route::get('/seed1', function () {
    $x = 'readercount';
    $date = '2017/05/1';     
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 10
            ]);
            
    $date = '2017/05/2';     
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 11
            ]);
            
    $date = '2017/05/3' ;    
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 21
            ]);
            
    $date = '2017/05/4' ;    
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 21
            ]);
            
    $date = '2017/05/5';     
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 11
            ]);
            
    $date = '2017/05/6'  ;   
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 5
            ]);
            
    $date = '2017/05/7' ;    
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 9
            ]);
            
                   
    $date = '2017/05/8' ;    
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 9
            ]);
    
    $date = '2017/05/9';     
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 10
            ]);
            
    $date = '2017/05/10';     
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 11
            ]);
            
    $date = '2017/05/11' ;    
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 21
            ]);
            
    $date = '2017/05/12' ;    
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 21
            ]);
            
    $date = '2017/05/13';     
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 11
            ]);
            
    $date = '2017/05/14'  ;   
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 5
            ]);
            
    $date = '2017/05/15' ;    
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 9
            ]);
            
                   
    $date = '2017/05/16' ;    
    DB::table($x)
        ->insert([
            'date' => $date,
            'count'=> 9
            ]);
    return "done";
});
