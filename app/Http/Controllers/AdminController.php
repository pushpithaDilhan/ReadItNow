<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;

class AdminController extends Controller
{
        
    public function acceptBook(){              
        // all the record to the book table and remove from request table
        DB::table('analytics')->where('refno',3)->increment('count');
    }
    
    public function rejectBook(){              
        // remove the record from request table
    }
        
}
