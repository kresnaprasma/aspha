@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Stock</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
						<div class="col-md-8">
							<a href="{{ route('mokas.create') }}" class="btn btn-default">
					    		<i class="fa fa-plus" aria-hidden="true"></i> New
					    	</a>
							<button type="button" class="btn btn-default" onclick="deleteMokas()">
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

		            {!! Form::open(['route'=>'mokas.delete', 'id'=>'formDeleteMokas']) !!}
		            <table class="table table-bordered table-striped table-color" id="tableMokas">
		            	<thead>
		            		<th><input type="checkbox" id="check_all" /></th>
		            		<th>Mokas No.</th>
		            		<th>Type</th>
		            		<th>Selling Price</th>
		            		<th>Discount</th>
		            		<th>STNK</th>
		            		<th>Branch Id</th>
		            		<th>Sales Id</th>
		            		<th>User Id</th>
		            	</thead>
		            	<tbody>
		            		@foreach($mokas as $mo)
		            		<tr>
		            			<td>
		            			<input type="checkbox" id="idTableMokas" name="id[]" class="checkin" value="{{ $mo->id }}">
		            			</td>
		            			<td>{{ $mo->mokas_no }}</td>
		            			<td>{{ $mo->types['name'] }}</td>
		            			<td>{{ $mo->selling_price }}</td>
		            			<td>{{ $mo->discount }}</td>
		            			<td>{{ $mo->stnk }}</td>
		            			<td>
									@if ($mo->branch()->count() > 0)
										{{ $mo->branch->name }}
									@endif
								</td>
		            			<td>{{ $mo->sales_id }}</td>
		            			<td>{{ $mo->user_id }}</td>
		            		</tr>
		            		@endforeach
		            	</tbody>
		            </table>
		            {!! Form::close() !!}
				</div><!-- /.box-body -->
			</div>
		</div>
	</div>

	@include('admin.mokas._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var mokasTable = $('#tableMokas').DataTable({
			"dom": "rtip",
				"pageLength": 10,
				"retrieve": true,
		});

		$("#searchDtbox").keyup(function() {
	    	mokasTable.search($(this).val()).draw();
	    });
	    $('#tableMokas tbody').on('dblclick', 'tr', function () {
	    	if ( $(this).hasClass('selected') ) {
	    		$(this).removeClass('selected');
	    	} else {
		        mokasTable.$('tr.selected').removeClass('selected');
		        $(this).addClass('selected');

		        var id = $(this).find('#idTableMokas').val();

		        window.location.href = "/mokas/"+id+"/edit";
	    	}
	    });

	    function deleteMokas() {
	    	if ($('.checkin').is(':checked')) {
	    		$('#deleteMokasModal').modal('show');
	    	} else {
	    		$('#deleteNoModal').modal('show');
	    	}
	    }

	    function DeleteMokas() {
	    	$('#formDeleteMokas').submit();
	    }
	</script>

@stop