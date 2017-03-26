
<nav class="navbar navbar-inverse navbar-fixed-top" style="margin-top:95px;">
  	<div class="container-fluid">

  	<!-- home button -->
  	<ul class="nav navbar-nav">
  		<li class="glyphicon"><a href="/"><span style=".glyphicon{font-size: 110px;}" class="glyphicon glyphicon-home"></span></a></li>
  	</ul>	
    
    <!-- search bar -->
    <form class="navbar-form navbar-left">
      <div class="form-group">
        <input type="text" class="form-control" size="50" placeholder="Search books">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
    </form>


    <ul class="nav navbar-nav">
    	@section('navbar-buttons')
    	<!-- buttons for functionalities 
    
      	<li ><a href="#">Page 1</a></li>
      	<li ><a href="#">Page 2</a></li>

      	-->
      @show
    </ul>
    
	

    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-log-in" style=".glyphicon{font-size: 75px;}"></span> Logout</a></li>
    </ul>
	

  </div>
</nav>

