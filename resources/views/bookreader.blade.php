@extends('layouts.master')

@section('title')
	Book reader
@endsection

@section('content')
	@include('layouts.navbar-bookreader')
    
    <div style="margin-top:150px; display:inline-block;" class="jumbotron">
    <h2><b>Popular Books</b></h2>
    <br>
    @for ($i = 0; $i < count($popularbooks); $i++)      
       
        <a href="/book/{{$popularbooks[$i]->bookid}}"><img src="{{URL::asset('/books/'.$popularbooks[$i]->bookid.'.jpg')}}" alt="profile Pic"></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         @if (($i+1)%5 === 0)  
            <br><br><br><br><br>
         @endif
     @endfor

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