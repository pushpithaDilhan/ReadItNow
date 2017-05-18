<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DB;

class AdminTest extends TestCase
{
    public function testSignup(){
        $admin = DB::table('admin')
                ->where('id','=',1)
                ->first();
        $this->assertEquals($admin->fname,"Pushpitha");
        $this->assertEquals($admin->sname,"Some");
        $this->assertEquals($admin->email,"some@gmail.com");
        $this->assertEquals($admin->password,"03d59e663c1af9ac33a9949d1193505a");
        $this->assertEquals($admin->byear,1100);
        $this->assertEquals($admin->bmonth,1);
        $this->assertEquals($admin->bdate,1);
        $this->assertEquals($admin->gender,"m");
    }
    
    public function test_appviews(){
        $view = DB::table('appviews')
                ->where('date','=','2017/05/1')
                ->first();
        $this->assertEquals($view->views,10);
    }
    
    public function test_readercount(){
        $view = DB::table('readercount')
                ->where('date','=','2017/05/1')
                ->first();
        $this->assertEquals($view->count,10);
    }
}
