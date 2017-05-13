@extends('layouts.master')

@section('title')
	Categories
@endsection

@section('content')
	@include('layouts.navbar-bookreader')

<div class="conatiner" style="margin-top:180px;">
	
	@for ($i = 0; $i < count($searchbooks); $i++)           
        
		<div class="jumbotron" >
			<a href="/book/{{$searchbooks[$i]->id}}">
		<img src="{{URL::asset('/books/'.$searchbooks[$i]->id.'.jpg')}}" alt="profile Pic">
		</a>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="/book/{{$searchbooks[$i]->id}}" style="text-decoration:none">
		<h2 style="display:inline-block; vertical-align:top;" ><b>{{ $searchbooks[$i]->title }}</b>
		</a>
		<br>
		<p style="font-size:20px"><span class="glyphicon glyphicon-star" ></span> {{ $searchbooks[$i]->orating }}/10 </p>
		</h2>
	</div>
     @endfor	

</div>


@endsection