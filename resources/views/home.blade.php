@extends('layouts.app')
@section('content')
<div class="container">
	<div class="jarak">
		<center>
			<img class="timpa" src="{{asset('../images/food_bg.jpg')}}" width="1000px" height="400px">
			<h3 class="atas">C o ' b a i n<br>
			R e s t a u r a n t	</h3>
		</center>
	</div>
    <div class="row justify-content-center">	
        <div class="col-md-8">
		<div class="boxi0"><center><h3>Hi! Welcome to our Website . Don't Forget to Eat! <br> De La Bonne Bouffe et de Bons Amis ,-</center></h3></div>
            <div class="boxi1">
                <div class="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>
						<div class="textuser">
							Hi {{ Auth::user()->name }}<br>
							Your Balance Rp. {{ Auth::user()->balance }}
						</div>
						<hr class="tebel">
						Dis-moi ce que tu manges, je te dirai qui tu es.
						<hr class="tebel2">
					</h4>
                </div>
            </div>
        </div>
    </div>
		<br>
		<center>
		<div class="boximg0">
			<img class="layoutimg" src="{{asset('../images/spagheti.jpg')}}" width="200px" height="150px" style="-webkit-filter:brightness(80%)">
			<p style="color:#ac6730;font-size:17px;margin-top:11px;font-style:italic">
			“On our own, we are marshmallows and dried spaghetti, but together we can become something bigger.”
			<br>- C.B. Cook
			</p>
		</div>
		<div class="boximg1"> 
			<img class="layoutimg" src="{{asset('../images/chicken.jpg')}}" width="200px" height="150px" style="-webkit-filter:brightness(80%)">
			<p style="color:#ac6730;font-size:17px;margin-top:11px;font-style:italic">
			The key to everything is patience. You get the chicken by hatching the egg, not by smashing it. <br> -Anonym
			</p>
		</div>
		<div class="boximg2">
			<img class="layoutimg" src="{{asset('../images/burger.jpg')}}" width="200px" height="150px" style="-webkit-filter:brightness(80%)">
			<p style="color:#ac6730;font-size:17px;margin-top:11px;font-style:italic">
			“When you see the cows go into McDonalds you know that their beef burgers are fresh.”
			<br>- Anthony T.Hincks 
			</p>
		</div>
		</center>
</div>
@endsection
