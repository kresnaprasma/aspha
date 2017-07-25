@extends('layout.admin')

@section('content')
	
	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>



	{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dropzone.css') }}"> --}}
    {{-- <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
    <link rel="stylesheet" type="text/css" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css"> --}}
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

	{{-- <script type="text/javascript" src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css"> --}}

	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Mokas<small>» Input Mokas</small></h3>
					<div class="box-tools pull-right">
						<a href="/admin/loan/">
                            {{-- <i aria-hidden="true"></i>
                            <b>Back</b> --}}
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
						<button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					{!! Form::open(['route' => 'admin.motor.store', 'id' => 'motorForm']) !!}
					<input type="hidden" name="_token" value={{ csrf_token() }}/>
					@if(count($errors))
			    		<div class="alert alert-danger">
			    			<strong>Whoops!</strong> There were some problems with your input.
			    			<br/>
			    			<ul>
			    				@foreach($errors->all() as $error)
			    				<li>{{ $error }}</li>
			    				@endforeach
			    			</ul>
			    		</div>
			    	@endif
						@include('admin.motor._form')
						<div class="form-group">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	{{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> --}}
	{{-- <script src="js/jquery.validate.js"></script>
	<script src="js/inputmotor-form.js"></script> --}}

	<script type="text/javascript">
		$(document).ready(function() {
			$('select[name="merk"]').on('change', function() {
				var merkID = $(this).val();
				if (merkID) {
					$.ajax({
						url: '/admin/motor/type/'+merkID,
						type: 'GET',
						dataType: 'json',
						success:function(data) {

							$('select[name="type"]').empty();
							$.each(data, function(key, value) {
								$('select[name="type"]').append('<option value="'+ key +'">'+ value +'</option>');
							});
						}
					});
				}else{
					$('select[name="type"]').empty();
				}
			});
		});
	</script>

	<script>
		$("#motorForm").validate({
			rules: {
				merk: "required",
				type: "required",
				post_name: "required",
				post_price: {
					required: true,
					numeric: true
				},
				stnk_address: "required",
				condition: "required",
				description: "required",
				status: "required"
			},
			messages: {
				merk: "Masukkan merk motor yang akan dijual",
				type: "Masukkan type motor yang akan dijual",
				post_name: "Masukkan judul postingan motor anda",
				post_price: {
					required: "Masukkan harga yang anda inginkan",
					numeric: "Hanya gunakan angka"
				},
				stnk_address: "Masukkan alamat stnk yang tertera",
				condition: "Harap isi kondisi terakhir motor",
				status: "Harap isi status terakhir motor",
				description: "Deskripsikan motor dengan jelas"
			},

			submitHandler: function(form) {
				form.submit();
			}
		});
	</script>

	{{-- <script type="text/javascript">
		$("#motorForm").validate();
	</script>
	<script>
		$().ready(function() {
			$("#motorForm").validate({
				rules: {
					merk: "required",
					type: "required",
					post_name: "required",
					post_price: "required",
					stnk_address: "required",
					condition: "required",
					status: "required",
					description: "required"
				}, 
				messages: {
					merk: "Masukkan merk motor yang akan dijual",
					type: "Masukkan type motor yang akan dijual",
					post_name: "Masukkan judul postingan motor anda",
					post_price: "Masukkan harga yang anda inginkan",
					stnk_address: "Masukkan alamat stnk yang tertera",
					condition: "Harap isi kondisi terakhir motor",
					status: "Harap isi status terakhir motor",
					description: "Deskripsikan motor dengan jelas"
				}
			});
		})
	</script> --}}
@stop