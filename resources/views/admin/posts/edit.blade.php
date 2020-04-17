@extends('templates.home')
@section('subtitle', 'Edit Post')
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

<form action="{{ route('posts.update', $post->id ) }}" method="POST" enctype="multipart/form-data">
	@csrf
  @method('PATCH')
	<div class="form-group">
      <label>Judul</label>
      <input type="text" class="form-control" name="judul" value="{{ $post->judul }}">
    </div>
    <div class="form-group">
      <label>Kategori</label>
      <select class="form-control" name="kategori_id">
      	<option value="" holder>Pilih Kategori...</option>
      	@foreach($kategori as $kategoris)
      	<option value="{{ $kategoris->id }}"
          @if($post->kategori_id == $kategoris->id)
            selected
          @endif
        >{{ $kategoris->nama }}</option>
      	@endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Tag</label>
      <select class="form-control select2" multiple="" name="tag[]">
      	@foreach($tag as $tags)
        <!-- tags dari $post->tags adalah fungsi yang ada di model (eloquent relationship)-->
        <option value="{{ $tags->id }}"
          @foreach($post->tags as $val)
            @if($tags->id == $val->id)
            selected
            @endif
          @endforeach
          >{{ $tags->nama }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Konten</label>
      <textarea class="form-control" name="konten" id="konten">{{ $post->konten }}</textarea>
    </div>
    <div class="form-group">
      <label>Gambar untuk Thumbnail</label>
      <input type="file" class="form-control" name="gambar">
    </div>

    <div class="form-group">
    	<button class="btn btn-primary btn block">Edit Post Baru</button>
    </div>
</form>

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.plugins.addExternal( 'youtube', "{{ asset('assets/youtube/plugin.js') }}");
    CKEDITOR.replace( 'konten', {
       extraPlugins: 'youtube'
    });
</script>
@endsection