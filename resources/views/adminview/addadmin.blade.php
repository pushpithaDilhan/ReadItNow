<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin - Dashboard</title>




<link rel="stylesheet" href="{!!asset('external/css/bootstrap.min.css')!!}">
<link rel="stylesheet" href="{!!asset('external/css/datepicker3.css')!!}">
<link rel="stylesheet" href="{!!asset('external/css/styles.css')!!}">
<link rel="stylesheet" href="{!!asset('external/js/lumino.glyphs.js')!!}">

<script src="{{!!asset('canvasjs.min.js')!!}}"></script>

<script type="text/javascript">
	window.onload = function() {
		var chart = new CanvasJS.Chart("chartContainer", {			
			data: [{
				type: "line",
				dataPoints: [
				  { x: 10, y: 45 },
				  { x: 20, y: 14 },
				  { x: 30, y: 20 },
				  { x: 40, y: 60 },
				  { x: 50, y: 50 },
				  { x: 60, y: 80 },
				  { x: 70, y: 40 },
				  { x: 80, y: 60 },
				  { x: 90, y: 10 },
				  { x: 100, y: 50 },
				  { x: 110, y: 40 },
				  { x: 120, y: 14 },
				  { x: 130, y: 70 },
				  { x: 140, y: 40 },
				  { x: 150, y: 90 },
				]
			}]
		});
		chart.render();
	}
	</script>
<script src="../../canvasjs.min.js"></script>
	



</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/admin">Admin</a>				
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
	
<nav class="navbar navbar-default navbar-fixed-top" style="margin-top:45px;">
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

  </div>
</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="margin-top:50px;">		
		<ul class="nav menu">
			<li><a href="/admin"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="/admin/readers"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Readers</a></li>
			<li><a href="/admin/books"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Books</a></li>
			<li><a href="/admin/reviews"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Reviews</a></li>
			<li class="active"><a href="/admin/addadmin"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Add Admin</a></li>
			<li><a href="/admin/bookrequests"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Book requests</a></li>								
		</ul>		
	</div><!--/.sidebar-->
		
	<form class="navbar-form navbar-left left" style="margin-top: 60px;margin-left:300px;"  role="search" action="/admin/signup" method="POST">
        
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <br><input type="text" class="form-control" placeholder="First name" name="first_name">
            <input type="text" class="form-control" placeholder="Second name" name="second_name"><br>
            <br><input type="text" class="form-control" placeholder="Email adress" name="email" size="48"><br>
            
            <br><input type="password" class="form-control" placeholder="New password" name="password" size="30"><br>
            <br><input type="password" class="form-control" placeholder="Reenter password" name="rpassword" size="30"><br>
            
            <br><p style="color: #000000"><b>Birthday</b></p>  
            <input type="number" name="day" placeholder="Day" class="form-control" min="1" max="31">&nbsp;&nbsp;
            <input type="number" name="month" placeholder="Month" class="form-control" min="1" max="12"> &nbsp;&nbsp;
            <input type="number" name="year" placeholder="Year" class="form-control"> 
             <br>  
            <input type="radio" name="gender" class="form-control" value="0"><label style="color: #000000">Female</label> &nbsp;
            <input type="radio" name="gender" class="form-control" value="1"><label style="color: #000000">Male</label> 
        </div>
        @if (session('password status'))
              <div class="alert alert-danger">
              {{ session('password status') }}
              </div>
        @endif
        @if (session('reg status'))
              <div class="alert alert-success">
              {{ session('reg status') }}
              </div>
        @endif
        <div>
            <br><button type="submit" class="btn btn-primary">Create an account</button>
        </div>
        
        
    </form> 
		
		
								
			
</body>

</html>
