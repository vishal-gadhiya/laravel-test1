@extends('admin.layouts.app')
@if(!isset($user))
@section('subheader','Add User')
@else
@section('subheader','Edit User')
@endif

@section('content')
<div class="container">
	<h2>User</h2>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">User</a></li>
			<li class="breadcrumb-item active" aria-current="page">@yield('subheader')</li>
		</ol>
	</nav>
	<form method="post" id="users-form" action="{{ ((!isset($user)) ? route('admin.users.store') : route('admin.users.update',[$user->id])) }}" enctype="multipart/form-data">
		@csrf
		@isset($user) {{ method_field('PATCH') }} @endisset
		<div class="card lg-12">
			<div class="card-body">
				<div class="form-group row">
					<label for="first_name" class="col-lg-2 col-form-label">First Name</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" id="first_name" name="first_name" value="{{ isset($user) ? $user->first_name : old('first_name') }}" placeholder="Enter First Name" data-msg-required="Please enter first name" required>
						@if($errors->has('first_name'))
						<div class="error">{{ $errors->first('first_name') }}</div>
						@endif
					</div>
					<label for="last_name" class="col-lg-2 col-form-label">Last Name</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" id="last_name" name="last_name" value="{{ isset($user) ? $user->last_name : old('last_name') }}" placeholder="Enter Last Name" data-msg-required="Please enter last name" required>
						@if($errors->has('last_name'))
						<div class="error">{{ $errors->first('last_name') }}</div>
						@endif
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-lg-2 col-form-label">Email</label>
					<div class="col-lg-4">
						<input type="email" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : old('email') }}" placeholder="Enter Email" data-msg-required="Please enter email" required>
						@if($errors->has('email'))
						<div class="error">{{ $errors->first('email') }}</div>
						@endif
					</div>
					<label for="dob" class="col-lg-2 col-form-label">DOB</label>
					<div class="col-lg-4">
						<input type="date" class="form-control" id="dob" name="dob" placeholder="" value="{{ isset($user) ? $user->dob->format('Y-m-d') : old('dob') }}" data-msg-required="Please select date" required>
						@if($errors->has('dob'))
						<div class="error">{{ $errors->first('dob') }}</div>
						@endif
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-lg-2 col-form-label">Password</label>
					<div class="col-lg-4">
						<input type="password" class="form-control" id="password" name="password" value="" placeholder="Enter Password" minlength="5" maxlength="20" data-msg-required="Please enter password" @if(!isset($user)) {{ 'required' }} @endif>
						@if($errors->has('password'))
						<div class="error">{{ $errors->first('password') }}</div>
						@endif
					</div>
				</div>
				<hr>
				<div class="text-center">
					<button type="submit" class="btn btn-primary waitme">Save</button>
					<a class="btn btn-default" href="{{ route('admin.users.index') }}">Cancel</a>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection