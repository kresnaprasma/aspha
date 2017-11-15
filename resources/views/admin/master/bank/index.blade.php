@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Bank</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					      <button type="button" class="btn btn-default" onclick="AddBank()">
					      	<i class="fa fa-plus" aria-hidden="true"></i> New
					      </button>
					      <button type="button" class="btn btn-default" onclick="deleteBank()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
					      <div class="btn-group">
					         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					         Action <span class="caret"></span>
					         </button>
					         <ul class="dropdown-menu">
					            <li><a href="#">Print</a></li>
					            <li><a href="#">Import</a></li>
					            <li><a href="{{ url('loan/xls') }}">Export</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="#">Find</a></li>
					         </ul>
					      </div>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'master.bank.delete', 'id'=>'formDeleteBank']) !!}
					<div>

					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					
					<table class="table table-bordered table-striped table-color" id="tableBank">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>Name</th>
							<th>Alias</th>
						</thead>
						<tbody>
							@foreach($banks as $b)
								<tr>
									<td>
										<input type="checkbox" id="idTableBank" name="id[]" class="checkin" value="{{ $b->id }}">
									</td>
									<td>
										{{ $b->name }}
										{!! Form::hidden('name',$b->name,['id'=>'nameTableBank']) !!}
									</td>
									<td>
										{{ $b->alias }}
										{!! Form::hidden('alias', $b->alias,['id'=>'aliasTableBank']) !!}
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

	@include('admin.master.bank._modal')
@stop


@section('scripts')
	<script type="text/javascript">
		var tableBank = $('#tableBank').DataTable({
			"dom": "rtip",
        	"pageLength": 10,
        	"retrieve": true,
		});

		$("#searchDtbox").keyup(function() {
      		tableBank.search($(this).val()).draw();
    	});

    	$('#tableBank tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
	      	else {
	        	tableBank.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');
	          	var id = $(this).find('#idTableBank').val();
	          	var name = $(this).find('#nameTableBank').val();
	          	var alias = $(this).find('#aliasTableBank').val();

	          	EditBank(id, name, alias);
	      	}
    	});

    	function AddBank() {
      		$("#createBankModal").modal("show");
    	}

    	function EditBank(id, name, alias) {
      		$("#editBankForm").attr('action', '/master/bank/' + id);
      		$("#nameBank").val(name);
      		$("#aliasBank").val(alias)
      		$("#editBankModal").modal("show");
    	}

    	function deleteBank() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteBankModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
				}
		}

		function DeleteBank() {
			$("#formDeleteBank").submit();
		}
	</script>
@stop