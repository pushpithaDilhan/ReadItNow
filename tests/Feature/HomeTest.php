<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DB;

class HomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    
    public function testLogin(){
        $user = DB::table('login')
                ->where('email','=','seller@gmail.com')
                ->where('password',hash('md5','seller'))
                ->first();
        $this->assertEquals($user->role,'s');
        $this->assertEquals((int)$user->id,1000002);
    }
    
    public function testSignup(){
        $user = DB::table('user')
                ->where('id','=',1000)
                ->first();
        
        $this->assertEquals($user->fname,'Pushpitha');
        $this->assertEquals($user->sname,'Dilhan');
        $this->assertEquals($user->email,'reader@gmail.com');
        $this->assertEquals($user->password,'755fbe7e0e0f7d762259253b06c238ea');
        $this->assertEquals($user->byear,1994);
        $this->assertEquals($user->bmonth,11);
        $this->assertEquals($user->bdate,29);
        $this->assertEquals($user->gender,'m');
    }
    
    
    
    
    
    
}
