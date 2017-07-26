@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Permission</h3>
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
					      	<button type="button" class="btn btn-default" onclick="addPermission()">
					      		<i class="fa fa-plus" aria-hidden="true"></i> New
					      	</button>
					      	<button type="button" class="btn btn-default" onclick="deletePermission()">
					      		<i class="fa fa-times" aria-hidden="true"></i> Delete
					      	</button>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'admin.master.permission.delete', 'id'=>'formDeletePermission']) !!}
					
					<table class="table table-bordered table-striped table-color" id="tablePermission">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>Name</th>
							<th>Roles</th>
							<th>Date</th>
						</thead>
						<tbody>
							@foreach($permissions as $p)
								<tr>
									<td>
										<input type="checkbox" id="idTablePermission" name="id[]" class="checkin" value="{{ $p->id }}">
									</td>
									<td>
										{{ $p->name }}
										{!! Form::hidden('name',$p->name,['id'=>'nameTablePermission']) !!}
									</td>
									<td>
										@if ($p->roles()->count() > 0)
                  							@foreach ($p->roles as $role)
                    							{{ $role->name }}, 
                  							@endforeach
                  							<input type="hidden" id="roleTablePermission" value="{{ $p->roles->pluck('id') }}"/>
                  						@else
                  							<input type="hidden" id="roleTablePermission" value="[0]"/>
                						@endif
									</td>
									<td>
										{{ $p->created_at }}
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

	@include('admin.master.permission._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tablePermission = $('#tablePermission').DataTable({
			"dom": "rtip",
        	"pageLength": 10,
        	"retrieve": true,
		});

		$("#searchDtbox").keyup(function() {
      		tablePermission.search($(this).val()).draw();
    	});

    	$('#tablePermission tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
	      	else {
	        	tablePermission.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');
	          	var id = $(this).find('#idTablePermission').val();
	          	var name = $(this).find('#nameTablePermission').val();
	          	var role = $(this).find('#roleTablePermission').val();

	          	editPermission(id, name, role);
	      	}
    	});

    	function addPermission() {
      		$("#createPermissionModal").modal("show");
    	}

    	function editPermission(id, name, role) {
      		$("#editPermissionForm").attr('action', '/admin/master/permission/' + id);
      		$("#namePermission").val(name);
      		$("#rolePermission").val(JSON.parse(role));
      		$("#editPermissionModal").modal("show");
    	}

    	function deletePermission() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deletePermissionModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
				}
		}

		function DeletePermission() {
			$("#formDeletePermission").submit();
		}
	</script>
@stop