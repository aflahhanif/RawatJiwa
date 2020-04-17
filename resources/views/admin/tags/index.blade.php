@extends('templates.home')
@section('subtitle', 'Daftar Tag')
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

	<a href="{{ route('tags.create')}}" class="btn btn-info btn-sm">Tambah Tag Baru</a>
	<br><br>
	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<th>Id</th>
			<th>Nama</th>
			<th>Opsi</th>
		</thead>
		<tbody>
			@foreach ($tag as $tags)
			<tr>
				<td>{{ $tags->id }}</td>
				<td>{{ $tags->nama }}</td>
				<td>
					<form action="{{ route('tags.destroy', $tags->id) }}" method="POST">
						@csrf
						@method('delete')
						<a href="{{ route('tags.edit', $tags->id)  }}" class="btn btn-primary btn-sm">Edit</a>
						<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $tag->links() }}
@endsection