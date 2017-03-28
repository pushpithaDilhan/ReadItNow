@extends('layouts.master')

@section('title')
	Categories
@endsection

@section('content')
	@include('layouts.navbar-bookreader')

<div class="conatiner" style="margin-top:180px;">

	<div class="jumbotron" >
	<img src="{{URL::asset('/books/b001.jpg')}}" alt="profile Pic">
	&nbsp;&nbsp;&nbsp;&nbsp;
	<h2 style="display:inline-block; vertical-align:top;" ><b>COLLECTED ANCIENT GREEK NOVELS</b>
		<br>
		<p style="display:inline-block; vertical-align:top;font-size:20px"> Mystery / Action / Horror </p>
		<p style="font-size:20px"><span class="glyphicon glyphicon-star" ></span> 5/10 </p>
		</h2>
	</div>

	<div class="jumbotron" >
	<img src="{{URL::asset('/books/b001.jpg')}}" alt="profile Pic">
	&nbsp;&nbsp;&nbsp;&nbsp;
	<h2 style="display:inline-block; vertical-align:top;" ><b>COLLECTED ANCIENT GREEK NOVELS</b>
		<br>
		<p style="display:inline-block; vertical-align:top;font-size:20px"> Mystery / Action / Horror </p>
		<p style="font-size:20px"><span class="glyphicon glyphicon-star" ></span> 5/10 </p>
	
	</h2>
	</div>

	<div class="jumbotron" >
	<img src="{{URL::asset('/books/b001.jpg')}}" alt="profile Pic">
	&nbsp;&nbsp;&nbsp;&nbsp;
	<h2 style="display:inline-block; vertical-align:top;" ><b>COLLECTED ANCIENT GREEK NOVELS</b>
		<br>
		<p style="display:inline-block; vertical-align:top;font-size:20px"> Mystery / Action / Horror </p>
		<p style="font-size:20px"><span class="glyphicon glyphicon-star" ></span> 5/10 </p>
	</div>
	</h2>
	

</div>


@endsection