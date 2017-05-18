<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DB;

class AdminTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testToread()
    {
        $toread = DB::table('admin')
                ->where('userid','=',1003)
                ->first();
        $this->assertEquals($toread->bookid,1);
        
    }
}
