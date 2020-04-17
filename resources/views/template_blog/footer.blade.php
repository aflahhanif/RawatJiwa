<!-- FOOTER -->
	<footer id="footer">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3">
					<div class="footer-widget">
						<div class="footer-logo">
							<a href="{{ url('') }}" class="logo"><img src="{{ asset('frontend/img/logo-alt.png') }}" alt="" style="height: 200px"></a>
						</div>
						<p>RawatJiwa adalah website yang memberikan masyarakat pengetahuan tentang depresi dan bunuh diri. Selain itu masyarakat juga bisa belajar bagaimana mencegah orang terdekat untuk melakukan aksi bunuh diri.</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Kategori</h3>
						<div class="category-widget">
							<ul>
								@foreach($kategori_widget as $kategoris)
								<li><a href="{{ route('blogs.kategori', $kategoris->slug) }}">{{ $kategoris->nama }}<span>{{ $kategoris->post->count() }}</span></a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<!-- Tag bisa mengikuti kategori....... -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="footer-bottom row">
				<div class="col-md-6 col-md-push-6">
				</div>
				<div class="col-md-6 col-md-pull-6">
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>
