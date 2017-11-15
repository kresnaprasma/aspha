@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Price Sales History</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
						<div class="col-md-8">
							<a href="{{ route('pricesaleshistory.create') }}" class="btn btn-default">
					    		<i class="fa fa-plus" aria-hidden="true"></i> New
					    	</a>
							<button type="button" class="btn btn-default" onclick="deletePriceSalesHistory()">
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

		            {!! Form::open(['route'=>'pricesaleshistory.delete', 'id'=>'formDeletePriceSalesHistory']) !!}
		            <table class="table table-bordered table-striped table-color" id="tablePriceSalesHistory">
		            	<thead>
		            		<th><input type="checkbox" id="check_all" /></th>
		            		<th>History Sales No.</th>
		            		<th>Merk</th>
		            		<th>Type</th>
		            		<th>Selling Price</th>
		            		<th>Discount</th>
		            		{{-- <th>User Id</th> --}}
		            	</thead>
		            	<tbody>
		            		@foreach($saleshistories as $sh)
		            		<tr>
		            			<td>
		            			<input type="checkbox" id="idTablePriceSalesHistory" name="id[]" class="checkin" value="{{ $sh->id }}">
		            			</td>
		            			<td>{{ $sh->pricesaleshistory_no }}</td>
		            			<td>
									{{ $sh->merks->name }}
								</td>
		            			<td>
									{{ $sh->types->name }}
		            			</td>
		            			<td>{{ $sh->selling_price }}</td>
		            			<td>{{ $sh->discount }}</td>
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

	@include('admin.pricesaleshistory._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var pricesaleshistoryTable = $('#tablePriceSalesHistory').DataTable({
			"dom": "rtip",
				"pageLength": 10,
				"retrieve": true,
		});

		$("#searchDtbox").keyup(function() {
	    	pricesaleshistoryTable.search($(this).val()).draw();
	    });
	    $('#tablePriceSalesHistory tbody').on('dblclick', 'tr', function () {
	    	if ( $(this).hasClass('selected') ) {
	    		$(this).removeClass('selected');
	    	} else {
		        pricesaleshistoryTable.$('tr.selected').removeClass('selected');
		        $(this).addClass('selected');

		        var id = $(this).find('#idTablePriceSalesHistory').val();

		        window.location.href = "/pricesaleshistory/"+id+"/edit";
	    	}
	    });

	    function deletePriceSalesHistory() {
	    	if ($('.checkin').is(':checked')) {
	    		$('#deletePriceSalesHistoryModal').modal('show');
	    	} else {
	    		$('#deleteNoModal').modal('show');
	    	}
	    }

	    function DeletePriceSalesHistory() {
	    	$('#formDeletePriceSalesHistory').submit();
	    }
	</script>

@stop