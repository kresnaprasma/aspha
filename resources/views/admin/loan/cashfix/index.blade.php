@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">DaTun Fix Admin</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					      <a href="{{ route('admin.cashfix.create') }}" class="btn btn-default">
					      	<i class="fa fa-plus" aria-hidden="true"></i> New
					      </a>
					      <button type="button" class="btn btn-default" onclick="deleteCashfix()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'admin.cashfix.delete', 'id'=>'formDeleteCashfix']) !!}
					<div>

					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					
					<table class="table table-bordered table-striped table-color" id="tableCashfix">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>Cashfix No.</th>
							<th>Tenor Approve</th>
							<th>Payment</th>
							<th>Approve Date</th>
							<th>Leasing No.</th>
							<th>Cash No.</th>
						</thead>
						<tbody>
							@foreach($cashfix as $cf)
								<tr>
									<td>
										<input type="checkbox" id="idTableCash" name="id[]" class="checkin" value="{{ $cf->id }}">
									</td>
									<td><b>{{ $cf->cashfix_no }}</b></td>
									<td>{{ $cf->tenor_approve }}</td>
									<td>{{ $cf->payment }}</td>
									<td>{{ $cf->approve_date }}</td>
									<td>{{ $cf->leasing_no }}</td>
									<td>{{ $cf->cash_no }}</td>
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

	@include('admin.loan.cashfix._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableCashfix = $('#tableCashfix').DataTable({
			"sDom": 'rt',
      		"columnDefs": [{
        		"targets": [],
        		"orderable": false
      		}]
		});

		$("#searchDtbox").keyup(function() {
      		tableCashfix.search($(this).val()).draw();
    	});

    	$('#tableCashfix tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
	      	else {
	        	tableCashfix.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');
	        	var id = $(this).find('#idTableCashfix').val();
	          	window.location.href = "/admin/cashfix/"+id+"/edit";
	      	}
    	});

    	function deleteCashfix() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteCashfixModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
				}
		}

		function DeleteCashfix() {
			$("#formDeleteCashfix").submit();
		}
	</script>
@stop