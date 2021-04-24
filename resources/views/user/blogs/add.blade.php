@extends('user.layouts.app')
@if(!isset($blog))
@section('subheader','Add Blog')
@else
@section('subheader','Edit Blog')
@endif

@section('content')
<div class="container">
	<h2>Blog</h2>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('user.blogs.index') }}">Blog</a></li>
			<li class="breadcrumb-item active" aria-current="page">@yield('subheader')</li>
		</ol>
	</nav>
	<form method="post" id="blog-form" action="{{ ((!isset($blog)) ? route('user.blogs.store') : route('user.blogs.update',[$blog->id])) }}" enctype="multipart/form-data">
		@csrf
		@isset($blog) {{ method_field('PATCH') }} @endisset
		<div class="card lg-12">
			<div class="card-body">
				<div class="form-group row">
					<label for="title" class="col-lg-2 col-form-label">Title</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" id="title" name="title" value="{{ isset($blog) ? $blog->title : old('title') }}" placeholder="Enter Title" data-msg-required="Please enter title" required>
						@if($errors->has('title'))
						<div class="error">{{ $errors->first('title') }}</div>
						@endif
					</div>
				</div>
				<div class="form-group row">
					<label for="desc" class="col-lg-2 col-form-label">Content</label>
					<div class="col-lg-10">
						<textarea class="form-control ckeditors" id="desc" name="content" data-msg-required="Please enter content" required>{{ ((isset($blog)) ? $blog->content : old('content')) }}</textarea>
						@if($errors->has('content'))
						<div class="error">{{ $errors->first('content') }}</div>
						@endif
					</div>
				</div>
				<hr>
				<div class="text-center">
					<button type="submit" class="btn btn-primary waitme">Save</button>
					<a class="btn btn-default" href="{{ route('user.blogs.index') }}">Cancel</a>
				</div>
			</div>
		</div>
	</form>
</div>
@push('scripts')
<script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
	CKEDITOR.replace('desc');
	
</script>
@endpush
@endsection