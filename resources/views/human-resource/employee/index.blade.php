@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Human Resource</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					      <a href="{{ route('human-resource.employee.create') }}" class="btn btn-default">
					      	<i class="fa fa-plus" aria-hidden="true"></i> New
					      </a>
					      <button type="button" class="btn btn-default" onclick="deleteEmployee()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'human-resource.employee.delete','id'=>'formDeleteEmployee']) !!}
					<div>

					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					<table class="table table-bordered table-striped table-color" id="tableEmployee">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>Nip</th>
							<th>Name</th>
							<th>Address</th>
							<th>Email</th>
							<th>phone</th>
							<th>City</th>
							<th>Branch</th>
							<th>Department</th>
							<th>Position</th>
						</thead>
						<tbody>
							@foreach($employee as $e)
								<tr>
									<td>
										<input type="checkbox" id="idTableEmployee" name="id[]" class="checkin" value="{{ $e->id }}">
									</td>
									<td><b>{{ $e->nip }}</b></td>
									<td>{{ $e->name }}</td>
									<td>{{ $e->address }}</td>
									<td>{{ $e->email }}</td>
									<td>{{ $e->phone }}</td>
									<td>{{ $e->city }}</td>
									<td>
										@if ($e->branch()->count() > 0)
											{{ $e->branch->name }}
										@endif
									</td>
									<td>{{ $e->department_no }}</td>
									<td>{{ $e->position_no }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{!! Form::close() !!}
					</div><!-- box body -->
				</div>
			</div>
		</div>
	</div>

	@include('human-resource.employee._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableEmployee = $('#tableEmployee').DataTable({
			"sDom": 'rt',
      		"columnDefs": [{
        		"targets": [],
        		"orderable": false
      		}]
		});

		$("#searchDtbox").keyup(function() {
      		tableEmployee.search($(this).val()).draw();
    	});
    	$('#tableEmployee tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
      		else {
	        	tableEmployee.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');

		        var id = $(this).find('#idTableEmployee').val();
	        	
	        	window.location.href = "/human-resource/employee/"+id+"/edit";
	        }
    	});

		function deleteEmployee() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteEmployeeModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
			}
		}

		function DeleteEmployee() {
			$("#formDeleteEmployee").submit();
		}
	</script>
@stop