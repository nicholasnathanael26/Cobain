@extends('layouts.app')
@section('content')
<div class="container">
	<div class="jarak">
		<center>
			<img class="timpa" src="{{asset('../images/food_bg.jpg')}}" width="1000px" height="400px">
			<h3 class="atas">C o ' b a i n<br>
			R e s t a u r a n t<br><a href="" style="color:white; text-decoration:underline;">Add Food</a> | <a href="//foods/admin" style="color:white ; text-decoration:none;">Back</a></h3>
		</center>
	</div>

<div class="container">
<div class="col-sm-12 py-2">
<form action="/foods/{{ Auth::user()->id }}/new" method= "post" enctype="multipart/form-data">
{{ csrf_field() }}

</div>
<div class="col-sm-12 py-2">
<div class="form-group"style="color :#ac6730">
<label for="nama">Nama Makanan</label>
<input
type="text"
class="form-control"
id="nama"
name="nama"
placeholder="Masukkan Nama"
>
</div>
<div class="form-group"style="color :#ac6730">
<label for="harga">Harga</label>
<input
type="text"
class="form-control"
id="harga"
name="harga"
placeholder="Masukkan Harga"
>
<br>
<label for="file"style="color :#ac6730">File</label><br>
<input type="file" name="file"><br><br>
<button class="btn btn-primary" type="submit"style="color :#ac6730; background-color: white ; border-color : #ac6730;">Simpan</button>

</div>

</form>
</div>
</div>
</div>
@endsection