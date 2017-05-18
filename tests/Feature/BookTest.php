<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DB;

class BookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdate()
    {
        $book = DB::table('book')
                ->where('id','=',2)
                ->first();
        $this->assertEquals($book->title,'Heliodorus');
        $this->assertEquals($book->author,'Moses Hadas');
        $this->assertEquals($book->orating,6);
    }
    
    public function testBuy()
    {
        $book = DB::table('buy')
                ->where('bookid','=',1)
                ->first();
        $this->assertEquals($book->sellerid,1000000);
    }
    
    public function testComment()
    {
        $comment = DB::table('comments')
                ->where('bookid','=',2)
                ->where('userid','=',1006)
                ->first();
        $this->assertEquals($comment->title,'good');
        $this->assertEquals($comment->comment,'I dont know what to say');
        $this->assertEquals($comment->rating,7);
    }
    
    public function testCompleted()
    {
        $complete = DB::table('completed')
                ->where('userid','=',1003)
                ->first();
        $this->assertEquals($complete->bookid,1);
        
    }
    
    public function testToread()
    {
        $toread = DB::table('toread')
                ->where('userid','=',1003)
                ->first();
        $this->assertEquals($toread->bookid,1);
        
    }
    
    public function testReview()
    {
        $review = DB::table('reviewcount')
                ->where('date','=','2017/05/1')
                ->first();
        $this->assertEquals($review->count,10);
        
    }
    
}
