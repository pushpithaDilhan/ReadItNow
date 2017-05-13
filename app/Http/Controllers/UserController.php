<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;

class UserController extends Controller
{
        
    public function submitCategory(){
        $uid = Session::get('id');
        $values =  Input::all();
        
        DB::table('categories')->where('userid', $uid )->delete();
        
        
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
      
        
        DB::insert('insert into categories ( userid, categories ) values (?, ? )', 
        [$uid,rtrim($catstr)]);
        
        return redirect('/bookreader');
        
        
    }
        
}
