@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Branch</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					      <button type="button" class="btn btn-default" onclick="addBranch()">
					      	<i class="fa fa-plus" aria-hidden="true"></i> New
					      </button>
					      <button type="button" class="btn btn-default" onclick="deleteBranch()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
					      </button>
					      <div class="btn-group">
					         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					         Action <span class="caret"></span>
					         </button>
					         <ul class="dropdown-menu">
					            <li><a href="#">Print</a></li>
					            <li><a href="#">Import</a></li>
					            <li><a href="{{ url('admin/loan/xls') }}">Export</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="#">Find</a></li>
					         </ul>
					      </div>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'master.branch.delete', 'id'=>'formDeleteBranch']) !!}
					<div>

					    @if ($message = Session::get('success'))
				        	<div class="alert alert-success">
	            				<p>{{ $message }}</p>
	        				</div>
    					@endif
					
					<table class="table table-bordered table-striped table-color" id="tableBranch">
						<thead>
							<th><input type="checkbox" id="check_all"></th>
							<th>Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Phone</th>
							<th>Fax</th>
						</thead>
						<tbody>
							@foreach($branch as $b)
								<tr>
									<td>
										<input type="checkbox" id="idTableBranch" name="id[]" class="checkin" value="{{ $b->id }}">
									</td>
									<td>
										{{ $b->name }}
										{!! Form::hidden('name',$b->name,['id'=>'nameTableBranch']) !!}
									</td>
									<td>
										{{ $b->email }}
										{!! Form::hidden('alias', $b->email,['id'=>'emailTableBranch']) !!}
									</td>
									<td>
										{{ $b->address }}
										{!! Form::hidden('address', $b->address, ['id'=>'addressTableBranch']) !!}
									</td>
									<td>
										{{ $b->phone }}
										{!! Form::hidden('phone', $b->phone, ['id'=>'phoneTableBranch'])!!}
									</td>
									<td>
										{{ $b->fax }}
										{!! Form::hidden('fax', $b->fax, ['id'=>'faxTableBranch']) !!}
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

	@include('admin.master.branch._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableBranch = $('#tableBranch').DataTable({
			"sDom": 'rt',
      		"columnDefs": [{
        		"targets": [],
        		"orderable": false
      		}]
		});

		$("#searchDtbox").keyup(function() {
      		tableBranch.search($(this).val()).draw();
    	});

    	$('#tableBranch tbody').on('dblclick', 'tr', function () {
      		if ( $(this).hasClass('selected') ) {
        		$(this).removeClass('selected');
      		}
	      	else {
	        	tableBranch.$('tr.selected').removeClass('selected');
	        	$(this).addClass('selected');
	          	var id = $(this).find('#idTableBranch').val();
	          	var name = $(this).find('#nameTableBranch').val();
	          	var email = $(this).find('#emailTableBranch').val();
	          	var address = $(this).find('#addressTableBranch').val();
	          	var phone = $(this).find('#phoneTableBranch').val();
	          	var fax = $(this).find('#faxTableBranch').val();

	          	editBranch(id,name,email,address,phone,fax);
	      	}
    	});

    	function addBranch() {
      		$("#createBranchModal").modal("show");
    	}

    	function editBranch(id,name,email,address,phone,fax){
    		console.log(id+name+email+address+phone+fax);
      		$("#editBranchForm").attr('action', '/master/branch/' + id);

      		$("#nameBranch").val(name);
      		$("#emailBranch").val(email);
      		$("#addressBranch").val(address);
      		$("#phoneBranch").val(phone);
      		$("#faxBranch").val(fax);

      		$("#editBranchModal").modal("show");
    	}

    	function deleteBranch() {
			if ($('.checkin').is(':checked')) 
			{
				$('#deleteBranchModal').modal("show");
			} else {
				$('#deleteNoModal').modal("show");
				}
		}

		function DeleteBranch() {
			$("#formDeleteBranch").submit();
		}
	</script>
@stop