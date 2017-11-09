@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Mokas Condition Checklist</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
						<div class="col-md-8">
							<a href="{{ route('admin.mokaschecklist.create') }}" class="btn btn-default">
					    		<i class="fa fa-plus" aria-hidden="true"></i> New
					    	</a>
							<button type="button" class="btn btn-default" onclick="deleteMokasChecklist()">
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

		            {!! Form::open(['route'=>'admin.mokaschecklist.delete', 'id'=>'formDeleteMokasChecklist']) !!}
		            <table class="table table-bordered table-striped table-color" id="tableMokasChecklist">
		            	<thead>
		            		<th><input type="checkbox" id="check_all" /></th>
		            		<th>Checklist No.</th>
		            		<th>Noka</th>
		            		<th>Nosin</th>
		            		<th>User Id</th>
		            	</thead>
		            	<tbody>
		            		@foreach($mokaschecklists as $mc)
		            		<tr>
		            			<td>
		            			<input type="checkbox" id="idTableMokasChecklist" name="id[]" class="checkin" value="{{ $mc->id }}">
		            			</td>
		            			<td>{{ $mc->mokaschecklist_no }}</td>
		            			<td>{{ $mc->chassis_number }}</td>
		            			<td>{{ $mc->machine_number }}</td>
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

	@include('admin.mokaschecklist._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var mokaschecklistTable = $('#tableMokasChecklist').DataTable({
			"dom": "rtip",
				"pageLength": 10,
				"retrieve": true,
		});

		$("#searchDtbox").keyup(function() {
	    	mokaschecklistTable.search($(this).val()).draw();
	    });
	    $('#tableMokasChecklist tbody').on('dblclick', 'tr', function () {
	    	if ( $(this).hasClass('selected') ) {
	    		$(this).removeClass('selected');
	    	} else {
		        mokaschecklistTable.$('tr.selected').removeClass('selected');
		        $(this).addClass('selected');

		        var id = $(this).find('#idTableMokasChecklist').val();

		        window.location.href = "/admin/mokaschecklist/"+id+"/edit";
	    	}
	    });

	    function deleteMokasChecklist() {
	    	if ($('.checkin').is(':checked')) {
	    		$('#deleteMokasModalChecklist').modal('show');
	    	} else {
	    		$('#deleteNoModal').modal('show');
	    	}
	    }

	    function DeleteMokasChecklist() {
	    	$('#formDeleteMokasChecklist').submit();
	    }
	</script>

@stop