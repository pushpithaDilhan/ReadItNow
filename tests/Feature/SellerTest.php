<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DB;

class SellerTest extends TestCase
{
    public function test_seller(){
        $seller = DB::table('seller')
                ->where('sellerid','=',1000000)
                ->first();
        $this->assertEquals($seller->name,"Thusitha bookshop");
        $this->assertEquals($seller->email,"thusithabookshop@gmail.com");
        $this->assertEquals($seller->password,"84e245ec1299faaed07f8e51808d9ace");
        $this->assertEquals($seller->telephone, '0912247685' );
        $this->assertEquals($seller->address,"Main Street Galle");
        $this->assertEquals($seller->website,"www.thusithabs.com");
    }
    
    public function test_views(){
        // test the join of book and bookview tables
        $views = DB::table('book')
                ->join('bookview', 'book.id', '=', 'bookview.bookid')
                ->select('id','title', 'author','orating','views','category')
                ->where('bookid',1)
                ->orderBy('views','desc')
                ->first();
        $this->assertEquals($views->title,"Collected ancient greek novels");
        $this->assertEquals($views->author,"B.P.Reardon");
        $this->assertEquals($views->category,"3 5 6");
        
    }
}