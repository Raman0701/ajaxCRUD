@extends('layout')
@section('title','Add Record')

@section('content')
	<a href="{{url('/')}}" class="btn btn-info float-left">Back to Home</a>
	<br>
	<h1 class="text-center"> Add Record </h1>

	<br>
	<div class="alert alert-success alert-dismissible d-none" id="alert-add">
  		<a class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<strong>Success!</strong> Record Created.
	</div>
	<form id="addForm" class="form" method="post" action="javascript:;" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label>Choose an Image</label>
			<div class="row">
				<div class="col-md-6">
					<input type="file" name="image" class="form-control" accept="image/png, image/jpeg" onchange="loadFile(event)" required>
				</div>
				<div class="col-md-6">
					<img width="90" height="100" id="output" class="d-none">
				</div>
			</div>	
			<span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
		    <label>Name</label>
		    <input type="text" class="form-control" name="name" placeholder="Enter your Name">
		    <span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control" placeholder="Enter you Email">
			<span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
			<label>Contact no.</label>
			<input type="text" name="phone" class="form-control" placeholder="Enter your Contact Number">
			<span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
			<label>Country</label>
			<input type="text" name="country" class="form-control" placeholder="Enter your Country Name">
			<span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
			<label>State</label>
			<input type="text" name="state" class="form-control" placeholder="Enter your State">
			<span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
			<label>City</label>
			<input type="text" name="city" class="form-control" placeholder="Enter your City">
			<span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
			<label>Address</label>
			<input type="text" name="address" class="form-control" placeholder="Enter your Address">
			<span class="help-block" style="color:red"><strong></strong></span>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Submit" class="btn btn-info">
		</div>
	</form>
@endsection