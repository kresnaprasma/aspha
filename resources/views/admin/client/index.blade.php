@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Client User List</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
						<div class="col-md-8">
							<a href="/admin/client/create" type="button" class="btn btn-default">
								<i class="fa fa-plus" aria-hidden="true">New</i>
							</a>
							 <button type="button" class="btn btn-default" onclick="deleteMotor()">
					      <i class="fa fa-times" aria-hidden="true"></i> Delete
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

					{!! Form::open(['route'=>'admin.client.delete', 'id'=>'formDeleteClient']) !!}
					<div>
						<table class="table table-bordered table-striped table-color" id="tableClient">
							<thead>
								<th><input type="checkbox" name="check_all"></th>
								<th>Name</th>
								<th>No KTP</th>
								<th>Address</th>
								<th>Kode Pos</th>
								<th>Tanggal Lahir</th>
								<th>Handphone</th>
								<th>Email</th>
								<th>Password</th>
							</thead>
							<tbody>
								@foreach($clients as $c)
								<tr>
									<td>
										<input type="checkbox" id="idTableClient" name="id[]" class="checkin" value="{{ $c->id }}">
									</td>
									<td>
										{{ $c->name }}
										<input type="hidden" name="name[]" id="nameTableClient" value="{{ $c->name }}">
									</td>
									<td>
										{{ $c->no_ktp }}
										<input type="hidden" name="no_ktp[]" id="ktpTableClient" value="{{ $c->no_ktp }}">
									</td>
									<td>
										{{ $c->address }}
										<input type="hidden" name="address[]" id="addressTableClient" value="{{ $c->address }}">
									</td>
									<td>
										{{ $c->post_code }}
										<input type="hidden" name="post_code[]" id="postcodeTableClient" value="{{ $c->post_code }}">
									</td>
									<td>
										{{ $c->birth_date }}
										<input type="hidden" name="birth_date[]" id="dateTableClient" value="{{ $c->birth_date }}">
									</td>
									<td>
										{{ $c->handphone }}
										<input type="hidden" name="handphone[]" id="handphoneTableClient" value="{{ $c->handphone }}">
									</td>
									<td>
										{{ $c->email }}
										<input type="hidden" name="email[]" id="emailTableClient" value="{{ $c->email }}">
									</td>
									<td>
										{{ $c->password }}
										<input type="hidden" name="password[]" id="passwordTableClient" value="{{ $c->password }}">
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					{!! Form::close() !!}
				</div><!-- box body -->
			</div>
		</div>
	</div>

	@include('admin.motor._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableClient = $('#tableClient').DataTable({
			"sDom": 'rt',
			"columnDefs": [{
				"targets": [],
				"orderable": false
			}]
		});

		$("#searchDtbox").keyup(function() {
			tableClient.search($(this).val()).draw();
		});
		$("#tableClient tbody").on('dblclick', 'tr', function() {
			if ($(this).hasClass('selected')) {
				$(this).removeClass('selected');
			} else {
				tableClient.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');

				var id = $(this).find('#idTableClient').val();
				var name = $(this).find('#nameTableClient').val();
				var no_ktp = $(this).find('#ktpTableClient').val();
				var address = $(this).find('#addressTableClient').val();
				var post_code = $(this).find('#postcodeTableClient').val();
				var birth_date = $(this).find('#dateTableClient').val();
				var handphone = $(this).find('#handphoneTableClient').val();
				var email = $(this).find('#emailTableClient').val();
				var password = $(this).find('#passwordTableClient').val();

				EditClient(id, name, no_ktp, address, post_code, birth_date, handphone, email, password);
			}
		});

		function EditClient(id, name, no_ktp, address, post_code, birth_date, handphone, email, password) {
			$('#editClient').attr('action', '/admin/client' + id);
			$('#idClient').val(id);
			$('#nameClient').val(name);
			$('#ktpClient').val(no_ktp);
			$('#addressClient').val(address);
			$('#postcodeClient').val(post_code);
			$('#dateClient').val(birth_date);
			$('#handphoneClient').val(handphone);
			$('#emailClient').val(email);
			$('#passwordClient').val(password);
			$('#editClientModal').modal("show");
		}

		function deleteClient() {
			if ($('.checkin').is(':checked')) {
				$('#deleteClientModal').modal('show');
			} else {
				$('#deleteNoModal').modal("show");
			}
		}

		function DeleteClient() {
			$('#formDeleteLoan').submit();
		}
	</script>
@stop