@extends('templates.home')
@section('subtitle', 'Edit User')
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

<form action="{{ route('users.update', $user->id) }}" method="POST">
	@csrf
  @method('patch')
	<div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
  </div>

  <div class="form-group">
    <label>Email (tidak bisa diubah)</label>
    <input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
  </div>

  <div class="form-group">
    <label>Tipe User</label>
    <select class="form-control" name="type">
    	<option value="" holder>Pilih Tipe User...</option>
    	<option value="1" holder
        @if($user->type == 1)
          selected
        @endif
      >Administrator</option>
    	<option value="0" holder
        @if($user->type == 0)
          selected
        @endif
      >Author</option>
    </select>
  </div>

  <div class="form-group">
    <label>Password (Jika tidak terisi password tidak akan berubah)</label>
    <input type="text" class="form-control" name="password">
  </div>

  <div class="form-group">
  	<button class="btn btn-primary btn block">Tambah User Baru</button>
  </div>
</form>
@endsection