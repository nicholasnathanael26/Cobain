@extends('layouts.app')
@section('content')
<div class="container">
	<div class="jarak">
		<center>
			<img class="timpa" src="{{asset('../images/food_bg.jpg')}}" width="1000px" height="400px">
			<h3 class="atas">C o ' b a i n<br>
			R e s t a u r a n t<br><a href="" style="color:white; text-decoration:underline;">Update Food</a> | <a href="//foods/admin" style="color:white ; text-decoration:none;">Back</a></h3>
		</center>
	</div>
<div class="container">

</div>
<div class="container">
<div class="col-sm-12 py-2">
@foreach ($foods as $food)
<center><h2 style="color :#ac6730"> Update Price {{ $food->name }}</h2></center>
@endforeach
</div>
<form action="/foods/updates/{{ $food->id }}" method= "post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PUT') }}
<div class="col-sm-12 py-2">
@foreach ($foods as $food)
<div class="form-group"style="color :#ac6730">
<label for="price">Price</label>
<input
type="text"
class="form-control"
id="price"
name="price"
placeholder="{{ $food->price }}"
>
<br>
<label for="file"style="color :#ac6730">File</label><br>
<input type="file" name="file"><br><br>
<button class="btn btn-primary" type="submit"style="color :#ac6730; background-color: white ; border-color : #ac6730;">Save</button>
</div>

</form>
@endforeach
</div>
</div>
</div>
@endsection