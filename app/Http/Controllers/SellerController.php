<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;


class SellerController extends Controller
{
    public function register(){
        $sellerid = DB::table('seller')->max('sellerid') + 1;
        $shop = Input::get('shop_name');
        $address = Input::get('address');
        $web = Input::get('webaddress');
        $hotline = Input::get('hotline');
        $email = Input::get('email');
        $password = Input::get('password');
        $rpassword = Input::get('rpassword');
                
        
        if($password != $rpassword){
            return redirect('/signupbookseller')->with('password status', 'Passwords do not match.');        
        }
        //insert data to the user table
        DB::table('seller')->insert([
            'sellerid' => $sellerid,
            'name' => $shop, 
            'email' => $email,
            'password' => hash('md5',$password),
            'telephone' => $hotline,
            'address' => $address,
            'website' => $web
            ]);
            
        //insert data to the login table
        DB::table('login')->insert([
            'id' => $sellerid,
            'fname' => $shop, 
            'sname' => $shop,
            'email' => $email,
            'password' => hash('md5',$password),
            'role' => 's',
            ]);
            
        return redirect('/')->with('reg status', 'You have been registered. Log in to continue.');    
    }
    
    public function listseller(Request $request, $bid){
        $uid = Session::get('id'); 
        $seller = DB::table('buy')
                  ->where('bookid', '=', $bid)
                  ->where('sellerid', '=', $uid)
                  ->first();

    if (is_null($seller)) {
        
    // It does not exist 
    DB::table('buy')->insert([
            'bookid' => $bid,
            'sellerid' => $uid
            ]);
            
    } 
    return back()   ;    
    }
    
    public function request(){
        $uid = Session::get('id');
        $bookname =  Input::get('bookname');
        $author =  Input::get('author');
        $coverlink =  Input::get('coverlink');
        $description = Input::get('description');
        $availability = 0 ;
        
        
        $catstr='';
        
            if(Input::get('scifi')){$catstr .= '1 ';}
            if(Input::get('drama')){$catstr .= '2 ';}
            if(Input::get('action')){$catstr .= '3 ';}
            if(Input::get('adventure')){$catstr .= '4 ';}
            if(Input::get('mystery')){$catstr .= '5 ';}
            if(Input::get('horror')){$catstr .= '6 ';}
            if(Input::get('educational')){$catstr .= '7 ';}
            if(Input::get('technology')){$catstr .= '8 ';}
            if(Input::get('comics')){$catstr .= '9 ';}
            if(Input::get('cookbooks')){$catstr .= '10 ';}
            if(Input::get('biography')){$catstr .= '11 ';}
            if(Input::get('fantasy')){$catstr .= '12 ';}
            
            if(Input::get('availability')){$availability = 1;}
      
        
        DB::insert('insert into request ( sellerid, bookname , author , category , description , coverlink ,availability ) values (?,?,?,?,?,?,?)', 
        [$uid,$bookname,$author,rtrim($catstr),$description,$coverlink,$availability]);
        
        return redirect('/bookseller');     
        
        
    }
    
}