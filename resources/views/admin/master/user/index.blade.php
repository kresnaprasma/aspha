@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">User</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div>
					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
    				</div>

					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					      <a href="{{ route('master.user.create') }}" class="btn btn-default">
					      	<i class="fa fa-plus" aria-hidden="true"></i> New
					      </a>
					      <button type="button" class="btn btn-default" onclick="deleteUser()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'master.user.delete', 'id'=>'formDeleteUser']) !!}
				
					
						<table class="table table-bordered table-striped table-color" id="tableUser">
							<thead>
								<th><input type="checkbox" id="check_all"></th>
								<th>Name</th>
								<th>Email</th>
								<th>Date</th>
							</thead>
							<tbody>
								@foreach($users as $u)
									<tr>
										<td>
											<input type="checkbox" id="idTableUser" name="id[]" class="checkin" value="{{ $u->id }}">
										</td>
										<td>{{ $u->name }}</td>
										<td>{{ $u->email }}</td>
										<td>{{ $u->created_at }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					{!! Form::close() !!}
				</div>
				<!-- box body -->
			</div>
		</div>
	</div>

	@include('admin.master.user._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableUser = $('#tableUser').DataTable({
			"sDom": 'rt',
      		"columnDefs": [{
        		"targets": [],
        		"orderable": false
      		}]
		});

		$("#searchDtbox").keyup(function() {
      		tableUser.search($(this).val()).draw();
    	});

    	$('#tableUser tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
	      	else {
	        	tableUser.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');
	        	var id = $(this).find('#idTableUser').val();
	          	window.location.href = "/master/user/"+id+"/edit";
	      	}
    	});

    	function deleteUser() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteUserModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
				}
		}

		function DeleteUser() {
			$("#formDeleteUser").submit();
		}
	</script>
@stop