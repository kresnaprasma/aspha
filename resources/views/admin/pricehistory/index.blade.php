@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Price History - Mokas</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
						<div class="col-md-8">
							<a href="{{ route('admin.pricehistory.create') }}" class="btn btn-default">
					    		<i class="fa fa-plus" aria-hidden="true"></i> New
					    	</a>
							<button type="button" class="btn btn-default" onclick="deletePriceHistory()">
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

		            {!! Form::open(['route'=>'admin.pricehistory.delete', 'id'=>'formDeletePriceHistory']) !!}
		            <table class="table table-bordered table-striped table-color" id="tablePriceHistory">
		            	<thead>
		            		<th><input type="checkbox" id="check_all" /></th>
		            		<th>History No.</th>
		            		<th>Selling Price</th>
		            		<th>Discount</th>
		            		<th>Note</th>
		            		{{-- <th>User Id</th> --}}
		            	</thead>
		            	<tbody>
		            		@foreach($pricehistory as $ph)
		            		<tr>
		            			<td>
		            			<input type="checkbox" id="idTablePriceHistory" name="id[]" class="checkin" value="{{ $ph->id }}">
		            			</td>
		            			<td>{{ $ph->mokas_number }}</td>
		            			<td>{{ $ph->selling_price }}</td>
		            			<td>{{ $ph->discount }}</td>
		            			<td>{{ $ph->note }}</td>
		            			{{-- <td>{{ $sh->user_id }}</td> --}}
		            		</tr>
		            		@endforeach
		            	</tbody>
		            </table>
		            {!! Form::close() !!}
				</div><!-- /.box-body -->
			</div>
		</div>
	</div>

	@include('admin.pricehistory._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var pricehistoryTable = $('#tablePriceHistory').DataTable({
			"dom": "rtip",
				"pageLength": 10,
				"retrieve": true,
		});

		$("#searchDtbox").keyup(function() {
	    	pricehistoryTable.search($(this).val()).draw();
	    });
	    $('#tablePriceHistory tbody').on('dblclick', 'tr', function () {
	    	if ( $(this).hasClass('selected') ) {
	    		$(this).removeClass('selected');
	    	} else {
		        pricehistoryTable.$('tr.selected').removeClass('selected');
		        $(this).addClass('selected');

		        var id = $(this).find('#idTablePriceHistory').val();

		        window.location.href = "/admin/pricehistory/"+id+"/edit";
	    	}
	    });

	    function deletePriceHistory() {
	    	if ($('.checkin').is(':checked')) {
	    		$('#deletePriceHistoryModal').modal('show');
	    	} else {
	    		$('#deleteNoModal').modal('show');
	    	}
	    }

	    function DeletePriceHistory() {
	    	$('#formDeletePriceHistory').submit();
	    }
	</script>

@stop