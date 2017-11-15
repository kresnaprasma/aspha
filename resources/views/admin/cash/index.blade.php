@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Dana Tunai</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					      <a href="{{ route('cash.create') }}" class="btn btn-default">
					      	<i class="fa fa-plus" aria-hidden="true"></i> New
					      </a>
					      <button type="button" class="btn btn-default" onclick="deleteCash()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'cash.delete', 'id'=>'formDeleteCash']) !!}
					<div>

					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					
					<table class="table table-bordered table-striped table-color" id="tableCash">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>Cash No.</th>
							<th>Plafon Credit</th>
							<th>Tenor Request</th>
							<th>Customer No.</th>
							<th>Leasing No.</th>
							<th>Branch</th>
							<th>Credit Type</th>
							<th>User</th>
						</thead>
						<tbody>
							@foreach($cash as $ca)
								<tr>
									<td>
										<input type="checkbox" id="idTableCash" name="id[]" class="checkin" value="{{ $ca->id }}">
									</td>
									<td><b>{{ $ca->cash_no }}</b></td>
									<td>{{ $ca->credit_ceiling_request }}</td>
									<td>{{ $ca->tenor_request }}</td>
									<td>{{ $ca->customer_no }}</td>
									<td>{{ $ca->leasing_no }}</td>
									<td>
										@if ($ca->branch()->count() > 0)
											{{ $ca->branch->name }}
										@endif
									</td>
									<td>
										@if ($ca->credittype()->count() > 0)
											{{ $ca->credittype->name }}
										@endif
									</td>
									<td>
										@if($ca->user()->count() > 0)
											{{ $ca->user->name }}
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

	@include('admin.cash._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableCash = $('#tableCash').DataTable({
			"dom": "rtip",
	        "pageLength": 10,
    	    "retrieve": true,
		});

		$("#searchDtbox").keyup(function() {
      		tableCash.search($(this).val()).draw();
    	});

    	$('#tableCash tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
	      	else {
	        	tableCash.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');
	        	var id = $(this).find('#idTableCash').val();
	          	window.location.href = "/cash/"+id+"/edit";
	      	}
    	});

    	function deleteCash() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteCashModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
				}
		}

		function DeleteCash() {
			$("#formDeleteCash").submit();
		}
	</script>
@stop