@extends('templates.home')
@section('subtitle', 'Edit Kategori')
@section('content')
<form action="{{ route('kategoris.update', $kategori->id) }}" method="POST">
	@csrf
	@method('patch')
	<div class="form-group">
      <label>Nama Kategori</label>
      <input type="text" class="form-control" name="nama" value="{{ $kategori->nama }}">
    </div>

    <div class="form-group">
    	<button class="btn btn-primary btn block">Edit Kategori</button>
    </div>
</form>
@endsection