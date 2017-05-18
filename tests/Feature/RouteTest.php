<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DB;

class RouteTest extends TestCase{
    
    public function test_homepage(){
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }
    
    public function test_bookpage(){
        $response = $this->call('GET', '/book/1');
        $this->assertEquals(200, $response->status());
    }
    
    public function test_buypage(){
        $response = $this->call('GET', '/buy/1');
        $this->assertEquals(200, $response->status());
    }
    
    public function test_adminpage(){
        $response = $this->call('GET', '/admin');
        $this->assertEquals(200, $response->status());
    }
    
    public function test_requestpage(){
        $response = $this->call('GET', '/admin/readers');
        $this->assertEquals(200, $response->status());
    }
    
    public function test_reviewspage(){
        $response = $this->call('GET', '/admin/reviews');
        $this->assertEquals(200, $response->status());
    }
    
    public function test_bookspage(){
        $response = $this->call('GET', '/admin/books');
        $this->assertEquals(200, $response->status());
    }
    
    public function test_addadminpage(){
        $response = $this->call('GET', '/admin/addadmin');
        $this->assertEquals(200, $response->status());
    }
    
    public function test_categoriespage(){
        $response = $this->call('GET', '/categories');
        $this->assertEquals(200, $response->status());
    }
    
    public function test_addbookpage(){
        $response = $this->call('GET', '/addbook');
        $this->assertEquals(200, $response->status());
    }
    
}