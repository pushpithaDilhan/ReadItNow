<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BookController extends Controller
{
    public function update(Request $request, $id){
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
        return view('book',[
            'image'=>$book->id,
            'title'=>strtoupper($book->title),
            'author'=>$book->author,
            'orating'=>$book->orating,
            'description'=>$book->description,
            'category'=>substr($catString,0,-2)         
        ]    
        );
    }
    
    public function search(Request $request){
        
    }
}
    
