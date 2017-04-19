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
	</div>


	</h2>
	
<br><br>

<h3 style="margin-left:50px;">Leave a review</h3>
<form style="margin-left:50px; margin-right:50px;">
  <div class="form-group">
    <label for="title">Title :</label>
    <input type="text" class="form-control" id="title-comment">
  </div>
  <div class="form-group">
    <label for="comment">Review :</label>
    <textarea class="form-control" rows="5" required></textarea>
  </div>

  <select class="form-group btn">
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

	<div id="movie-reviews">
		<h3><span class="glyphicon glyphicon-star"></span>  Book Reviews</h3>
		<br>

		<div class="jumbotron">
			<div>
			Reviewed by <span ><b>Ema Zan</b></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="review-rating">2 / 10</span>
			</div>
			<h4>Unwatchable</h4>
			<article  style="height: 125px;">
			<p>Aside the nonsense plot, the total lack of logic and the poor script
			that I could expect from a full action-based movie, there is this
			filming style where the camera flies, rebound, shakes, zoom in and out
			(so close that I can see the skin cells of alice and suddenly from 50
			feets in the air) that makes the action scenes impossible to follow,
			and the actions scenes are like the 99% of the movie so the movie is
			unwatchable.
			</article>
		</div>

		<div class="jumbotron">
			<div>
			Reviewed by <span ><b>Ema Zan</b></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="review-rating">2 / 10</span>
			</div>
			<h4>Unwatchable</h4>
			<article  style="height: 125px;">
			<p>Aside the nonsense plot, the total lack of logic and the poor script
			that I could expect from a full action-based movie, there is this
			filming style where the camera flies, rebound, shakes, zoom in and out
			(so close that I can see the skin cells of alice and suddenly from 50
			feets in the air) that makes the action scenes impossible to follow,
			and the actions scenes are like the 99% of the movie so the movie is
			unwatchable.
			</article>
		</div>
		<br><br>


	</div>

@endsection

