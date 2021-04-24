@extends('user.layouts.app')

@section('content')
<div class="container-fluid">
	<h2>Blogs</h2>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Blogs</li>
		</ol>
	</nav>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between align-items-center">
			<h5 class="m-0 text-primary">Blogs Listing</h5>
			<a href="{{ route('user.blogs.create') }}" class="btn btn-primary float-right">Add Blog</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered dt-responsive" data-modal="blogs" id="blogs_listing" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Title</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($blogs->count() > 0)
							@foreach($blogs as $key => $blog)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $blog->title }}</td>
								<td>
									<a href="{{ route('user.blogs.edit',[$blog->id]) }}"><i class='far fa-edit' title="Edit" data-toggle="tooltip"></i></a> | <form style="display: unset;" method="post" action="{{ route('user.blogs.destroy',[$blog->id]) }}">@method('DELETE') @csrf <button style="padding: unset;color: #4e73df;" class="btn delete-confirmation" type="submit"><i class='far fa-trash-alt' title="Delete" data-toggle="tooltip"></i></button></form>
								</td>
							</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection