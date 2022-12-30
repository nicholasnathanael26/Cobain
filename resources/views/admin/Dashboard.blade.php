@extends('layouts.app')
@section('content')
<div class="jarak">
		<center>
			<img class="timpa" src="{{asset('../images/new_food.jpg')}}" width="1000px" height="400px">
			<h3 class="atas">W e l c o m e<br>
			A d m i n - C o ' B a i n</h3>
			<a href="" style="margin-left:-20px; color:white; text-decoration:underline;">DASHBOARD</a> | <a href="/home" style="color:white ; text-decoration:none;">Go Home</a>
		</center>
</div>
<div class="row">
		<div class="col-sm-12 py-2">
			<center><h2 style="color:#ac6730">
			You can check data user in here!
			<br>
			Enjoy Your Job!
			</h2></center>
		</div>
	<div class="col-sm-12 py-2">
		<table class="table table-striped book-table" style="color:#ac6730">
			<thead>
				<tr>
				<td>Id</td>
				<td>Email</td>
				<td>Nama</td>
				<td>Type</td>
				</tr>
			</thead>
			<tbody>
				@if (count($users) == 0)
				<tr>
				<td colspan="5" style="text-align: center">Tidak ada data</td>
				</tr>
				@endif
				@foreach ($users as $user)
				<tr>

				<td>
				{{ $user->id }}
				</td>
				<td>
				{{ $user->email }}
				</td>
				<td>
				{{ $user->name }}
				</td>
				<td>
				{{ $user->usertype }}
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection