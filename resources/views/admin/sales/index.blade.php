@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Mokas Sales</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
						<div class="col-md-8">
							<a href="{{ route('admin.sales.create') }}" class="btn btn-default">
					    		<i class="fa fa-plus" aria-hidden="true"></i> New
					    	</a>
							<button type="button" class="btn btn-default" onclick="deleteSales()">
								<i class="fa fa-times" aria-hidden="true"> Delete</i>
							</button>

							<div class="btn-group">
				                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                  Action <span class="caret"></span>
				                </button>
				                <ul class="dropdown-menu">
					                <li><a href="#">Print</a></li>
					                <li><a href="#">Import</a></li>
					                <li><a href="#">Export</a></li>
					                <li role="separator" class="divider"></li>
					                <li><a href="#">Find</a></li>
					            </ul>
				            </div>
						</div>
						<div class="col-md-4">
			                <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
			            </div>
		            </div>

		            {!! Form::open(['route'=>'admin.sales.delete', 'id'=>'formDeleteSales']) !!}
		            <table class="table table-bordered table-striped table-color" id="tableSales">
		            	<thead>
		            		<th><input type="checkbox" id="check_all" /></th>
		            		<th>Sales No.</th>
		            		<th>Cust. Name</th>
		            		<th>Mokas No.</th>
		            		<th>Payment_Method</th>
		            		<th>Leasing</th>
		            		<th>Cashier</th>
		            	</thead>
		            	<tbody>
		            		@foreach($sales as $sa)
		            		<tr>
		            			<td>
		            			<input type="checkbox" id="idTableSales" name="id[]" class="checkin" value="{{ $sa->id }}">
		            			</td>
		            			<td>{{ $sa->sales_no }}</td>
		            			<td>{{ $sa->customer_name }}</td>
		            			<td>{{ $sa->mokas_number }}</td>
		            			<td>{{ $sa->payment_method }}</td>
		            			<td>{{ $sa->leaisng_no }}</td>
		            			<td>{{ $sa->cashier }}</td>
		            		</tr>
		            		@endforeach
		            	</tbody>
		            </table>
		            {!! Form::close() !!}
				</div><!-- /.box-body -->
			</div>
		</div>
	</div>

	@include('admin.sales._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var salesTable = $('#tableSales').DataTable({
			"dom": "rtip",
				"pageLength": 10,
				"retrieve": true,
		});

		$("#searchDtbox").keyup(function() {
	    	tableMokas.search($(this).val()).draw();
	    });
	    $('#tableSales tbody').on('dblclick', 'tr', function () {
	    	if ( $(this).hasClass('selected') ) {
	    		$(this).removeClass('selected');
	    	} else {
		        tableSales.$('tr.selected').removeClass('selected');
		        $(this).addClass('selected');

		        var id = $(this).find('#idtableSales').val();

		        window.location.href = "/admin/sales/"+id+"/edit";
	    	}
	    });

	    function deleteSales() {
	    	if ($('.checkin').is(':checked')) {
	    		$('#deleteSalesModal').modal('show');
	    	} else {
	    		$('#deleteNoModal').modal('show');
	    	}
	    }

	    function DeleteSales() {
	    	$('#formDeleteSales').submit();
	    }
	</script>

@stop