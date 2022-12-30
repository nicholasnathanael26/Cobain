@extends('layouts.app')
@section('content')
<div class="jarak">
		<center>
			<img class="timpa" src="{{asset('../images/bhn_mkn.png')}}" width="1000px" height="400px">
			<h3 class="atas">C o ' b a i n<br>
			A d m i n</h3>
			<a href="" style="margin-left:-20px; color:white; text-decoration:underline;">Ingredient</a> | <a href="/home" style="color:white ; text-decoration:none;">Go Home</a>
		</center>
</div>
<div class="container" style="padding-top: 40px">
	<div class="row">
		<div class="col-sm-12 py-2">
			<center>
			<h2 style="color : #ac6730">
				Make sure all of the ingredients put in here
			</h2>
			<h2 style="color : #ac6730">
				Ingredient List
			</h2>
			<a href="/ingredients/{{ Auth::user()->usertype }}/new" class="btn btn-primary" style="margin-left:-10px;background-color : white ; border-color : #ac6730; color : #ac6730;">Add Ingredient</a>
			</center>
		</div>
		<div class="col-sm-12 py-2" >
			<table class="table table-striped book-table" style="color :#ac6730">
				<thead>
					<tr>
						<td>Ingredient Name</td>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@if (count($ingredients) == 0)
					<tr>
						<td colspan="5" style="text-align: center">Tidak ada data</td>
					</tr>
		</div>
					@endif
					@foreach ($ingredients as $ingredient)
					<tr>

						<td>
							{{ $ingredient->name }}
						</td>
						<td>
							<a href="/ingredients/update/{{ $ingredient->id }}/{{ Auth::user()->usertype }}" class="btn btn-primary" style="color :#ac6730; background-color: white ; border-color : #ac6730;">Update</a>
						</td>
						<td>
							<form action="/ingredients/delete/{{ $ingredient->id }}/{{ Auth::user()->usertype }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button class="btn
							btn-danger" style="color:white ; background-color : #ac6730; border-color:#ac6730;">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<hr>
			
			<img class="timpa" src="{{asset('../images/fresh_ing.jpg')}}" width="260px" height="400px" style="margin-top:10px;margin-left:50px;">
			<div class="boxi2">
				<p style="margin-top:29px;font-style:italic;">Il faut casser le noyau pour avoir l’amande.On ne peut pas avoir le beurre et l’argent du beurre.</p>
			</div>
			<div class="boxi3">
				<p style="color : #ac6730">Ingredients are the most important thing in a restaurant.because with good ingredients, delicious food will be created</p>
			</div>
	</div>
</div>
@endsection