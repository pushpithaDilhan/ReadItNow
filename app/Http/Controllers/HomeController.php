<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;

class HomeController extends Controller
{
    public function doLogin(){
        $email = Input::get('username');
        $password =hash('md5',Input::get('password'));
        
        $user = DB::table('login')->where('email',$email)->where('password',$password)->get();
        $user = json_decode($user,true);
        if($user[0]['role']=='r'){
            return view('bookreader');
        }
        if($user[0]['role']=='s'){
            return view('bookseller');
        }
        if($user[0]['role']=='a'){
            return view('admindashboard');
        }
    }
    
    public function doSignUp(){
        $fname = Input::get('first_name');
        $sname = Input::get('second_name');
        $email = Input::get('email');
        $psswd = Input::get('password');
        $rpsswd = Input::get('rpassword');
        $day = Input::get('day');
        $month = Input::get('month');
        $year = Input::get('year');
        $gender = Input::get('gender');
        
        if($gender==1){
            $gender='m';
        }else{
            $gender='f';
        }
        
        if($psswd != $rpsswd){
            return view('login.welcome');
        }
        //insert data to the user table
        DB::table('user')->insert([
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
            'fname' => $fname, 
            'sname' => $sname,
            'email' => $email,
            'password' => hash('md5',$psswd),
            'role' => 'r',
            ]);
            
        return view('login.welcome');
    }
        
    
}