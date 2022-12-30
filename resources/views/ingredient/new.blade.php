@extends('layouts.app')
@section('content')
<div class="jarak">
		<center>
			<img class="timpa" src="{{asset('../images/new_food.jpg')}}" width="1000px" height="400px">
			<h3 class="atas">C o ' b a i n<br>
			A d m i n</h3>
			<a href="" style="margin-left:-20px; color:white; text-decoration:underline;">new food</a> | <a href="/home" style="color:white ; text-decoration:none;">Go Home</a>
		</center>
</div>
<center>
<p style="color:#ac6730">You Can Fill the Form in the left side!</p>
</center>
<div class="container" style="padding-top: 40px">
	<div class="col-sm-12 py-2">
	<form action="/ingredient/new" method= "post">
		{{ csrf_field() }}
		<h2 style="color:#ac6730">Add Ingredient</h2>
	</div>
	<div class="col-sm-12 py-2">
		<div class="form-group">
			<label for="nama" style="color:#ac6730">Name</label>
			<input
				type="text"
				class="form-control"
				id="nama"
				name="nama"
				placeholder="Insert Ingredient Name" style="margin-left:-5px;width: 200px;"
			>
		</div>
	</div>
		<button class="btn btn-primary" type="submit" style="margin-left:10px;background-color:white;color:#ac6730;border-color:#ac6730">Save</button>
		<a href="/ingredients/{{ Auth::user()->usertype }}" class="btn btn-primary" style="background-color:white;color:#ac6730;border-color:#ac6730">Go Back</a>
	</form>
	
</div>
<img class="timpa" src="{{asset('../images/fried_tuna.jpg')}}" width="260px" height="400px" style="margin-top:-200px;margin-left:500px;">
		<div class="boxi2" style="margin-left:630px;margin-top:-120px;">
			<p style="font-size:17px;font-style:italic">“If your beliefs are not useful to you, or they are not bringing you peace and abundance, update them!”
				<br>- Kim Ha Campbell, Inner Peace Outer Abundance </p>
		</div>
		<div class="boxi3" style="margin-top:-260px; margin-left:900px">
			<p style="color:#ac6730">Don't Forget to Click Save Button!</p>
		</div>
@endsection