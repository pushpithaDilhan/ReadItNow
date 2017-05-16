<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Session;

class BookController extends Controller
{    
    
    public function update(Request $request, $id){
        //analytics
        DB::table('bookview')->where('bookid',$id)->increment('views');
        DB::table('analytics')->where('refno',1)->increment('count');
        
        $book = DB::table('book')->where('id',$id)->first();
        $categories = [
            '1'=>'Science Fiction',
            '2'=>'Drama',
            '3'=>'Action',
            '4'=>'Adventure',
            '5'=>'Mystery',
            '6'=>'Horror',
            '7'=>'Education',
            '8'=>'Technology',
            '9'=>'Comics',
            '10'=>'Cookbook',
            '11'=>'Biography',
            '12'=>'Fantasy'            
        ];
        $catString = '';
        foreach ( explode(" ",$book->category) as $key) {
            $catString.= $categories[$key].' / ';
        }
        
        $comments = DB::table('comments')
            ->join('user', 'user.id', '=', 'comments.userid')
            ->select('comments.*', 'user.fname', 'user.sname')
            ->orderBy('commentid','desc')
            ->get();          
       
        
        
        // load and send comments with the view
        return view('book',[
            'image'=>$book->id,
            'title'=>strtoupper($book->title),
            'author'=>$book->author,
            'orating'=>$book->orating,
            'description'=>$book->description,
            'category'=>substr($catString,0,-2),
            'comments'=>$comments        
        ]    
        );
        
    }
    
    public function search(Request $request){
        $query = Input::get('q');
        $searches = DB::select('select * from book where lower(title) = ?', [$query]);
        return view('searchbook',['searchbooks'=>$searches]);    
    }
    
    public function buy(Request $request, $id){
        // take book sellers for the book with $id
        $sellers = DB::select('select sellerid from buy where bookid = ?', [$id]);
        
        // get those sellers' details into an array
        $shops = [];
        $i = 0;
        foreach ($sellers as $seller) {
            $shops[$i] =  DB::table('seller')->where('sellerid',$seller->sellerid)->first();
            $i+=1;
        }
        return view('buy',['shops'=>$shops]);
        
        
    }
    
    public function updateArrivals(){
        $uid = Session::get('id');
        //$book = DB::select('select bookid from completed where userid = ?', [$uid]);
        $arrivalbook = DB::select('select id from book order by id desc;');
        return view('bookreader',['arrivalbooks'=>$arrivalbook]);
    }
    
     public function updateCompleted(){
        $uid = Session::get('id');
        $book = DB::select('select bookid from completed where userid = ?', [$uid]);
        $tobook = DB::select('select bookid from toread where userid = ?', [$uid]);
        return view('bookshelf',['books'=>$book,'tobooks'=>$book]);
    }
    
    public function completed(Request $request, $bid){
        $uid = Session::get('id'); 
        DB::table('completed')->insert([
            'userid' => $uid,
            'bookid' => $bid
            ]);  
        $controller = new BookController();
        return $controller->updateCompleted();
           
    }
    
    public function toread(Request $request, $bid){
        $uid = Session::get('id'); 
        DB::table('toread')->insert([
            'userid' => $uid,
            'bookid' => $bid
            ]);  
        $controller = new BookController();
        return $controller->updateCompleted();
         
    }
    
    public function comment(){
        $uid = Session::get('id');
        $bid = Input::get('bookid');
        $title = Input::get('title');
        $comment = Input::get('comment');
        $rating = Input::get('rating');
        
        DB::table('comments')->insert([
            'bookid' => $bid,
            'userid' => $uid,
            'rating' => $rating,
            'title' => $title,
            'comment' => $comment,
            ]);
            
        // take average ratings and update the book table
        $avg = DB::table('comments')
        ->select(DB::raw('avg(rating) as rating'))
        ->where('bookid',$bid)
        ->get();
        
        $avg = $avg[0]->rating;
        DB::table('book')
            ->where('id', $bid)
            ->update(['orating' => $avg]);    
            
        // analytics on book reviews
        $date = date("Y/m/d");
        $rec = DB::table('reviewcount')
        ->where('date', '=', $date)
        ->first();
        if(is_null($rec)){
            DB::table('reviewcount')
            ->insert([
                'date' => $date,
                'count'=> 1
                ]);
        }else{
            DB::table('reviewcount')->where('date',$date)->increment('count');
        }    
        
        return back();
    }
    
   
    
}
    
