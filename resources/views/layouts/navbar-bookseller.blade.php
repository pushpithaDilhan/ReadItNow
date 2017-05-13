
<nav class="navbar navbar-default navbar-fixed-top" style="margin-top:95px;">
  	<div class="container-fluid">

  	<!-- home button -->
  	<ul class="nav navbar-nav">
  		<li class="glyphicon"><a href="/bookreader"><span style=".glyphicon{font-size: 110px;}" class="glyphicon glyphicon-home"></span></a></li>
  	</ul>	
    
    <!-- search bar -->
    <form class="navbar-form navbar-left" action="searchbook" method="GET">
      <div class="form-group">
        <input type="text" class="form-control" size="50" name="q" placeholder="Search books">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
    </form>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="/logout"><span class="glyphicon glyphicon-log-in" style=".glyphicon{font-size: 75px;}"></span> Logout</a></li>
    </ul>


    <ul class="nav navbar-nav navbar-right">
    	<li ><a href="/bookreader"><span class="glyphicon glyphicon-user" style=".glyphicon{font-size: 75px;}"></span> USER</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <form class="navbar-form">
      <a href="/categories"><button type="button" class="btn btn-info" >Categories</button></a>
    </form>
    </ul>


    <ul class="nav navbar-nav navbar-right" >
    	<form class="navbar-form">
    	<a href="/bookshelf"><button type="button" class="btn btn-info" >Book shelf</button></a>
    </form>
    </ul>
    
	

    
	

  </div>
</nav>

