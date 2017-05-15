@extends('layouts.master')

@section('title')
	Book reader
@endsection

@section('content')
	@include('layouts.navbar-bookseller')
        <div class="container" style="margin-top: 50px;">    
    
<form class="navbar-form navbar-right" style="margin-top: 50px;"  role="search" action="/addbook/request" method="POST">
        <h2 style="margin-top: 1px; color:#ffffff "><b>Create an account</b></h2>
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <br>
			<input type="text" class="form-control" placeholder="Book name" name="bookname" size="50">
            <br><br>
            <input type="text" class="form-control" placeholder="Author" name="author" size="50">
			<br><br>
			
			<div class="[ form-group ]" style="display:inline; padding:1em; margin-top:20px;">
            <input type="checkbox" name="scifi" id="scifi" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="scifi" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="scifi" class="[ btn btn-default active ]">
                    Science Fiction
                </label>
            </div>
        </div>
		
		<div class="[ form-group ]" style="display:inline; padding:1em; margin-top:20px;">
            <input type="checkbox" name="drama" id="drama" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="drama" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="drama" class="[ btn btn-default active ]">
                    Drama
                </label>
            </div>
        </div>
		
		<div class="[ form-group ]" style="display:inline;padding:1em; margin-top:20px;">
            <input type="checkbox" name="action" id="action" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="action" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="action" class="[ btn btn-default active ]">
                    Action
                </label>
            </div>
        </div>
		
		<div class="[ form-group ]" style="display:inline;padding:1em; margin-top:20px;">
            <input type="checkbox" name="adventure" id="adventure" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="adventure" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="adventure" class="[ btn btn-default active ]">
                    Adventure
                </label>
            </div>
        </div>
		
		<div class="[ form-group ]" style="display:inline;padding:1em; margin-top:20px;">
            <input type="checkbox" name="mystery" id="mystery" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="mystery" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="mystery" class="[ btn btn-default active ]">
                    Mystery
                </label>
            </div>
        </div>
		
		<div class="[ form-group ]" style="display:inline;padding:1em; margin-top:20px;">
            <input type="checkbox" name="horror" id="horror" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="horror" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="horror" class="[ btn btn-default active ]">
                    Horror
                </label>
            </div>
        </div>
		<br><br>
		<div class="[ form-group ]" style="display:inline;padding:1em; margin-top:20px;">
            <input type="checkbox" name="educational" id="educational" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="educational" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="educational" class="[ btn btn-default active ]">
                    Educational
                </label>
            </div>
        </div>
		
		<div class="[ form-group ]" style="display:inline;padding:1em; margin-top:20px;">
            <input type="checkbox" name="technology" id="technology" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="technology" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="technology" class="[ btn btn-default active ]">
                    Technology
                </label>
            </div>
        </div>

		<div class="[ form-group ]" style="display:inline;padding:1em; margin-top:20px;">
            <input type="checkbox" name="comics" id="comics" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="comics" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="comics" class="[ btn btn-default active ]">
                    Comics
                </label>
            </div>
        </div>
		
		<div class="[ form-group ]" style="display:inline;padding:1em; margin-top:20px;">
            <input type="checkbox" name="cookbooks" id="cookbooks" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="cookbooks" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="cookbooks" class="[ btn btn-default active ]">
                    Cook Books
                </label>
            </div>
        </div>
		
		<div class="[ form-group ]" style="display:inline;padding:1em; margin-top:20px;">
            <input type="checkbox" name="biography" id="biography" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="biography" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="biography" class="[ btn btn-default active ]">
                    Biography
                </label>
            </div>
        </div>
		
		<div class="[ form-group ]" style="display:inline;padding:1em; margin-top:20px;">
            <input type="checkbox" name="fantasy" id="fantasy" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fantasy" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fantasy" class="[ btn btn-default active ]">
                    Fantasy
                </label>
            </div>
        </div>

		<br><br>
			
            <input type="text" class="form-control" placeholder="Cover link" name="coverlink" size="50">
			<br>
			<br>
			<textarea name="description" cols="50" class="form-control" rows="4" placeholder="Description"></textarea>
			
			<br>
			<br>           
            
			
			<div class="[ form-group ]" style="display:inline;padding:1em; margin-top:20px;">
            <input type="checkbox" name="availability" id="availability" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="availability" class="[ btn btn-danger ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="availability" class="[ btn btn-default active ]">
                    We have this book
                </label>
            </div>
        </div>
			
            </div>
			
       
        
        <div>
            <br><button type="submit" class="btn btn-info">Request</button>
        </div>
        
        
</form> 

</div>
    
@endsection