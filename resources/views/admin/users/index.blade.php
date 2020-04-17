@extends('templates.home')
@section('subtitle', 'Daftar User')
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

	<a href="{{ route('users.create')}}" class="btn btn-info btn-sm">Tambah User Baru</a>
	<br><br>
	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<th>Id</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Tipe User</th>
			<th>Opsi</th>
		</thead>
		<tbody>
			@foreach ($user as $users)
			<tr>
				<td>{{ $users->id }}</td>
				<td>{{ $users->name }}</td>
				<td>{{ $users->email }}</td>
				<!--
				<td>
					@if($users->type)
						<span class="badge badge-info">Administrator</span>
						@else
						<span class="badge badge-warning">Author</span>
					@endif
				</td>
				-->
				<td>
					<form action="{{ route('users.destroy', $users->id) }}" method="POST">
						@csrf
						@method('delete')
						<a href="{{ route('users.edit', $users->id)  }}" class="btn btn-primary btn-sm">Edit</a>
						<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $user->links() }}
@endsection