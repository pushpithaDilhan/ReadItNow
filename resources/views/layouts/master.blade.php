<html>

<head>
<title>@yield('title')</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-light navbar-fixed-top" style="min-height: 80px; background-color: #003399;" role="navigation" >
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">                
                <a href="/"><img src="{{URL::asset('/img/logo.png')}}" alt="Logo"></a>
            </div>
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  

<div class="container">
	@yield('content')
</div>

</body>

</html>