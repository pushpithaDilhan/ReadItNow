@extends('layouts.master')

@section('title')
	Book Shelf
@endsection

@section('content')
	@include('layouts.navbar-bookreader')

	<div style="margin-top:180px;">
	<img src="{{URL::asset('/books/'.$image.'.jpg')}}" alt="profile Pic" style="display:inline; margin-left:80px;" width="256" height="384"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<h2 style="display:inline-block; vertical-align:top;" ><b>{{$title}}</b>
		<br>
		<p style="display:inline-block; vertical-align:top;font-size:20px">{{$author}}</p>
		<br>
		<p style="display:inline-block; vertical-align:top;font-size:20px"> {{$category}} </p>
		<br>
		<p style="font-size:20px"><span class="glyphicon glyphicon-star" ></span> {{$orating}}/10 </p>
		<br>
		<p style="font-size:20px"> <b> Description </b></p>
		<p style="font-size:18px">{{$description}}</p>
		@if(Session::get('role')=='r')
		<a href="../completed/{{$image}}"><button type="submit" class="btn btn-success"  style="display:inline-block;">I have read</button></a>
		<a href="../toread/{{$image}}"><button type="submit" class="btn btn-info"  style="display:inline-block;">I need to read</button></a>
		<br><br>
		<a href="../buy/{{$image}}"><button type="submit" class="btn btn-danger" style="display:inline-block;">Where to buy</button></a>
		@endif	
	</div>


	</h2>
	
<br><br>

@if(Session::get('role')=='r')
<h3 style="margin-left:50px;">Leave a review</h3>
<form style="margin-left:50px; margin-right:50px;" action="/comment" method="POST">
  <input type="hidden" name="bookid" value="{{ $image }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="title">Title :</label>
    <input type="text" name="title" class="form-control" id="title-comment">
  </div>
  <div class="form-group">
    <label for="comment">Review :</label>
    <textarea class="form-control" name="comment" rows="5" required></textarea>
  </div>

  <select class="form-group btn" name="rating">
  	<option value="" disabled selected>Rate</option>
  	<option>10</option>
  	<option>9</option>
  	<option>8</option>
  	<option>7</option>
  	<option>6</option>
  	<option>5</option>
  	<option>4</option>
  	<option>3</option>
  	<option>2</option>
  	<option>1</option>
  </select>

	&nbsp;&nbsp;
  <button type="submit" class="btn btn-success" style="display:inline-block;">Submit</button>
</form>
	

<br><br>
@endif
	<div id="movie-reviews">
		<h3><span class="glyphicon glyphicon-star"></span>  Book Reviews</h3>
		<br>
		
		@for ($i = 0; $i < count($comments); $i++)        
				
		<div class="jumbotron">
			<div>
			Reviewed by <span ><b>{{ $comments[$i]->fname }} {{ $comments[$i]->sname }}</b></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="review-rating">{{ $comments[$i]->rating }} / 10</span>
			</div>
			<h4>{{ $comments[$i]->title }}</h4>
			<article  style="height: 125px;">
			<p>
				{{ $comments[$i]->comment }}
			</p>
			</article>
		</div>

     	@endfor


	</div>

@endsection

