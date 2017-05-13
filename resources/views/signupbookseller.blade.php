<html>
    <head>
        
    <link rel="title icon" type="image/x-icon" href="style/images/favicon.ico" />
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>

    
    <body id="bgbody" background="{{URL::asset('/img/bookshop.jpg')}}" style="background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

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
            

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
   
    <div class="container" style="margin-top: 50px;">    
    
<form class="navbar-form navbar-right" style="margin-top: 70px;"  role="search" action="/sellerregister" method="POST">
        <h2 style="margin-top: 1px; color:#ffffff "><b>Create an account</b></h2>
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <br><input type="text" class="form-control" placeholder="Shop name" name="shop_name" size="50">
            <br><br>
            <input type="text" class="form-control" placeholder="Address" name="address" size="50"><br><br>
            <input type="text" class="form-control" placeholder="Website" name="webaddress" size="50"><br><br>
            <input type="text" class="form-control" placeholder="Hotline" name="hotline" size="20"><br>
            <br><input type="text" class="form-control" placeholder="Email adress" name="email" size="48"><br>
            
            <br><input type="password" class="form-control" placeholder="New password" name="password" size="30"><br>
            <br><input type="password" class="form-control" placeholder="Reenter password" name="rpassword" size="30"><br>
            
            <br> 
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
            <br><button type="submit" class="btn btn-success">Create an account</button>
        </div>
        
        
</form> 

</div>

</body>
</html>