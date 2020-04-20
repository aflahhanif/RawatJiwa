@extends('template_blog.content')

@section('body')
<div class="col-md-8 hot-post-left">


					@foreach($data as $datas) 
					<div class="post post-row">
						<a class="post-img" href="{{ route('blogs.content', $datas->slug ) }}"><img src="{{ asset($datas->gambar)}}" alt="{{ $datas->judul }}" style="height: 200px"></a>
						<div class="post-body">
							<div class="post-category">
								<a>{{ $datas->kategori->nama }}</a>
							</div>
							<h3 class="post-title"><a href="{{ route('blogs.content', $datas->slug ) }}">{{ $datas->judul }}</a></h3>
							<ul class="post-meta">
								<li><a>{{ $datas->users->name }}</a></li>
								<li>{{ $datas->created_at }}</li>
							</ul>
							
						</div>
					</div>
				
				@endforeach
				<center>{{ $data->links() }}</center>
				</div>

													<!-- /post -->
@endsection