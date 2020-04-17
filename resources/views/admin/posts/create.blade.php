@extends('templates.home')
@section('subtitle', 'Tambah Post Baru')
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

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
      <label>Judul</label>
      <input type="text" class="form-control" name="judul">
    </div>
    <div class="form-group">
      <label>Kategori</label>
      <select class="form-control" name="kategori_id">
      	<option value="" holder>Pilih Kategori...</option>
      	@foreach($kategori as $kategoris)
      	<option value="{{ $kategoris->id }}">{{ $kategoris->nama }}</option>
      	@endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Tag</label>
      <select class="form-control select2" multiple="" name="tag[]">
      	@foreach($tag as $tags)
        <option value="{{ $tags->id }}">{{ $tags->nama }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Konten</label>
      <textarea class="form-control" name="konten" id="konten"></textarea>
    </div>
    <div class="form-group">
      <label>Gambar untuk Thumbnail</label>
      <input type="file" class="form-control" name="gambar">
    </div>

    <div class="form-group">
    	<button class="btn btn-primary btn block">Tambah Post Baru</button>
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