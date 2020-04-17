@extends('templates.home')
@section('subtitle', 'Edit Tag')
@section('content')
<form action="{{ route('tags.update', $tag->id) }}" method="POST">
	@csrf
	@method('patch')
	<div class="form-group">
      <label>Nama Tag</label>
      <input type="text" class="form-control" name="nama" value="{{ $tag->nama }}">
    </div>

    <div class="form-group">
    	<button class="btn btn-primary btn block">Edit Tag</button>
    </div>
</form>
@endsection