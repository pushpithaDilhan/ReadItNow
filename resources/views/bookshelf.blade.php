@extends('layouts.master')

@section('title')
	Book Shelf
@endsection

@section('content')
	@include('layouts.navbar-bookreader')
    <div style="margin-top:150px; display:inline-block;" class="jumbotron">
    <h2><b>Completed Reading</b></h2>
    <br>
    
    @for ($i = 0; $i < count($books); $i++)      
       
        <a href="/book/{{$books[$i]->bookid}}"><img src="{{URL::asset('/books/'.$books[$i]->bookid.'.jpg')}}" alt="profile Pic"></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         @if (($i+1)%5 === 0)  
            <br><br><br><br><br>
         @endif
     @endfor
  
    </div>

<div style=" display:inline-block;" class="jumbotron">
    <h2><b>To Read</b></h2>
    <br>
    @for ($i = 0; $i < count($tobooks); $i++)      
       
        <a href="/book/{{$tobooks[$i]->bookid}}"><img src="{{URL::asset('/books/'.$tobooks[$i]->bookid.'.jpg')}}" alt="profile Pic"></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         @if (($i+1)%5 === 0)  
            <br><br><br><br><br>
         @endif
     @endfor 
   
</div>


@endsection