@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Leasing</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					      <a href="{{ route('admin.loan.leasing.create') }}" class="btn btn-default">
					      	<i class="fa fa-plus" aria-hidden="true"></i> New
					      </a>
					      <button type="button" class="btn btn-default" onclick="deleteLeasing()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'admin.loan.leasing.delete', 'id'=>'formDeleteLeasing']) !!}
					<div>

					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					
					<table class="table table-bordered table-striped table-color" id="tableLeasing">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>Leasing No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Address</th>
							<th>PIC Name</th>
							<th>Branch</th>
						</thead>
						<tbody>
							@foreach($leasing as $leas)
								<tr>
									<td>
										<input type="checkbox" id="idTableLeasing" name="id[]" class="checkin" value="{{ $leas->id }}">
									</td>
									<td><b>{{ $leas->leasing_no }}</b></td>
									<td>{{ $leas->name }}</td>
									<td>{{ $leas->email }}</td>
									<td>{{ $leas->phone }}</td>
									<td>{{ $leas->address }}</td>
									<td>{{ $leas->pic_name }}</td>
									<td>
										@if ($leas->branch()->count() > 0)
											{{ $leas->branch->name }}
										@endif
									</td>
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

	@include('admin.loan.leasing._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableLeasing = $('#tableLeasing').DataTable({
			"sDom": 'rt',
      		"columnDefs": [{
        		"targets": [],
        		"orderable": false
      		}]
		});

		$("#searchDtbox").keyup(function() {
      		tableLeasing.search($(this).val()).draw();
    	});

    	$('#tableLeasing tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
	      	else {
	        	tableLeasing.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');
	        	var id = $(this).find('#idTableLeasing').val();
	          	window.location.href = "/admin/loan/leasing/"+id+"/edit";
	      	}
    	});

    	function deleteLeasing() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteLeasingModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
				}
		}

		function DeleteLeasing() {
			$("#formDeleteLeasing").submit();
		}
	</script>
@stop