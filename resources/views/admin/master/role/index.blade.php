@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Role</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
						<div>
						    @if ($message = Session::get('success'))
					        	<div class="alert alert-success">
		            				<p>{{ $message }}</p>
		        				</div>
	    					@endif
    					</div>
					   	<div class="col-md-8">
					      	<button type="button" class="btn btn-default" onclick="addRole()">
					      		<i class="fa fa-plus" aria-hidden="true"></i> New
					      	</button>
					      	<button type="button" class="btn btn-default" onclick="deleteRole()">
					      		<i class="fa fa-times" aria-hidden="true"></i> Delete
					      	</button>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'admin.master.role.delete', 'id'=>'formDeleteRole']) !!}
					
					<table class="table table-bordered table-striped table-color" id="tableRole">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>Name</th>
							<th>Date</th>
						</thead>
						<tbody>
							@foreach($roles as $r)
								<tr>
									<td>
										<input type="checkbox" id="idTableRole" name="id[]" class="checkin" value="{{ $r->id }}">
									</td>
									<td>
										{{ $r->name }}
										{!! Form::hidden('name',$r->name,['id'=>'nameTableRole']) !!}
									</td>
									<td>
										{{ $r->created_at }}
									</td>
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

	@include('admin.master.role._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableRole = $('#tableRole').DataTable({
			"sDom": 'rt',
      		"columnDefs": [{
        		"targets": [],
        		"orderable": false
      		}]
		});

		$("#searchDtbox").keyup(function() {
      		tableRole.search($(this).val()).draw();
    	});

    	$('#tableRole tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
	      	else {
	        	tableRole.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');
	          	var id = $(this).find('#idTableRole').val();
	          	var name = $(this).find('#nameTableRole').val();

	          	editRole(id, name);
	      	}
    	});

    	function addRole() {
      		$("#createRoleModal").modal("show");
    	}

    	function editRole(id, name) {
      		$("#editRoleForm").attr('action', '/admin/master/role/' + id);
      		$("#nameRole").val(name);
      		$("#editRoleModal").modal("show");
    	}

    	function deleteRole() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteRoleModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
				}
		}

		function DeleteRole() {
			$("#formDeleteRole").submit();
		}
	</script>
@stop