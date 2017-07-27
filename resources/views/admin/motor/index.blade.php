@extends('layout.admin')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Mokas List</h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      {{-- <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> --}}
				   </div>
				</div>

				<div class="box-body">
					<div class="col-md-12 box-body-header">
					   <div class="col-md-8">
					      <a type="button" class="btn btn-default" href="/admin/motor/create">
					      <i class="fa fa-plus" aria-hidden="true"></i> New
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
					            <li><a href="{{ url('admin/motor/downloadExcel/xls') }}">Export</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="#">Find</a></li>
					         </ul>
					      </div>
					   </div>
					   <div class="col-md-4">
					      <input type="text" id="searchDtbox" class="form-control" placeholder="Search">
				   		</div>
					</div>

					{!! Form::open(['route'=>'admin.motor.delete', 'id'=>'formDeleteMotor']) !!}
					<div>
						<table class="table table-bordered table-striped table-color" id="tableMotor">
							<thead>
								<th><input type="checkbox" id="check_all"></th>
								<th>Merk</th>
								<th>Type</th>
								<th>Judul Motor</th>
								<th>Harga Motor</th>
								<th>Fitur</th>
								<th>Alamat STNK</th>
								<th>Kondisi</th>
								<th>Deskripsi Motor</th>
								<th>Status</th>
								<th>Action</th>
							</thead>
							<tbody>
								@foreach($motors as $mo)
								<tr>
									<td>
										<input type="checkbox" id="idTableMotor"
										name="id[]" class="checkin" value="{{ $mo->id }}">
									</td>
									<td>
										{{ $mo->merks['name'] }}
										<input type="hidden" id="merkTableMotor" name="merk[]" value="{{ $mo->merk }}">
									</td>
									<td>
										{{ $mo->types['name'] }}
										<input type="hidden" id="typeTableMotor" name="type[]" value="{{ $mo->type }}">
									</td>
									<td>
										{{ $mo->post_name }}
										<input type="hidden" id="postTableMotor" name="post_name[]" value="{{ $mo->post_name }}">
									</td>
									<td>
										{{ $mo->post_price }}
										<input type="hidden" id="priceTableMotor" name="post_name[]" value="{{ $mo->post_price }}">
									</td>
									<td>
										{{ $mo->fitur }}
										<input type="hidden" id="fiturTableMotor" name="post_name[]" value="{{ $mo->fitur }}">
									</td>
									<td>
										{{ $mo->stnk_address }}
										<input type="hidden" id="stnkTableMotor" name="post_name[]" value="{{ $mo->stnk_address }}">
									</td>
									<td>
										{{ $mo->condition }}
										<input type="hidden" id="conditionTableMotor" name="post_name[]" value="{{ $mo->condition }}">
									</td>
									<td>
										{{ $mo->description }}
										<input type="hidden" id="descriptionTableMotor" name="post_name[]" value="{{ $mo->description }}">
									</td>
									<td>
										{{ $mo->status }}
										<input type="hidden" id="statusTableMotor" name="post_name[]" value="{{ $mo->status }}">
									</td>
									<td>
										<a href="{{ action('Admin\MotorController@edit', $mo['id']) }}" class="btn btn-warning">
											Edit
										</a>
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
	</div>

	@include('admin.motor._modal')
@stop

@section('scripts')
	<script type="text/javascript">
		var tableMotor = $('#tableMotor').DataTable({
			"sDom": 'rt',
			"columnDefs": [{
				"targets": [],
				"orderable": false
				}]
		});

		$("#searchDtbox").keyup(function() {
			tableMotor.search($(this).val()).draw();
		});
		$('#tableMotor tbody').on('dblclick', 'tr', function() {
			if ( $(this).hasClass('selected') ) {
				$(this).removeClass('selected');
			}
			else{
				tableMotor.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');

				var id = $(this).find('#idTableMotor').val();
				var merks_id = $(this).find('#merkTableMotor').val();
				var types_id = $(this).find('#typeTableMotor').val();
				var post_name = $(this).find('#postTableMotor').val();
				var post_price = $(this).find('#priceTableMotor').val();
				var fitur = $(this).find('#fiturTableMotor').val();
				var stnk_address = $(this).find('#stnkTableMotor').val();
				var condition = $(this).find('#conditionTableMotor').val();
				var description = $(this).find('#descriptionTableMotor').val();
				var status = $(this).find('#statusTableMotor').val();
				GetEditDropdown(merks_id);

				EditMotor(id, merks_id, types_id, post_name, post_price, fitur, stnk_address, condition, description, status);
			}
		});

		$('select[id="merk"]').on('change', function() {
			var merks_id = $(this).val();
			GetEditDropdown(merks_id);
		});

		function EditMotor(id, merks_id, types_id, post_name, post_price, fitur, stnk_address, condition, description, status) {
			$("#editMotor").attr('action', '/admin/motor/' + id);
			$("#idMotor").val(id);
			$("#merkMotor").val(merks_id);
			$("#typeMotor").val(types_id);
			$("#postMotor").val(post_name);
			$("#priceMotor").val(post_price);
			$("#fiturMotor").val(fitur);
			$("#stnkMotor").val(stnk_address);
			$("#conditionMotor").val(condition);
			$("#descriptionMotor").val(description);
			$("#statusMotor").val(status);

			$("#editMotorModal").modal('show');
		}

		function deleteMotor() {
			if ($('.checkin').is(':checked')) {
				$("#deleteMotorModal").modal("show");
			} else {
				$('#deleteNoModal').modal("show");
			}
		}

		function DeleteMotor() {
			$("#formDeleteMotor").submit();
		}

		function GetEditDropdown(merks_id) {
			if (merks_id) {
				$.ajax({
					url: '/admin/motor/type/' + merks_id,
					type: 'GET',
					dataType: "json",
					success:function(data) {

						$("#typeMotor").empty();
						$.each(data, function(key, value) {
							$('#typeMotor').append('<option value="'+ key + '">' + value + '</option>');
						});
					}
				});
			}else{
				$('#typeMotor').empty();
			}
		}
	</script>
@stop
