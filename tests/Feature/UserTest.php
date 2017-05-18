<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DB;

class UserTest extends TestCase
{
    public function test_views(){
        // test category code to category text conversion
        $book = DB::table('book')->where('id',1)->first();
        $categories = [
            '1'=>'Science Fiction',
            '2'=>'Drama',
            '3'=>'Action',
            '4'=>'Adventure',
            '5'=>'Mystery',
            '6'=>'Horror',
            '7'=>'Education',
            '8'=>'Technology',
            '9'=>'Comics',
            '10'=>'Cookbook',
            '11'=>'Biography',
            '12'=>'Fantasy'            
        ];
        $catString = '';
        foreach ( explode(" ",$book->category) as $key) {
            $catString.= $categories[$key].' / ';
        }
        $catString = rtrim(substr($catString,0,-2));
        $this->assertEquals($catString,"Action / Mystery / Horror");
    }

}
