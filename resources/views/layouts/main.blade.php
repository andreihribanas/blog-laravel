<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
       

        <title> Blog - @yield('title')  </title>

        <!-- Bootstrap CSS cdn link-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

        <!-- FontAwesome cdn link -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Local style sheet file -->
        <link href="{!! asset('css/main.css') !!}" media="all" rel="stylesheet" type="text/css">

		<!-- Load other css files -->
		@yield('stylesheets')

    </head>

    <body>

		  	<!--  Top Navigation bar -->
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
				  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <a class="navbar-brand" href="#"> <img src="{{ URL::asset('images/logo.jpg') }}" alt="Logo image"> </a>
				  <div class="collapse navbar-collapse" id="navbarNavDropdown">
				    <ul class="navbar-nav">
				      <li class="nav-item {{ Request::is('/') ? "active" : "" }}"> <a class="nav-link" href="/home"> Home <span class="sr-only">(current)</span></a> </li>
				      <li class="nav-item {{ Request::is('/blog') ? "active" : "" }}"> <a class="nav-link" href="/blog"> Blog </a> </li>
				      <li class="nav-item mr-0 ml-lg-auto"> <a class="nav-link" href="/contact"> Contact </a> </li>
				    </ul>

				    <ul class="navbar-nav ml-auto">
                        @if (Auth::check())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle " href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <strong> Hello, {{ Auth::user()->name }} </strong> </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="#"> Profile </a>
                                  <a class="dropdown-item" href="{{ route('posts.index') }}"> Posts </a>
                                   <a class="dropdown-item" href="{{ route('categories.index') }}"> Categories </a>
                                   <a class="dropdown-item" href="{{ route('tags.index') }}"> Tags </a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="{{ route('logout') }}"> Logout </a>
                                </div>
                          </li>
                        @else 
          					<li> <a href="{{ route('login') }}" class="btn btn-primary"> Login </a> </li>

                        
                        @endif
    				</ul>
				  </div>
				</nav>  <!-- /. end of navigation -->


            <!-- Header Jumbotron  -->
            <div class="jumbotron jumbotron-fluid text-center">
			  <div class="container">
			    <h1 class="display-3"> New blog project </h1>
			    <br>
			    <p class="lead"> Hi, Welcome to my new blog. </p>
			  </div>
			</div>  <!-- /. end of jumbotron -->

		@include('layouts._messages')
        
        <!-- Add custom page content -->
        @yield('content')
        <!-- /. end container yield -->


          <!-- start footer -->
			    <footer>
                <div class="container">

                    <hr>

                     <div class="row text-center">
                        <div class="col-sm-12 col-md-12 col-lg-12">
								<br>
                                <h6> &copy; 2017 @ Designed by Andrei Hribanas  @ All rights reserved. </h6>
                                

                         </div>
                    </div>
                </div>
            </footer>  <!-- /. end of footer -->

        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

		<!-- Load Parsley javascript validation -->
		

        <!-- Load internal custom script files. -->
        @yield('scripts')


    </body>

</html>
