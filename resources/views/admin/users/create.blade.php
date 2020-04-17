@extends('templates.home')
@section('subtitle', 'Tambah User Baru')
@section('content')

@if(count($errors)>0)
	@foreach($errors->all() as $error)
		<div class="alert alert-danger" role="alert">
		  	{{ $error }}
		</div>
	@endforeach
@endif

@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
	  	{{ Session('success') }}
	</div>
@endif

<form action="{{ route('users.store') }}" method="POST">
	@csrf
	<div class="form-group">
      <label>Nama</label>
      <input type="text" class="form-control" name="name">
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
      <label>Tipe User</label>
      <select class="form-control" name="type">
      	<option value="" holder>Pilih Tipe User...</option>
      	<option value="1" holder>Administrator</option>
      	<option value="0" holder>Author</option>
      </select>
    </div>

    <div class="form-group">
      <label>Password (Jika tidak terisi password akan otomatis menjadi "password")</label>
      <input type="text" class="form-control" name="password">
    </div>

    <div class="form-group">
    	<button class="btn btn-primary btn block">Tambah User Baru</button>
    </div>
</form>
@endsection