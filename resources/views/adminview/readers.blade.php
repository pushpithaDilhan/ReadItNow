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
			<li class="active"><a href="/admin/readers"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Readers</a></li>
			<li><a href="/admin/books"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Books</a></li>
			<li><a href="/admin/reviews"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Reviews</a></li>
			<li><a href="/admin/addadmin"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Add Admin</a></li>
			<li><a href="/admin/bookrequests"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Book requests</a></li>								
		</ul>		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="margin-top:50px;">		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$loggedin}}</div>
							<div class="text-muted">Logged In</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$activenow}}</div>
							<div class="text-muted">Active now</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{$totalreaders}}</div>
							<div class="text-muted">Total readers</div>
						</div>
					</div>
				</div>
			</div>
        </div>
       
		        
        <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Book readers Overview</div>					
							<table class="table table-hover" style="margin-top:0px;">        
								<tr>
								<th>No</th>
								<th>Date</th>
								<th>Views</th>
								</tr>
								
								@foreach($graphdata as $data)
								<tr>
								<td>{{ $data->id }}</td>
								<td>{{ $data->date }}</td>
								<td>{{ $data->count }}</td></tr>
								@endforeach								
							</table>				
				</div>
			</div>
		</div><!--/.row-->		
		
								
			
</body>

</html>
