@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Employee Position</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					    	<button type="button" class="btn btn-default" onclick="addPosition()">
					    		<i class="fa fa-plus" aria-hidden="true"></i> New
					    	</button>
					      <button type="button" class="btn btn-default" onclick="deletePosition()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'human-resource.position.delete','id'=>'formDeletePosition']) !!}
					<div>

					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					<table class="table table-bordered table-striped table-color" id="tablePosition">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>No.</th>
							<th>Name</th>
							<th>Department</th>
						</thead>
						<tbody>
							@foreach($position as $p)
								<tr>
									<td>
										<input type="checkbox" id="idTablePosition" name="id[]" class="checkin" value="{{ $p->id }}">
									</td>
									<td>
										<b>{{ $p->position_no }}</b>
										{!! Form::hidden('position_no',$p->position_no,['id'=>'noTablePosition']) !!}
									</td>
									<td>
										{{ $p->name }}
										{!! Form::hidden('name',$p->name,['id'=>'nameTablePosition']) !!}
									</td>
									<td>
										{{ $p->department_no }}
										{!! Form::hidden('department_no',$p->department_no,['id'=>'departmentTablePosition']) !!}
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

	@include('human-resource.position._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tablePosition = $('#tablePosition').DataTable({
			"sDom": 'rt',
      		"columnDefs": [{
        		"targets": [],
        		"orderable": false
      		}]
		});

		$("#searchDtbox").keyup(function() {
      		tablePosition.search($(this).val()).draw();
    	});
    	$('#tablePosition tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
      		else {
	        	tablePosition.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');

		        var id = $(this).find('#idTablePosition').val();
	          	var no = $(this).find('#noTablePosition').val();
	          	var name = $(this).find('#nameTablePosition').val();
	          	var department = $(this).find('#departmentTablePosition').val();

	          	editPosition(id, no, name, department);
	        }
    	});

    	function addPosition() {
      		$("#createPositionModal").modal("show");
    	}

    	function editPosition(id, no, name, department) {

      		$("#editPositionForm").attr('action', '/admin/human-resource/position/' + id);
      		$("#noPositionEdit").val(no);
      		$("#namePositionEdit").val(name);
      		$("#departmentPositonEdit").val(department);

      		$("#editPositionModal").modal("show");
    	}

		function deletePosition() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deletePositionModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
			}
		}

		function DeletePosition() {
			$("#formDeletePosition").submit();
		}
	</script>
@stop