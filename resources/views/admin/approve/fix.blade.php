@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Approval Fix</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					      <button type="button" class="btn btn-default" onclick="deleteApprove()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					<div>
					{!! Form::open(['route'=>'approve.delete', 'id'=>'formDeleteApprove']) !!}
					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					
					<table class="table table-bordered table-striped table-color" id="tableApproveFix">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>Cashfix No.</th>
							<th>Tenor Approve</th>
							<th>Payment</th>
							<th>Plafond Approve</th>
							<th>Approve Date</th>
							<th>Leasing</th>
							<th>Cash No.</th>
							<th>Action</th>
						</thead>
						<tbody>
							@foreach($cashfix as $cf)
								<tr>
									<td>
										<input type="checkbox" id="idtableApproveFix" name="id[]" class="checkin" value="{{ $cf->id }}">
									</td>
									<td><b>{{ $cf->cashfix_no }}</b></td>
									<td>{{ $cf->tenor_approve }}</td>
									<td>{{ $cf->payment }}</td>
									<td>{{ $cf->plafond_approve }}</td>
									<td>{{ $cf->approve_date }}</td>
									<td>
										@if($cf->leasing()->count() > 0)
											{{ $cf->leasing->name }}
										@endif
									</td>
									<td>{{ $cf->cash_no }}</td>
									<td>
										<a class="btn btn-small btn-success" href="{{ URL::to('/approve/' . $cf->id) }}">Show</a>
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

	@include('admin.approve._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableApproveFix = $('#tableApproveFix').DataTable({
			"dom": "rtip",
	        "pageLength": 10,
    	    "retrieve": true,
		});

		$("#searchDtbox").keyup(function() {
      		tableApproveFix.search($(this).val()).draw();
    	});

    	$('#tableApproveFix tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
	      	else {
	        	tableApproveFix.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');
	        	// var id = $(this).find('#idtableApproveFix').val();
	         //  	window.location.href = "/admin/approve/"+id+"/edit";
	          	/*window.location.href = "/admin/approve/create";*/
	      	}
    	});

    	function deleteApprove() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteApproveModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
				}
		}

		function DeleteApprove() {
			$("#formDeleteApprove").submit();
		}
	</script>
@stop