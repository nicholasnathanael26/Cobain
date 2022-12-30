<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Co'Bain Restaurant</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/customize.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-asoy shadow-sm">
			<a class="navbar-brand" href="#">Co'Bain Resto</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			<!--Left Navbar-->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/home') }}">Home </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/foods/{{ Auth::user()->usertype }}">Menu</a>
					</li>
					@if(Auth::user()->usertype=='user')
						<li class="nav-item">
							<a class="nav-link" href="/cart/{{ Auth::user()->id }}/new">Order</a>
						</li>
					@else
						<li class="nav-item">
							<a class="nav-link" href="/ingredients/{{ Auth::user()->usertype }}">Ingredient</a>
						</li>
					@endif
				</ul>
			<!-- Right Side Of Navbar -->
				<ul class="navbar-nav ml-auto">
				
				<li class="nav-item" style="margin-top:8px ;margin-right:5px;"><a href="#" ><img src="{{asset('../images/yt_png.png')}}" width="30px" height="30px"></a></li>
				<li class="nav-item" style="margin-top:8px ;margin-right:5px;"><a href="#"><img src="{{asset('../images/twt_png.png')}}" width="30px" height="30px"></a></li>
				<li class="nav-item" style="margin-top:8px ;margin-right:10px;"><a href="#"><img src="{{asset('../images/ig_png.png')}}" width="25px" height="25px"></a></li>
					<!-- Authentication Links -->
						@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logreg') }}">{{ __('Login') }}</a>
						</li>
								@if (Route::has('logreg'))
									<li class="nav-item">
										<a class="nav-link" href="{{ route('logreg') }}">{{ __('Register') }}</a>
									</li>
								@endif
							@else
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									   Hi, {{ Auth::user()->name }} <span class="caret"></span>
									</a>

									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										<h5 class="dropdown-item">{{ Auth::user()->name }}</h5>
										<HR width=100% NOSHADE>
										<h5 class="dropdown-item">Balance Rp. {{ Auth::user()->balance }}</h5>
										@if(Auth::user()->usertype == 'user')
										<h5 class="dropdown-item"><a href="/carts/order/{{ Auth::user()->id }}" style="text-decoration: none; color:black;">Cart</a></h5>
										@endif
										@if(Auth::user()->usertype == 'admin')
										<h5 class="dropdown-item"> <a href="/dashboard" style="text-decoration: none; color:black;">Dashboard</a></h5>
										@endif
										<h5 class="dropdown-item" href="{{ route('logout') }}"
										   onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</h5>
										

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</div>
								</li>
							@endguest
							
					</ul>
				</div>
			</nav>
        <main class="py-4">
            @yield('content')
        </main>
		<footer>
    <div class="footer" id="footer">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <img style="margin-top: 3em" src="{{asset('../images/food_png2.png')}}" width="200px" height="190px">
					<h5 style="margin-left: 3.2em">Co'Bain Resto</h5>
                </div>
                <div class="col-lg-3 col-sm-2 col-xs-3">
                    <h5 style="margin-top: 5em"> Contact </h5>
                    <ul>
                        <li> <h5> 021- 271XX </h5> </li>
                        <li> <h5> Gangnam Seoul </h5> </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-2 col-xs-3">
                    <ul>
                        <li> <h5> <a href="#" style="margin-top: 5em"> ABOUT US</a> <h5></li>
                        <li> <h5><a href="#"> CURRENT SERIES </a> <h5></li>
                        <li> <h5><a href="#"> THE HOUSE </a> <h5></li>
                        <li> <h5><a href="#"> LOOKING BACK </a> <h5></li>
                    </ul>
                </div>
               
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
                          
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left copyright"> Copyright © Footer 2020. All right reserved. </p>
       
        </div>
    </div>
    <!--/.footer-bottom--> 

</footer>
    </div>
	
</body>
</html>
