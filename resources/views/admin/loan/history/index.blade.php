@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">History</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					      <a href="{{ route('admin.history.create') }}" class="btn btn-default">
					      	<i class="fa fa-plus" aria-hidden="true"></i> New
					      </a>
					      <button type="button" class="btn btn-default" onclick="deleteHistory()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'admin.history.delete', 'id'=>'formDeleteHistory']) !!}
					<div>

					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					
					<table class="table table-bordered table-striped table-color" id="tableHistory">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>History No.</th>
							<th>Note</th>
							<th>Customer No.</th>
							<th>Cash No.</th>
						</thead>
						<tbody>
							@foreach($history as $h)
								<tr>
									<td>
										<input type="checkbox" id="idTableHistory" name="id[]" class="checkin" value="{{ $h->id }}">
									</td>
									<td><b>{{ $h->history_no }}</b></td>
									<td>{{ $h->note }}</td>
									<td>{{ $h->customer_no }}</td>
									<td>{{ $h->cash_no }}</td>
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

	@include('admin.loan.history._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableCash = $('#tableHistory').DataTable({
			"sDom": 'rt',
      		"columnDefs": [{
        		"targets": [],
        		"orderable": false
      		}]
		});

		$("#searchDtbox").keyup(function() {
      		tableCash.search($(this).val()).draw();
    	});

    	$('#tableHistory tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
	      	else {
	        	tableHistory.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');
	        	var id = $(this).find('#idTableHistory').val();
	          	window.location.href = "/admin/history/"+id+"/edit";
	      	}
    	});

    	function deleteHistory() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteHistoryModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
				}
		}

		function DeleteHistory() {
			$("#formDeleteHistory").submit();
		}
	</script>
@stop