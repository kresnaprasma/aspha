@extends('layout.admin')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Cash Loan</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      {{-- <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> --}}
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					      <a type="button" class="btn btn-default" href="/admin/loan/create">
					      <i class="fa fa-plus" aria-hidden="true"></i> New
					      </a>
					      <button type="button" class="btn btn-default" onclick="deleteLoan()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
						    <div class="btn-group">
						         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						         Action <span class="caret"></span>
						         </button>
						         <ul class="dropdown-menu">
						            <li><a href="#">Print</a></li>
						            <li><a href="#">Import</a></li>
						            <li><a href="{{ url('admin/loan/downloadExcel/xls') }}">Export</a></li>
						            <li role="separator" class="divider"></li>
						            <li><a href="#">Find</a></li>
						         </ul>
	        				</div>
						</div>
						<div class="col-md-4">
					    	<input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'admin.loan.delete', 'id'=>'formDeleteLoan']) !!}
					<div>

					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					
					<table class="table table-bordered table-striped table-color" id="tableLoan">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>Loan No.</th>
							<th>Type</th>
							<th>Warna Mesin</th>
							<th>No. BPKB</th>
							<th>Tahun Pembuatan</th>
							<th>Masa Berlaku STNK</th>
							<th>Tenor</th>
							<th>Permohonan Pinjaman</th>
							<th>User Approval</th>
							<th>Approval</th>
							<th>Customer</th>
							<th>Branch</th>
						</thead>
						<tbody>
							@foreach($loans as $l)
								<tr>
									<td>
										<input type="checkbox" id="idTableLoan" name="id[]" class="checkin" value="{{ $l->id }}">
									</td>
									<td>{{ $l->loan_no }}</td>
									<td>
										{{ $l->type }}
										<input type="hidden" id="typeTableLoan" name="type[]" value="{{ $l->type }}">
									</td>
									<td>
										{{ $l->vehicle_color }}
										<input type="hidden" id="colorTableLoan" name="vehicle_color[]" value="{{ $l->vehicle_color }}">
									</td>
									<td>
										{{ $l->bpkb }}
										<input type="hidden" id="bpkbTableLoan" name="bpkb[]" value="{{ $l->bpkb }}">
									</td>
									<td>
										{{ $l->vehicle_date }}
										<input type="hidden" id="dateTableLoan" name="vehicle_date[]" value="{{ $l->vehicle_date }}">
									</td>
									<td>
										{{ $l->stnk_due_date }}
										<input type="hidden" id="stnkTableLoan" name="stnk_due_date[]" value="{{ $l->stnk_due_date }}">
									</td>
									<td>
										{{ $l->tenor }}
										<input type="hidden" id="tenorTableLoan" name="tenor[]" value="{{ $l->tenor }}">
									</td>
									<td>
										<p>Rp {{ number_format($l->price_request) }}</p>
										<input type="hidden" id="requestTableLoan" name="price_request[]" value="{{ $l->price_request }}">
									</td>
									<td>{{ $l->user_approval }}</td>
									<td>
										{{ $l->approval }}
										<input type="hidden" id="approvalTableLoan" name="approval[]" value="{{ $l->approval }}">
									</td>
									<td>
										@if($l->customer()->count() > 0)
											{{ $l->customer->name }}
										@endif
									</td>
									<td>
										@if ($s->branch()->count() > 0)
											{{ $s->branch->name }}
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

	@include('admin.loan._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableLoan = $('#tableLoan').DataTable({
			"sDom": 'rt',
      		"columnDefs": [{
        		"targets": [],
        		"orderable": false
      		}]
		});

		$("#searchDtbox").keyup(function() {
      		tableLoan.search($(this).val()).draw();
    	});
    	$('#tableLoan tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      	}
      	else {
        	tableLoan.$('tr.selected').removeClass('selected');
        	$(this).addClass('selected');

	        var id = $(this).find('#idTableLoan').val();
	    	window.location.href = "/admin/loan/"+id+"/edit";
      		}
    	});

		function deleteLoan() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteLoanModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
				}
		}

		function DeleteLoan() {
			$("#formDeleteLoan").submit();
		}
	</script>
@stop