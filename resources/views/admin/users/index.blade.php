@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
	<h2>Users</h2>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Users</li>
		</ol>
	</nav>
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between align-items-center">
			<h5 class="m-0 text-primary">Users Listing</h5>
			<a href="{{ route('admin.users.create') }}" class="btn btn-primary float-right">Add User</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered dt-responsive" data-modal="users" id="users_listing" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>DOB</th>
							<th>Blog</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($users->count() > 0)
							@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->first_name.' '.$user->last_name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->dob->format('d-m-Y') }}</td>
								<td>{{ $user->blogs_count }}</td>
								<td>
									<a href="{{ route('admin.users.edit',[$user->id]) }}"><i class='far fa-edit' title="Edit" data-toggle="tooltip"></i></a> | <form style="display: unset;" method="post" action="{{ route('admin.users.destroy',[$user->id]) }}">@method('DELETE') @csrf <button style="padding: unset;color: #4e73df;" class="btn delete-confirmation" type="submit"><i class='far fa-trash-alt' title="Delete" data-toggle="tooltip"></i></button></form>
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