<html>
    <head>
        
    <link rel="title icon" type="image/x-icon" href="style/images/favicon.ico" />
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>

    
    <body id="bgbody" background="{{URL::asset('/img/bgimage.png')}}"  >

<!-- Navigation -->
    <nav class="navbar navbar-light navbar-fixed-top" style="min-height: 80px; background-color: #003399;" role="navigation" >
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="{{URL::asset('/img/logo.png')}}" alt="Logo">
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav">
                  
                    <form class="navbar-form navbar-right" action="/login" method="POST" role="search" style="margin-top: 30px; margin-left: 245px;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      @if (session('status'))
                        <div class="alert alert-danger">
                        {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <input type="email" class="form-control" name="username" placeholder="Email adress">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-success">Log In</button>
                    </form>                

                </ul>

            </div>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
   
    <div class="container" style="margin-top: 50px;">    
    
        
        
    <form class="navbar-form navbar-right right " style="margin-top: 60px;"  role="search" action="/signup" method="POST">
        <h2 style="margin-top: 1px; color:#ffffff "><b>Create an account</b></h2>
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <br><input type="text" class="form-control" placeholder="First name" name="first_name">
            <input type="text" class="form-control" placeholder="Second name" name="second_name"><br>
            <br><input type="text" class="form-control" placeholder="Email adress" name="email" size="48"><br>
            
            <br><input type="password" class="form-control" placeholder="New password" name="password" size="30"><br>
            <br><input type="password" class="form-control" placeholder="Reenter password" name="rpassword" size="30"><br>
            
            <br><p style="color: #ffffff"><b>Birthday</b></p>  
            <input type="number" name="day" placeholder="Day" class="form-control" min="1" max="31">&nbsp;&nbsp;
            <input type="number" name="month" placeholder="Month" class="form-control" min="1" max="12"> &nbsp;&nbsp;
            <input type="number" name="year" placeholder="Year" class="form-control"> 
             <br>  
            <input type="radio" name="gender" class="form-control" value="0"><label style="color: #ffffff">Female</label> &nbsp;
            <input type="radio" name="gender" class="form-control" value="1"><label style="color: #ffffff">Male</label> 
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
    
    </div>
    
    <div class="navbar-form navbar-right right " style="margin-right: 293px;">
            <br><a href="/signupbookseller" ><button class="btn btn-success">Book Sellers Register Here</button></a>
    </div>

    </body>
    
</html>