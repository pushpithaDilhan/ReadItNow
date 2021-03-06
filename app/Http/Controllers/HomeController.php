<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;

class HomeController extends Controller
{
    public function doLogin(){
        $email = Input::get('username');
        $password =hash('md5',Input::get('password'));
        
        $user = DB::table('login')->where('email',$email)->where('password',$password)->get();
        $user = json_decode($user,true);
        if( $user==[]){
           return redirect('/')->with('status', 'Username or Password is incorrect.');
        }
        
        Session::put('role',$user[0]['role']);
        Session::put('id',$user[0]['id']);
        Session::put('fname',$user[0]['fname']);
        Session::put('sname',$user[0]['sname']);
        
        //analytics
        DB::table('analytics')->where('refno',2)->increment('count');
        
        if($user[0]['role']=='r'){
            DB::table('analytics')->where('refno',4)->increment('count');
            return redirect('/bookreader');
        }
        if($user[0]['role']=='s'){
            DB::table('analytics')->where('refno',5)->increment('count');
            return redirect('/bookviews');
        }
        if($user[0]['role']=='a'){
            return redirect('/admin');
        }
    }
    
    public function doSignUp(){
        $id = DB::table('user')->max('id') + 1;
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
            return redirect('/')->with('password status', 'Passwords do not match.');        
        }
        //insert data to the user table
        DB::table('user')->insert([
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
            
        // analytics on registered readers
        $date = date("Y/m/d");
        $rec = DB::table('readercount')
        ->where('date', '=', $date)
        ->first();
        if(is_null($rec)){
            DB::table('readercount')
            ->insert([
                'date' => $date,
                'count'=> 1
                ]);
        }else{
            DB::table('readercount')->where('date',$date)->increment('count');
        }
            
        return redirect('/')->with('reg status', 'You have been registered. Log in to continue.');        
        
    }
    
    public function logout(){
        Session::flush();
        
        //analytics
        DB::table('analytics')->where('refno',2)->decrement('count');
        
        return redirect('/');
        
    }
        
    
}