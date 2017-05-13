@extends('layouts.master')

@section('title')
	Book reader
@endsection

@section('content')
	@include('layouts.navbar-bookreader')
    
    <div style="margin-top:150px; display:inline-block;" class="jumbotron">
    <h2><b>Popular Books</b></h2>
    <br>
    <img src="{{URL::asset('/books/b001.jpg')}}" alt="profile Pic">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="{{URL::asset('/books/b001.jpg')}}" alt="profile Pic">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="{{URL::asset('/books/b001.jpg')}}" alt="profile Pic">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="{{URL::asset('/books/b001.jpg')}}" alt="profile Pic">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="{{URL::asset('/books/b001.jpg')}}" alt="profile Pic">

    <br><br><br><br><br>
    <img src="{{URL::asset('/books/b001.jpg')}}" alt="profile Pic">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="{{URL::asset('/books/b001.jpg')}}" alt="profile Pic">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="{{URL::asset('/books/b001.jpg')}}" alt="profile Pic">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="{{URL::asset('/books/b001.jpg')}}" alt="profile Pic">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="{{URL::asset('/books/b001.jpg')}}" alt="profile Pic">

</div>

<div style=" display:inline-block;" class="jumbotron">
    <h2><b>New Arrivals</b></h2>
    <br>
    @for ($i = 0; $i < count($arrivalbooks); $i++)      
       
        <a href="/book/{{$arrivalbooks[$i]->id}}"><img src="{{URL::asset('/books/'.$arrivalbooks[$i]->id.'.jpg')}}" alt="profile Pic"></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         @if (($i+1)%5 === 0)  
            <br><br><br><br><br>
         @endif
     @endfor

</div>


@endsection