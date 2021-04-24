@extends('admin.layouts.app')

@section('content')
<div class="container">
	<h2>Profile</h2>
	<form method="post" id="profile-form" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
		@csrf
		<div class="card lg-12">
			<div class="card shadow">
				<div class="card-header py-3">
					<h5 class="m-0 text-primary">Update Profile</h5>
				</div>
				<div class="card-body">
					<div class="form-group row">
						<label for="first_name" class="col-lg-2 col-form-label">First Name</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}" placeholder="Enter First Name" data-msg-required="Please enter first name" required>
							@if($errors->has('first_name'))
							<div class="error">{{ $errors->first('first_name') }}</div>
							@endif
						</div>
						<label for="last_name" class="col-lg-2 col-form-label">Last Name</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}" placeholder="Enter Last Name" data-msg-required="Please enter last name" required>
							@if($errors->has('last_name'))
							<div class="error">{{ $errors->first('last_name') }}</div>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-lg-2 col-form-label">Email</label>
						<div class="col-lg-4">
							<input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Enter Email" data-msg-required="Please enter email" required>
							@if($errors->has('email'))
							<div class="error">{{ $errors->first('email') }}</div>
							@endif
						</div>
						<label for="dob" class="col-lg-2 col-form-label">DOB</label>
						<div class="col-lg-4">
							<input type="date" class="form-control" id="dob" name="dob" placeholder="" value="{{$user->dob->format('Y-m-d')}}" data-msg-required="Please select date" required>
							@if($errors->has('dob'))
							<div class="error">{{ $errors->first('dob') }}</div>
							@endif
						</div>
						
					</div>
					<div class="form-group row">
						<label for="password" class="col-lg-2 col-form-label">Password</label>
						<div class="col-lg-4">
							<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" minlength="5" maxlength="20">
							@if($errors->has('password'))
							<div class="error">{{ $errors->first('password') }}</div>
							@endif
						</div>
					</div>
					<hr>
					<div class="text-center">
						<button type="submit" class="btn btn-primary waitme">Save</button>
						<a class="btn btn-default" href="{{ route('admin.dashboard') }}">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection