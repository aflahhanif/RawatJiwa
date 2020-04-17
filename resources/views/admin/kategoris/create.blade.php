@extends('templates.home')
@section('subtitle', 'Tambah Kategori Baru')
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

<form action="{{ route('kategoris.store') }}" method="POST">
	@csrf
	<div class="form-group">
      <label>Nama Kategori</label>
      <input type="text" class="form-control" name="nama">
    </div>

    <div class="form-group">
    	<button class="btn btn-primary btn block">Tambah Kategori Baru</button>
    </div>
</form>
@endsection