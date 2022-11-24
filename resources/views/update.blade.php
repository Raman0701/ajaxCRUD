@extends('layout')
@section('title','Edit Record')

@section('content')
	<a href="{{url('/')}}" class="btn btn-info float-left">Back to Home</a>
	<br>
	<h1 class="text-center"> Edit Record </h1>

	<br>
	<div class="alert alert-success alert-dismissible d-none" id="alert-update">
  		<a class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<strong>Success!</strong> Record Updated.
	</div>
	<form id="updateForm" class="form" method="post" action="javascript:;" enctype="multipart/form-data">
		@csrf
		Selected Image: <img src="{{url('/images/'.$record->image)}}" width="150" height="150">
		<div class="form-group">
			<label>Choose an Image</label>
			<div class="row">
				<div class="col-md-6">
					<input type="file" name="image" class="form-control" accept="image/png, image/jpeg" onchange="loadFile(event)">
				</div>
				<div class="col-md-6">
					<img width="90" height="100" id="output" class="d-none">
				</div>
			</div>	
			<span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
		    <label>Name</label>
		    <input type="text" class="form-control" name="name" placeholder="Enter your Name" value="{{ $record->name }}">
		    <span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control" placeholder="Enter you Email" value="{{ $record->email }}">
			<span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
			<label>Contact no.</label>
			<input type="text" name="phone" class="form-control" placeholder="Enter your Contact Number" value="{{ $record->phone }}">
			<span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
			<label>Country</label>
			<input type="text" name="country" class="form-control" placeholder="Enter your Country Name" value="{{ $record->country }}">
			<span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
			<label>State</label>
			<input type="text" name="state" class="form-control" placeholder="Enter your State" value="{{ $record->state }}">
			<span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
			<label>City</label>
			<input type="text" name="city" class="form-control" placeholder="Enter your City" value="{{ $record->city }}">
			<span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
			<label>Address</label>
			<input type="text" name="address" class="form-control" placeholder="Enter your Address" value="{{ $record->address }}">
			<span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
			<input type="hidden" name="recordId" id="recordId" value="{{ $record->id }}">
			<input type="submit" name="submit" value="Submit" class="btn btn-info">
		</div>
	</form>
@endsection