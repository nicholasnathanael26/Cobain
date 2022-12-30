@extends('layouts.app')
@section('content')
<div class="container">
	<div class="jarak">
		<center>
			<img class="timpa" src="{{asset('../images/food_bg3.jpg')}}" width="1000px" height="400px">
			<h3 class="atas">C o ' b a i n<br>
			R e s t a u r a n t<br>
			<a href="" style="color:white; text-decoration:underline;">Order</a> | <a href="/home" style="color:white ; text-decoration:none;">Go Home</a></h3>
		</center>
	</div>
    <div class="row"style="color :#ac6730">

<div class="col-sm-12 py-2">
<div class="container">
<form action="/carts/{{ auth::user()->id }}" method="POST">
	{{ csrf_field() }}
</div>
<div class="form-group">
	<label for="jumlah">Jumlah makanan</label>
<input
	type="text"
	class="form-control"
	id="jumlah"
	name="jumlah"
	placeholder="Jumlah makanan"
	size = "40"
/>
</div>
<div class="form-group">
	<label for="food">Makanan</label>
<select id="food" name="food_id" class="form-control">
@foreach ($foods as $food)
<option value="{{ $food->id }}">
	{{ $food->name }} - {{ $food->price }}
</option>
@endforeach
</select>
<br>
<button class="btn btn-primary" type="submit"style="color :#ac6730; background-color: white ; border-color : #ac6730;">order</button>
</div>

</div>
	
</form>
</div>
<center>
	<p style="color :#ac6730;font-style:italic;">“Pull up a chair. Take a taste. Come join us. Life is so endlessly delicious.”
		<br> - Ruth Reichl </p>
</center>
<div class="boxifood" style="margin-left:220px">
		<h1 style="margin-top:30px;font-size:170px;margin-left:43px;">E</h1>
	</div>
	<div class="boxifood" style="margin-left:390px;margin-top:-180px">
		<h1 style="margin-top:30px;font-size:170px;margin-left:43px;">A</h1>
	</div>
	<div class="boxifood" style="margin-left:560px;margin-top:-180px">
		<h1 style="margin-top:30px;font-size:170px;margin-left:43px;">T</h1>
	</div>
	<div class="boxifood" style="margin-left:730px;margin-top:-180px">
		<h1 style="margin-top:30px;font-size:170px;margin-left:55px;">!</h1>
	</div>
	<hr style="height 10px;background:#ac6730;">
	</div>
</div>

@endsection