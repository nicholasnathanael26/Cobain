@extends('layouts.app')
@section('content')
<div class="container">
	<center>
	<div class="jarak">
		<center>
			<img class="timpa" src="{{asset('../images/food_bg2.jpeg')}}" width="1000px" height="400px">
			<h3 class="atas">C o ' b a i n<br>
			R e s t a u r a n t<br>
			<a href="" style=" color:white; text-decoration:underline;">Menu</a> | <a href="/home" style="color:white ; text-decoration:none;">Go Home</a></h3>
		</center>
	</div>
	<div class="row justify-content-center">	
        <div class="col">
			<div class="boxtable0">
			<div class="row">
				<div class="col-sm-12 py-2">

				@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
				@endif
				@foreach ($users as $user)
					@if($user->usertype == 'admin')
						<a href="/foods/{{ Auth::user()->id }}/{{ Auth::user()->usertype }}/new" class="btn btn-primary"style="color :#ac6730; background-color: white ; border-color : #ac6730;">Add Food</a>
					@endif
				@endforeach
				</div>
				<div class="col-sm-12 py-2">
				<table class="table table-striped book-table"style="color :#ac6730">
				<thead>
				<tr>
				<th>Photo</th>
				<th>Name</th>
				<th>Price</th>
				<th></th>
				<th></th>
				</tr>
				</thead>
				<tbody>
				@if (count($foods) == 0)
				<tr>
				<td colspan="5" style="text-align: center">Tidak ada data</td>
				</tr>
				@endif
				@foreach ($foods as $food)
					<tr>
						<td>
							@foreach($photos as $photo)
							@if($photo->food_id == $food->id)
						<img width="150px" src="{{ url('/data_file/'.$photo->file) }}"></img>
							@endif
						@endforeach
						</td>
							<td>
							@if(Auth::user()->usertype == 'admin')
							<a href="/recipes/admin/{{ $food->id }}"style="color :#ac6730">{{ $food->name }}</a>
							@else
								<p>{{ $food->name }}</p>
							@endif
							</td>
							<td>
							{{ $food->price }}
							</td>
							<td>
							@foreach ($users as $user)
								@if($user->usertype == 'admin')
									<a href="/updates/{{ Auth::user()->usertype }}/{{ Auth::user()->id }}/{{ $food->id }}" class="btn btn-primary"style="color :#ac6730; background-color: white ; border-color : #ac6730;">Update</a>
								@endif
							@endforeach
							</td>
							<td>
							@foreach ($users as $user)
								@if($user->usertype == 'admin')
									<form action="/food/delete/{{ $food->id }}/{{ Auth::user()->usertype }}" method="POST">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button class="btn
									btn-danger"style="color:white ; background-color : #ac6730; border-color:#ac6730;">Delete</button>
								@endif
							@endforeach
							</form>
							</td>
					</tr>
				@endforeach

				</tbody>
				</table>
				</div>
				</div>
			</div>
		</div>
	<p style="color :#ac6730;font-style:italic;">“Ask not what you can do for your country. Ask what’s for lunch.” <br>
		- Orson Welles 
	</p>
	</center>
	<div class="boxifood" style="margin-left:220px">
		<h1 style="margin-top:30px;font-size:170px;margin-left:43px;">F</h1>
	</div>
	<div class="boxifood" style="margin-left:390px;margin-top:-180px">
		<h1 style="margin-top:30px;font-size:170px;margin-left:43px;">O</h1>
	</div>
	<div class="boxifood" style="margin-left:560px;margin-top:-180px">
		<h1 style="margin-top:30px;font-size:170px;margin-left:43px;">O</h1>
	</div>
	<div class="boxifood" style="margin-left:730px;margin-top:-180px">
		<h1 style="margin-top:30px;font-size:170px;margin-left:43px;">D</h1>
	</div>
	<hr style="height 10px;background:#ac6730;">
	</div>

@endsection