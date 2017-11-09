@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Supplier</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					      <a href="{{ route('admin.master.supplier.create') }}" class="btn btn-default">
					      	<i class="fa fa-plus" aria-hidden="true"></i> New
					      </a>
					      <button type="button" class="btn btn-default" onclick="deleteSupplier()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'admin.master.supplier.delete', 'id'=>'formDeleteSupplier']) !!}
					<div>

					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					
					<table class="table table-bordered table-striped table-color" id="tableSupplier">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>Supplier No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Address</th>
							<th>PIC Name</th>
							<th>PIC Phone</th>
							<th>Branch</th>
						</thead>
						<tbody>
							@foreach($supplier as $s)
								<tr>
									<td>
										<input type="checkbox" id="idTableSupplier" name="id[]" class="checkin" value="{{ $s->id }}">
									</td>
									<td><b>{{ $s->supplier_no }}</b></td>
									<td>{{ $s->name }}</td>
									<td>{{ $s->email }}</td>
									<td>{{ $s->phone }}</td>
									<td>{{ $s->address }}</td>
									<td>{{ $s->pic_name }}</td>
									<td>{{ $s->pic_phone }}</td>
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

	@include('admin.master.supplier._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableSupplier = $('#tableSupplier').DataTable({
			"sDom": 'rt',
      		"columnDefs": [{
        		"targets": [],
        		"orderable": false
      		}]
		});
		$("#searchDtbox").keyup(function() {
      		tableSupplier.search($(this).val()).draw();
    	});
    	$('#tableSupplier tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
	      	else {
	        	tableSupplier.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');
	        	var id = $(this).find('#idTableSupplier').val();
	          	window.location.href = "/admin/master/supplier/"+id+"/edit";
	      	}
    	});
    	function deleteSupplier() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteSupplierModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
				}
		}
		function DeleteSupplier() {
			$("#formDeleteSupplier").submit();
		}
	</script>
@stop