@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Human Resource</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					    	<button type="button" class="btn btn-default" onclick="addDepartment()">
					    		<i class="fa fa-plus" aria-hidden="true"></i> New
					    	</button>
					      <button type="button" class="btn btn-default" onclick="deleteDepartment()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'human-resource.department.delete','id'=>'formDeleteDepartment']) !!}
					<div>

					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					<table class="table table-bordered table-striped table-color" id="tableDepartment">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>No.</th>
							<th>Name</th>
						</thead>
						<tbody>
							@foreach($depts as $d)
								<tr>
									<td>
										<input type="checkbox" id="idTableDepartment" name="id[]" class="checkin" value="{{ $d->id }}">
									</td>
									<td>
										<b>{{ $d->department_no }}</b>
										{!! Form::hidden('department_no',$d->department_no,['id'=>'noTableDepartment']) !!}
									</td>
									<td>
										{{ $d->name }}
										{!! Form::hidden('name',$d->name,['id'=>'nameTableDepartment']) !!}
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

	@include('human-resource.department._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableDepartment = $('#tableDepartment').DataTable({
			"sDom": 'rt',
      		"columnDefs": [{
        		"targets": [],
        		"orderable": false
      		}]
		});

		$("#searchDtbox").keyup(function() {
      		tableDepartment.search($(this).val()).draw();
    	});
    	$('#tableDepartment tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
      		else {
	        	tableDepartment.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');

		        var id = $(this).find('#idTableDepartment').val();
	          	var no = $(this).find('#noTableDepartment').val();
	          	var name = $(this).find('#nameTableDepartment').val();

	          	editBank(id, no, name);
	        }
    	});

    	function addDepartment() {
    		alert('try');
      		$("#createDepartmentModal").modal("show");
    	}

    	function editBank(id, no, name) {

      		$("#editDepartmentForm").attr('action', '/admin/human-resource/department/' + id);
      		$("#noDepartmentEdit").val(no);
      		$("#nameDepartmentEdit").val(name)
      		$("#editDepartmentModal").modal("show");
    	}

		function deleteDepartment() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteDepartmentModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
			}
		}

		function DeleteDepartment() {
			$("#formDeleteDepartment").submit();
		}
	</script>
@stop