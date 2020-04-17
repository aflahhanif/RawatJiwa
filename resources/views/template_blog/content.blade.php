<!-- SECTION = TOP -->
@include('template_blog.head')
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div id="hot-post" class="row hot-post">
				
				<!-- harus sama dengan yield yang ada di file content -->
				@yield('body')
				@include('template_blog.widget')
		</div>
	</div>
	
	@include('template_blog.footer')