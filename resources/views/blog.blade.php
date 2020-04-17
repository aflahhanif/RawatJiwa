@extends('template_blog.content')

<!-- harus sama dengan yield yang ada di file content -->
@section('body')
				
		<!-- /container -->
	</div>
	<!-- /SECTION = TOP -->

	<!-- SECTION = TENGAH -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- BAGIAN TENGAH KIRI -->
				<div class="col-md-8">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Post Terbaru</h2>
							</div>
						</div>
						<!-- POST TERBARU -->
						@foreach($data as $datas)
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="{{ route('blogs.content', $datas->slug) }}"><img src="{{ $datas->gambar }}" alt="" style="height: 200px"></a>
								<div class="post-body">
									<div class="post-category">
										<a>{{ $datas->kategori->nama }}</a>
									</div>
									<h3 class="post-title"><a href="{{ route('blogs.content', $datas->slug) }}">{{ $datas->judul }}</a></h3>
									<ul class="post-meta">
										<li><b>{{ $datas->users->name }}</b></li>
										<li>{{ $datas->created_at->diffForHumans() }}</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						<!-- /POST TERBARU -->
					</div>
					<!-- /row -->
				</div>
				<!-- BAGIAN TENGAH KIRI -->
			<!-- /row -->
@endsection