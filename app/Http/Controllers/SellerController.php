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
                
        
        if($psswd != $rpsswd){
            return redirect('/signupbookseller')->with('password status', 'Passwords do not match.');        
        }
        //insert data to the user table
        DB::table('seller')->insert([
            'id' => $id,
            'fname' => $fname, 
            'sname' => $sname,
            'email' => $email,
            'password' => hash('md5',$psswd),
            'byear' => $year,
            'bmonth' => $month,
            'bdate' => $day,
            'gender' => $gender,
            ]);
            
        //insert data to the login table
        DB::table('login')->insert([
            'id' => $id,
            'fname' => $fname, 
            'sname' => $sname,
            'email' => $email,
            'password' => hash('md5',$psswd),
            'role' => 'r',
            ]);
            
        return redirect('/signupbookseller')->with('reg status', 'You have been registered. Log in to continue.');    
    }
    
}