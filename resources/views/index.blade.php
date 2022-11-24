@extends('layout')
@section('title','Records List')

@section('content')
<h1 class="text-center">Record's List</h1>

<a href="{{url('/add-record')}}" class="btn btn-info float-right" style="margin: 20px;">Add Record</a>
<br>
<div class="alert alert-success alert-dismissible d-none" id="alert-delete">
		<a class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success!</strong> Record Deleted.
</div>
<table id="myTable" class="display responsive nowrap data-table">
	<thead>
		<tr>
			<th>Sr. No.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@forelse($result as $value)
		<tr id="row_{{ $value->id }}">
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->email }}</td>
			<td>{{ $value->phone }}</td>
			<td>
				<a href="{{url('/edit-record/'.$value->id)}}">
					<i class="fas fa-edit" style="margin-right: 20px;color:black;"></i>
				</a>
				<i class="fas fa-trash myModal" id="deleteModal" recordId="{{$value->id}}" data-toggle="modal" data-target="#delete_modal_{{$value->id}}"></i>
			</td>
		</tr>

		<div class="modal fade" id="delete_modal_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Are you Sure want to Delete this Record ?
					</div>
					<div class="modal-footer">
						@csrf
						<button type="button" class="btn btn-secondary" id="cancel_{{$value->id}}" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-danger deleteRecord" id="deleteRecord" recordId="{{$value->id}}">Delete</button>
					</div>
				</div>
			</div>
		</div>
		@empty
		@endforelse
	</tbody>
</table>
@endsection