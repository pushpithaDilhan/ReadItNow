@extends('layouts.master')

@section('title')
	Admin Login
@endsection

@section('content')
	<form class="jumbotron vertical-center" action="/login" method="POST" style="margin-left:300px; margin-top:200px ; width:400px;">
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="email" size="20" class="form-control" name="username" placeholder="Email adress">
            <br>
            <input type="password" size="20" class="form-control" name="password" placeholder="Password">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Log In</button>
    </form>

@endsection