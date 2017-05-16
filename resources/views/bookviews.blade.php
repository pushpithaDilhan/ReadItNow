@extends('layouts.master')

@section('title')
	Book reader
@endsection

@section('content')
	@include('layouts.navbar-bookseller')
    
    <table class="table table-hover" style="margin-top:180px;">
        
        <tr>
        <th>Book</th>
        <th>Author</th>
        <th>Ratings</th>
        <th>Views</th>
        </tr>
        
        @foreach($views as $view)
        <tr>
        <td><a href="/book/{{$view->id}}" style="text-decoration:none">{{ $view->title }}</a></td>
        <td>{{ $view->author }}</td>
        <td>{{ $view->orating }}</td>
        <td>{{ $view->views }}</td>        
        </tr>
        @endforeach
        
    </table>
@endsection