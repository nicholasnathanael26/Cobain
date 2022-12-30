@extends('layouts.app')
@section('content')
<div class="jarak">
		<center>
			<img class="timpa" src="{{asset('../images/update_hvr.jpg')}}" width="1000px" height="400px">
			<h3 class="atas">C o ' b a i n<br>
			A d m i n</h3>
			<a href="" style="margin-left:-20px; color:white; text-decoration:underline;">Update</a> | <a href="/home" style="color:white ; text-decoration:none;">Go Home</a>
		</center>
</div>
	<p style="margin-left:560px ;color:#ac6730;">Update Me! Fill the form, Becarefull</p>
	<div class="container" style="padding-top: 40px">
		<div class="col-sm-12 py-2">
			@foreach ($ingredients as $ingredient)
			<h2 style="color:#ac6730;"> Change Name {{ $ingredient->name }}</h2>
		</div>
		<form action="/ingredients/updates/{{ $ingredient->id }}" method= "post">
				{{ csrf_field() }}
			<div class="col-sm-12 py-2">
				<div class="form-group">
					<label for="name" style="color:#ac6730">Ingredient Name</label>
					<input
						type="text"
						class="form-control"
						id="name"
						name="name"
						placeholder="{{ $ingredient->name }}" style="width: 250px;"
					>
				</div>
				<button class="btn btn-primary" type="submit" style="background-color:white;color:#ac6730;border-color:#ac6730">Save</button>
				<a href="/ingredients/{{ Auth::user()->usertype }}" class="btn btn-primary" style="background-color:white;color:#ac6730;border-color:#ac6730">Go Back</a>
		</form>
			</div>
		<img class="timpa" src="{{asset('../images/update_food.jpg')}}" width="260px" height="400px" style="margin-top:-200px;margin-left:500px;">
		<div class="boxi2" style="margin-left:630px;margin-top:-120px;">
			<p style="font-size:17px;font-style:italic">“If your beliefs are not useful to you, or they are not bringing you peace and abundance, update them!”
				<br>- Kim Ha Campbell, Inner Peace Outer Abundance </p>
		</div>
		<div class="boxi3" style="margin-top:-260px; margin-left:900px">
			<p style="color:#ac6730">Don't Forget to Click Save Button!</p>
		</div>
			@endforeach
	</div>
@endsection