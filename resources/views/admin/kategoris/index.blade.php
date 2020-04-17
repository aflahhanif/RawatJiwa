@extends('templates.home')
@section('subtitle', 'Daftar Kategori')
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

	<a href="{{ route('kategoris.create')}}" class="btn btn-info btn-sm">Tambah Kategori Baru</a>
	<br><br>
	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<th>Id</th>
			<th>Nama</th>
			<th>Opsi</th>
		</thead>
		<tbody>
			@foreach ($kategori as $kategoris)
			<tr>
				<td>{{ $kategoris->id }}</td>
				<td>{{ $kategoris->nama }}</td>
				<td>
					<form action="{{ route('kategoris.destroy', $kategoris->id) }}" method="POST">
						@csrf
						@method('delete')
						<a href="{{ route('kategoris.edit', $kategoris->id)  }}" class="btn btn-primary btn-sm">Edit</a>
						<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $kategori->links() }}
@endsection