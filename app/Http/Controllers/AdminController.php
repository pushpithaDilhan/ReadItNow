<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;

class AdminController extends Controller
{
        
    public function acceptBook(Request $request, $id){              
        // all the record to the book table and remove from request table
        DB::table('analytics')->where('refno',3)->increment('count');
        
        return $id;
    }
    
    public function rejectBook(){              
        // remove the record from request table
        return "reject ";
    }
    
    public function views(){ 
        
        $allbooks = DB::table('book')->count();
        $newbooks = DB::table('analytics')->where('refno', '=', 3)->first()->count;  
        $viewstoday = DB::table('analytics')->where('refno', '=', 1)->first()->count; 
        $overall = DB::table('bookview')
                    ->select(DB::raw('SUM(views) as views'))
                    ->first()->views;      
        
        $views = DB::table('book')
            ->join('bookview', 'book.id', '=', 'bookview.bookid')
            ->select('id','title', 'author','orating','views')
            ->orderBy('views','desc')
            ->get();
         
        return view('adminview.books',['views'=>$views,'allbooks'=>$allbooks,'newbooks'=>$newbooks,'viewstoday'=>$viewstoday,'overall'=>$overall]);
              
    }
    
    public function doSignUp(){
        $id = DB::table('admin')->max('id') + 1;
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
            return redirect('/admin/addadmin')->with('password status', 'Passwords do not match.');        
        }
        //insert data to the user table
        DB::table('admin')->insert([
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
            'role' => 'a',
            ]);       
            
        return redirect('/admin/addadmin')->with('reg status', 'A new admin has been registered.');        
        
    }
    
    public function bookrequests(){
        $request = DB::table('request')->get();
        return view('adminview.bookrequests',['requests'=>$request]);
    }
    
    public function dashboard(){ 
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
    }
    
    public function readers(){ 
        
        $loggedin = DB::table('analytics')->where('refno', '=',4 )->first()->count;
        $activeusers = DB::table('analytics')->where('refno', '=', 2)->first()->count;
        $allreaders = DB::table('user')->count();
                
        $graphdata = DB::table('readercount')->orderBy('id','desc')->take(15)->get();
        
        return view('adminview.readers', [
            'graphdata'=>$graphdata,
            'loggedin'=>$loggedin,
            'totalreaders'=>$allreaders,
            'activenow'=>$activeusers            
            ]);
            
    }
    
    public function reviews(){         
        $reviewstoday = DB::table('reviewcount')->orderBy('id', 'desc')->first()->count;
        $overall = DB::table('reviewcount')
                    ->select(DB::raw('SUM(count) as count'))
                    ->first()->count;
                                
        $graphdata = DB::table('reviewcount')->orderBy('id','desc')->take(15)->get();
        
        return view('adminview.reviews', [
            'graphdata'=>$graphdata,
            'reviewstoday'=>$reviewstoday,
            'overall'=>$overall
            ]);
            
    }
        
}
