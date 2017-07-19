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
					            <li><a href="{{ url('admin/loan/xls') }}">Export</a></li>
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
					<table class="table table-bordered table-striped table-color" id="tableLoan">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							{{-- <th>Id</th> --}}
							<th>Collateral Id</th>
							{{-- <th>Merk</th> --}}
							<th>Type</th>
							<th>Warna Mesin</th>
							<th>Kapasitas Mesin (CC)</th>
							<th>No. BPKB</th>
							<th>No. Rangka</th>
							<th>No. Mesin</th>
							<th>Tahun Pembuatan</th>
							<th>Masa Berlaku STNK</th>
							<th>Tenor</th>
							<th>Permohonan Pinjaman</th>
							<th>Approval</th>
							{{-- <th>Actions</th> --}}
							{{-- <th>User Approval</th> --}}
						</thead>
						<tbody>
							@foreach($loans as $l)
								<tr>
									<td>
										<input type="checkbox" id="idTableLoan" name="id[]" class="checkin" value="{{ $l->id }}">
									</td>
									<td>
										{{ $l->collateral_id }}
										<input type="hidden" id="collateralTableLoan" name="collateral_id[]" value="{{ $l->collateral_id }}">
									</td>
									{{-- <td>
										{{ $l->merk }}
										<input type="hidden" id="merkTableLoan" name="merk[]" value="{{ $l->merk }}">
									</td> --}}
									<td>
										{{ $l->type }}
										<input type="hidden" id="typeTableLoan" name="type[]" value="{{ $l->type }}">
									</td>
									<td>
										{{ $l->vehicle_color }}
										<input type="hidden" id="colorTableLoan" name="vehicle_color[]" value="{{ $l->vehicle_color }}">
									</td>
									<td>
										{{ $l->vehicle_cc }}
										<input type="hidden" id="ccTableLoan" name="vehicle_cc[]" value="{{ $l->vehicle_cc }}">
									</td>
									<td>
										{{ $l->bpkb }}
										<input type="hidden" id="bpkbTableLoan" name="bpkb[]" value="{{ $l->bpkb }}">
									</td>
									<td>
										{{ $l->chassis_number }}
										<input type="hidden" id="chassisTableLoan" name="chassis_number[]" value="{{ $l->chassis_number }}">
									</td>
									<td>
										{{ $l->machine_number }}
										<input type="hidden" id="machineTableLoan" name="machine_number[]" value="{{ $l->machine_number }}">
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
									<td>
										{{ $l->approval }}
										<input type="hidden" id="approvalTableLoan" name="approval[]" value="{{ $l->approval }}">
									</td>
									{{-- <td>
										<a href="{{ route('admin.loan.edit', $l->id) }}" class="btn btn-warning">Edit</a>
									</td> --}}
									{{-- <td> --}}
									{{-- @if(count($l->users) > 0) --}}
										{{-- {{ $l->user_approval }} --}}
										{{-- <input type="hidden" id="userapprovalTableLoan" name="user_approval[] value="{{ $l->user_approval }}"> --}}
									{{-- @endif --}}
									{{-- </td> --}}
									
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
	        var collateral_id = $(this).find('#collateralTableLoan').val();
	        var merk = $(this).find('#merkTableLoan').val();
	        var type = $(this).find('#typeTableLoan').val();
    	    var vehicle_color = $(this).find('#colorTableLoan').val();
        	var vehicle_cc = $(this).find('#ccTableLoan').val();
        	var bpkb = $(this).find('#bpkbTableLoan').val();
        	var chassis_number = $(this).find('#chassisTableLoan').val();
        	var machine_number = $(this).find('#machineTableLoan').val();
        	var vehicle_date = $(this).find('#dateTableLoan').val();
    	    var stnk_due_date = $(this).find('#stnkTableLoan').val();
    	    var tenor = $(this).find('#tenorTableLoan').val();
        	var price_request = $(this).find('#requestTableLoan').val();
        	var approval = $(this).find('#approvalTableLoan').val(); 
        	var user_approval = $(this).find('#userapprovalTableLoan').val();
        	
        	EditLoan(id, collateral_id, merk, type, vehicle_color, vehicle_cc, bpkb, chassis_number, machine_number, vehicle_date, stnk_due_date, tenor, price_request, approval, user_approval);
      		}
    	});

    	function EditLoan(id, collateral_id, merk, type, vehicle_color, vehicle_cc, bpkb, chassis_number, machine_number, vehicle_date, stnk_due_date, tenor, price_request, approval, user_approval) {
    		$("#editLoan").attr('action', '/admin/loan/' + id);
    		$('#idLoan').val(id);
    		$("#collateralLoan").val(collateral_id);
    		$("#merkLoan").val(merk);
    		$("#typeLoan").val(type);
    		$("#colorLoan").val(vehicle_color);
    		$("#ccLoan").val(vehicle_cc);
    		$("#bpkbLoan").val(bpkb);
    		$("#chassisLoan").val(chassis_number);
    		$("#machineLoan").val(machine_number);
    		$("#dateLoan").val(vehicle_date);
    		$("#stnkLoan").val(stnk_due_date);
    		$("#tenorLoan").val(tenor);
    		$("#requestLoan").val(price_request);
    		$("#approvalLoan").val(approval);
    		$("#userapprovalLoan").val(user_approval);
    		$("#editLoanModal").modal("show");
    	}

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