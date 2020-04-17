@extends('template_blog.content')

@section('body')

	@foreach($data as $datas)
		<!-- PAGE HEADER -->
			<div id="post-header" class="page-header">
				<div class="page-header-bg" style="background-image: url({{ asset($datas->gambar) }});" data-stellar-background-ratio="0.001"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="post-category">
								<a href="category.html">{{ $datas->kategori->nama }}</a>
							</div>
							<h1>{{ $datas->judul }}</h1>
							<ul class="post-meta">
								<li><a href="author.html">{{ $datas->users->name }}</a></li>
								<li>{{ $datas->created_at }}</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		<!-- /PAGE HEADER -->
	</header>
	<div class="col-md-8 hot-post-left">
	<br>
		<div class="section-row">
			<!-- penyesuaian CKEditor -->
			{!! $datas->konten !!}
		</div>
	@endforeach
	</div>

@endsection