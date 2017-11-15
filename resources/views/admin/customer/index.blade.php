@extends('layout.admin')

@section('content')


	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Customer</h3>
				   <div class="box-tools pull-right">
				    	<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				    	<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   	<div class="col-md-8">
					    	<a href="{{ route('customer.create') }}" class="btn btn-default">
					    		<i class="fa fa-plus" aria-hidden="true"></i> New
					    	</a>
					    	<button type="button" class="btn btn-default" onclick="deleteCustomer()">
					    		<i class="fa fa-times" aria-hidden="true"></i> Delete
					    	</button>

					   	</div>
					   	<div class="col-md-4">
					    	<input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>

					</div>

					{!! Form::open(['route'=>'customer.delete', 'id'=>'formDeleteCustomer']) !!}
					<div>

					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					
					<table class="table table-bordered table-striped table-color" id="tableCustomer">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>Customer No</th>
							<th>Name</th>
							<th>Address</th>
							<th>Email</th>
							<th>phone</th>
							<th>City</th>
							<th>Branch</th>
							<th>Active</th>
						</thead>
						<tbody>
							@foreach($customer as $c)
								<tr>
									<td>
										<input type="checkbox" id="idTableCustomer" name="id[]" class="checkin" value="{{ $c->id }}">
									</td>
									<td><b>{{ $c->customer_no }}</b></td>
									<td>{{ $c->name }}</td>
									<td>{{ $c->address }}</td>
									<td>{{ $c->email }}</td>
									<td>{{ $c->phone }}</td>
									<td>{{ $c->city }}</td>
									<td>
										@if ($c->branch()->count() > 0)
											{{ $c->branch->name }}
										@endif
									</td>
									<td>{{ $c->active }}</td>
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

	@include('admin.customer._modal')
@stop

@section('scripts')

	<script type="text/javascript">
		var tableCustomer = $('#tableCustomer').DataTable({
			"sDom": 'rt',
      		"columnDefs": [{
        		"targets": [],
        		"orderable": false
      		}]
		});

		$("#searchDtbox").keyup(function() {
      		tableCustomer.search($(this).val()).draw();
    	});
    	$('#tableCustomer tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
      		else {
	        	tableCustomer.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');

		        var id = $(this).find('#idTableCustomer').val();
	        	
	        	window.location.href = "/customer/"+id+"/edit";
	        }
    	});

    	function AddCustomer() {
    		$('#createCustomerModal').modal('show');
    	}

		function deleteCustomer() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteCustomerModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
			}
		}

		function DeleteCustomer() {
			$("#formDeleteCustomer").submit();
		}
	</script>

	
@stop