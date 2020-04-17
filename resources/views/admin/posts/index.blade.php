@extends('templates.home')
@section('subtitle', 'Daftar Post')
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

	<a href="{{ route('posts.create')}}" class="btn btn-info btn-sm">Tambah Post Baru</a>
	<br><br>
	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<th>Id</th>
			<th>Penulis</th>
			<th>Judul</th>
			<th>Kategori</th>
			<!-- <th>Tag</th> -->
			<th>Gambar</th>
			<th>Opsi</th>
		</thead>
		<tbody>
			@foreach ($post as $posts)
			<tr>
				<td>{{ $posts->id }}</td>
				<td>{{ $posts->users->name }}</td>
				<td>{{ $posts->judul }}</td>
				<td>{{ $posts->kategori->nama }}</td>
				<!-- <td>
					@foreach($posts->tags as $tags)
						<ul>
							<h6><span class="badge badge-info">{{ $tags->nama }}</span></h6>
						</ul>
					@endforeach
				</td> -->
				<td><img src="{{ asset($posts->gambar) }}" class="img-fluid" style="width: 100px"></td>
				<td>
					<form action="{{ route('posts.destroy', $posts->id) }}" method="POST">
						@csrf
						@method('delete')
						<a href="{{ route('posts.edit', $posts->id)  }}" class="btn btn-primary btn-sm">Edit</a>
						<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $post->links() }}
@endsection