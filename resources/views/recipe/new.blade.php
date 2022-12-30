@extends('layouts.app')
@section('content')
<div class="container" style="padding-left: 1000px">
@foreach ($foods as $food)
<a href="/recipes/admin/{{ $food->id }}" class="btn btn-primary">Kembali</a>
</div>
<div class="container" style="padding-top: 40px">
<div class="col-sm-12 py-2">
<form action="/recipes/{{ $food->id }}/new" method= "post">
{{ csrf_field() }}
<h2>Tambah Recipe</h2>
@endforeach
</div>
<div class="col-sm-12 py-2">
<div class="form-group">
<label for="nama">Nama</label>
<select id="ingredient" name="ingredient_id" class="form-control">
	@foreach ($ingredients as $ingredient)
				<option value="{{ $ingredient->id }}">
            
                {{ $ingredient->id }} - {{ $ingredient->name }}
        
				</option>
	@endforeach
</select>
<label for="qty">qty</label>
<input
type="text"
class="form-control"
id="qty"
name="qty"
placeholder="Masukkan Qty"
>
</div>
</div>
<button class="btn btn-primary" type="submit">Simpan</button>
</form>
</div>
</div>
@endsection