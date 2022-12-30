@extends('layouts.app')
@section('content')
<div class="jarak">
		<center>
			<img class="timpa" src="{{asset('../images/food_bg3.jpg')}}" width="1000px" height="400px">
			<h3 class="atas">C o ' b a i n<br>
			R e s t a u r a n t	<br>
			<a href="" style="margin-left:0px; color:white; text-decoration:underline;">Carts</a> | <a href="/home" style="color:white ; text-decoration:none;">Go Home</a></h3>
		</center>
	</div>
<div class="row" style="width: 100%;
	padding-right: 250px;
	padding-left: 250px;
	margin-right: auto;
	margin-left: auto;">
<div class="col-sm-12 py-2">
<h2 style="color:#ac6730">
	Your Cart
</h2>
</div>
<div class="col-sm-12 py-2">
	<table class="table table-striped book-table" style="color:#ac6730">
		<thead style="padding-top: 40px">
			<tr>
				<td>Name</td>
				<td>Menu</td>
				<td>Quantity</td>
				<td>Time Serve</td>
				<th></th>
			</tr>
		</thead>
<tbody>
		@if (count($carts) == 0)
			<tr>
				<td colspan="5" style="text-align: center">No data</td>
			</tr>
		@endif
		@foreach ($carts as $cart)
		<tr>
			<td>
				{{ auth::user()->name }}
			</td>
			<td>
				{{ $cart->food->name }}
			</td>
			<td>
				{{ $cart->jumlah }}
			</td>
			<td>
				{{ $cart->created_at }}
			</td>
			<td>
				<form action="/carts/delete/{{ $cart->cart_id }}/{{ Auth::user()->id }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
						<button class="btn btn-danger" class="btn btn-primary" style="color :white; background-color:#ac6730 ; border-color : #ac6730;">Delete</button>
				</form>
			</td>
		</td>
	<td>
</form>
	</td>
		</tr>
	@endforeach
</tbody>
	</table>
		<div class="col-sm-12 py-2">
			<a href="/cart/{{ auth::user()->id }}/new" class="btn btn-primary" style="color :#ac6730; background-color:white ; border-color : #ac6730; ">Add Order</a>
		</div> 
	</div>
	
</div>
	<center>
	<p style="color :#ac6730;font-style:italic;">“The lesson about food is that the most predictable and the most orderly outcomes are always not the best. They are just easier to describe.<br> Fads are orderly. Food carts and fires aren't. Feeding the world could be a delicious mess, full of diverse flavors and sometimes good <br>old-fashioned smoke.” </p>
	</center>
	<div class="boxifood" style="margin-left:240px">
		<h1 style="margin-top:30px;font-size:170px;margin-left:43px;">C</h1>
	</div>
	<div class="boxifood" style="margin-left:410px;margin-top:-180px">
		<h1 style="margin-top:30px;font-size:170px;margin-left:43px;">A</h1>
	</div>
	<div class="boxifood" style="margin-left:580px;margin-top:-180px">
		<h1 style="margin-top:30px;font-size:170px;margin-left:43px;">R</h1>
	</div>
	<div class="boxifood" style="margin-left:750px;margin-top:-180px">
		<h1 style="margin-top:30px;font-size:170px;margin-left:43px;">T</h1>
	</div>
	<div class="boxifood" style="margin-left:920px;margin-top:-180px">
		<h1 style="margin-top:30px;font-size:170px;margin-left:43px;">S</h1>
	</div>

	<hr style="height 10px;background:#ac6730;">
	</div>
@endsection