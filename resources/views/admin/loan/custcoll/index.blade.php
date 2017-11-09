@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Customer Collateral</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					      <a href="{{-- {{ route('admin.loan.custcoll.create') }} --}}" class="btn btn-default">
					      	<i class="fa fa-plus" aria-hidden="true"></i> New
					      </a>
					      <button type="button" class="btn btn-default" onclick="deleteCustColl()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{{-- {!! Form::open(['route'=>'admin.loan.custcoll.delete', 'id'=>'formDeleteCustColl']) !!} --}}
					<div>

					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					
					<table class="table table-bordered table-striped table-color" id="tableCustColl">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>Cust. Collateral No.</th>
							<th>STNK</th>
							<th>BPKB</th>
							<th>No. Rangka</th>
							<th>No. Mesin</th>
							<th>Color</th>
							<th>CC</th>
							<th>Col. Name</th>
							<th>Tahun Buat</th>
							<th>Masa Berlaku STNK</th>
						</thead>
						<tbody>
							@foreach($custcoll as $cc)
								<tr>
									<td>
										<input type="checkbox" id="idTableCustColl" name="id[]" class="checkin" value="{{ $cc->id }}">
									</td>
									<td><b>{{ $cc->customercollateral_no }}</b></td>
									<td>{{ $cc->stnk }}</td>
									<td>{{ $cc->bpkb }}</td>
									<td>{{ $cc->machine_number }}</td>
									<td>{{ $cc->chassis_number }}</td>
									<td>{{ $cc->vehicle_color }}</td>
									<td>{{ $cc->vehicle_cc }}</td>
									<td>{{ $cc->collateral_name }}</td>
									<td>{{ $cc->vehicle_date }}</td>
									<td>{{ $cc->stnk_due_date }}</td>
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

	@include('admin.loan.custcoll._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableCustColl = $('#tableCustColl').DataTable({
			"sDom": 'rt',
      		"columnDefs": [{
        		"targets": [],
        		"orderable": false
      		}]
		});

		$("#searchDtbox").keyup(function() {
      		tableCustColl.search($(this).val()).draw();
    	});

    	$('#tableCustColl tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
	      	else {
	        	tableCustColl.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');
	        	var id = $(this).find('#idTableCustColl').val();
	          	window.location.href = "/admin/loan/custcoll/"+id+"/edit";
	      	}
    	});

    	function deleteCustColl() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteCustCollModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
				}
		}

		function DeleteCustColl() {
			$("#formDeleteCustColl").submit();
		}
	</script>
@stop