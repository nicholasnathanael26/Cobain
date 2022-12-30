@extends('layouts.app')
@section('content')
<div class="container" style="padding-left: 1000px">
@foreach ($foods as $food)
<a href="/recipes/admin/{{ $food->id }}" class="btn btn-primary">Kembali</a>
</div>
<div class="container" style="padding-top: 40px">
<div class="col-sm-12 py-2">
@foreach ($ingredients as $ingredient)
<h2> Ubah Quantity {{ $ingredient->name }}</h2>
@endforeach
</div>
@foreach ($recipes as $recipe)
<form action="/recipe/{{ $food->id }}/updates/{{ $recipe->id }}" method= "post">
{{ csrf_field() }}
<div class="col-sm-12 py-2">
<div class="form-group">
<label for="qty">Qty</label>
<input
type="text"
class="form-control"
id="qty"
name="qty"
placeholder="{{ $recipe->qty }}"
>
</div>
<button class="btn btn-primary" type="submit">Simpan</button>
</form>
@endforeach
@endforeach
</div>
</div>
@endsection