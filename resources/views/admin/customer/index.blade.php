@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Customer</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      {{-- <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> --}}
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					      <a type="button" class="btn btn-default" href="/admin/customer/create">
					      <i class="fa fa-plus" aria-hidden="true"></i> New
					      </a>
					      <button type="button" class="btn btn-default" onclick="deleteCustomer()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
					      <div class="btn-group">
					         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					         Action <span class="caret"></span>
					         </button>
					         <ul class="dropdown-menu">
					            <li><a href="#">Print</a></li>
					            <li><a href="#">Import</a></li>
					            <li><a href="{{ url('admin/customer/xls') }}">Export</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="#">Find</a></li>
					         </ul>
					      </div>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'admin.customer.delete', 'id'=>'formDeleteCustomer']) !!}
					<div>

					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					
					<table class="table table-bordered table-striped table-color" id="tableCustomer">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>No. KTP</th>
							<th>No. KK</th>
							<th>Nama Lengkap</th>
							<th>Alamat</th>
							<th>Kode Pos</th>
							<th>Tanggal Lahir</th>
							<th>Pekerjaan</th>
							<th>Alamat Tempat Kerja</th>
							<th>No. Telepon</th>
							<th>Gaji</th>
							<th>Email</th>
							<th>Password</th>
							<th>Action</th>
						</thead>
						<tbody>
							@foreach($customers as $c)
								<tr>
									<td>
										<input type="checkbox" id="idTableCustomer" name="id[]" class="checkin" value="{{ $c->id }}">
									</td>
									<td>
										{{ $c->ktp_number }}
										<input type="hidden" id="ktpTableCustomer" name="ktp_number[]" value="{{ $c->ktp_number }}">
									</td>
									<td>
										{{ $c->familycard_number }}
										<input type="hidden" id="familycardTableCustomer" name="familycard_number[]" value="{{ $c->familycard_number }}">
									</td>
									<td>
										{{ $c->fullname }}
										<input type="hidden" id="fullnameTableCustomer" name="fullname[]" value="{{ $c->fullname }}">
									</td>
									<td>
										{{ $c->address }}
										<input type="hidden" id="addressTableCustomer" name="address[]" value="{{ $c->address }}">
									</td>
									<td>
										{{ $c->post_code }}
										<input type="hidden" id="postTableCustomer" name="post_code[]" value="{{ $c->post_code }}">
									</td>
									<td>
										{{ $c->birth_date }}
										<input type="hidden" id="birthTableCustomer" name="birth_date[]" value="{{ $c->birth_date }}">
									</td>
									<td>
										{{ $c->job }}
										<input type="hidden" id="jobTableCustomer" name="job[]" value="{{ $c->job }}">
									</td>
									<td>
										{{ $c->company_address }}
										<input type="hidden" id="companyTableCustomer" name="company_address[]" value="{{ $c->company_address }}">
									</td>
									<td>
										{{ $c->handphone }}
										<input type="hidden" id="handphoneTableCustomer" name="handphone[]" value="{{ $c->handphone }}">
									</td>
									<td>
										{{ $c->salary }}
										<input type="hidden" id="salaryTableCustomer" name="salary[]" value="{{ $c->salary }}">
									</td>
									<td>
										{{ $c->email }}
										<input type="hidden" id="emailTableCustomer" name="email[]" value="{{ $c->email }}">
									</td>
									<td>
										{{ $c->password }}
										<input type="hidden" id="passwordTableCustomer" name="password[]" value="{{ $c->password }}">
									</td>
									<td>
										<a href="{{ action('Admin\CustomerController@edit', $c['id']) }}" class="btn btn-warning">
											Edit
										</a>
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
    	/*$('#tableCustomer tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      	}
      	else {
        	tableCustomer.$('tr.selected').removeClass('selected');
        	$(this).addClass('selected');

	        var id = $(this).find('#idTableCustomer').val();
	        var collateral_id = $(this).find('#collateralTableCustomer').val();
	        var merk = $(this).find('#merkTableCustomer').val();
	        var type = $(this).find('#typeTableCustomer').val();
    	    var vehicle_color = $(this).find('#colorTableCustomer').val();
        	var vehicle_cc = $(this).find('#ccTableCustomer').val();
        	var bpkb = $(this).find('#bpkbTableCustomer').val();
        	var chassis_number = $(this).find('#chassisTableCustomer').val();
        	var machine_number = $(this).find('#machineTableCustomer').val();
        	var vehicle_date = $(this).find('#dateTableCustomer').val();
    	    var stnk_due_date = $(this).find('#stnkTableCustomer').val();
    	    var tenor = $(this).find('#tenorTableCustomer').val();
        	var price_request = $(this).find('#requestTableCustomer').val();
        	var approval = $(this).find('#approvalTableCustomer').val(); 
        	var user_approval = $(this).find('#userapprovalTableCustomer').val();
        	
        	EditCustomer(id, collateral_id, merk, type, vehicle_color, vehicle_cc, bpkb, chassis_number, machine_number, vehicle_date, stnk_due_date, tenor, price_request, approval, user_approval);
      		}
    	}); */

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