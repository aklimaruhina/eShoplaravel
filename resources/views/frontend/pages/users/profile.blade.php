@extends('frontend.layouts.maintemplate')


@section('bodycontent')


	<div class="container">
	  <ul class="breadcrumb">
	    <li><a href="{{ route('index')}}"><i class="fa fa-home"></i></a></li>
	    <li><a href="#">Profile</a></li>
	  </ul>
	  <div class="row">
	  	<div class="col-md-8">
	  		<div class="card">
	  			<div class="card-body">
	  			<h4 class="card-title">Update your profile</h4>
	  			<form action="{{ route('user.profile.update')}}" method="POST">
	  				@csrf
	  				<div class="form-group">
	  					<label for="">First Name</label>
	  					<input type="text" class="form-control{{ $errors->has('first_name') ? 'is-valid' : ''}}" name="first_name" value="{{ $user->first_name}}">
	  					@if($errors->has('first_name'))
	  						<span>
	  							<strong>{{ $errors->first(first_name )}}</strong>
	  						</span>
	  					@endif
	  				</div>
	  				<div class="form-group">
	  					<label for="">Last Name</label>
	  					<input type="text" class="form-control{{ $errors->has('last_name') ? 'is-valid' : ''}}" name="last_name" value="{{ $user->last_name}}">
	  					@if($errors->has('last_name'))
	  						<span>
	  							<strong>{{ $errors->first(last_name)}}</strong>
	  						</span>
	  					@endif
	  				</div>
	  				<div class="form-group">
	  					<label for="">Phone Number</label>
	  					<input type="text" class="form-control{{ $errors->has('phone') ? 'is-valid' : ''}}" name="phone" value="{{ $user->phone}}" >
	  					@if($errors->has('phone'))
	  						<span>
	  							<strong>{{ $errors->first(phone)}}</strong>
	  						</span>
	  					@endif
	  				</div>
	  				<div class="form-group">
	  					<label for="">Select Division</label>
	  					<select name="division_id" id="" class="form-control">
	  						<option value="0">Select Your division</option>
	  						@foreach($divisions as $division)
	  						<option value="{{ $division->id}}" {{$user->division_id == $division->id ? 'selected': ''}}>{{ $division->name}}</option>
	  						@endforeach
	  					</select>
	  				</div>
	  				<div class="form-group">
	  					<label for="">Select District</label>
	  					<select name="district_id" id="" class="form-control">
	  						<option value="0">Select Your District</option>
	  						@foreach ( $districts as $district )
	  						<option value="{{ $district->id}}" {{$user->district_id == $district->id ? 'selected': ''}}>{{ $district->name}}</option>
	  						@endforeach
	  					</select>
	  				</div>
	  				<div class="form-group">
	  					<label for="">Address</label>
	  					<input type="text" class="form-control{{ $errors->has('address') ? 'is-valid' : ''}}" name="address" value="{{ $user->address}}" >
	  					@if($errors->has('address'))
	  						<span>
	  							<strong>{{ $errors->first(address)}}</strong>
	  						</span>
	  					@endif
	  				</div>
	  				<div class="form-group">
	  					<label for="">Shipping aDdress</label>
	  					<input type="text" class="form-control{{ $errors->has('shipping_address') ? 'is-valid' : ''}}" name="shipping_address" value="{{ $user->shipping_address }}" >
	  					@if($errors->has('shipping_address'))
	  						<span>
	  							<strong>{{ $errors->first(shipping_address)}}</strong>
	  						</span>
	  					@endif
	  				</div>
	  				<div class="form-group">
	  					<label for="">Password</label>
	  					<input type="password" class="form-control{{ $errors->has('password') ? 'is-valid' : ''}}" name="password" value="{{ $user->password}}">
	  					@if($errors->has('password'))
	  						<span>
	  							<strong>{{ $errors->first(password)}}</strong>
	  						</span>
	  					@endif
	  				</div>
	  				<div class="form-group">
	  					<button class="btn btn-primary" type="submit">Update Profile</button>
	  				</div>
	  				
	  			</form>
	  			</div>
	  		</div>
	  	</div>
	  </div>

	</div>

@endsection
