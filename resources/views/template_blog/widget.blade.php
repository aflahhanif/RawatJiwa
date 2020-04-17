<!-- BAGIAN TENGAH KANAN -->
				<div class="col-md-4">

					<!-- category widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Kategori</h2>
						</div>
						<div class="category-widget">
							<ul>
								@foreach($kategori_widget as $kategoris)
								<li><a href="{{ route('blogs.kategori', $kategoris->slug) }}">{{ $kategoris->nama }}<span>{{ $kategoris->post->count() }}</span></a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<!-- /category widget -->
				</div>
				<!-- /BAGIAN TENGAH KANAN -->