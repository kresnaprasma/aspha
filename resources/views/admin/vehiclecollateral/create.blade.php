@extends('layout.admin')

@section('content')
	
	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">

	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Vehicle Collateral<small>» Create Collateral</small></h3>
				   <div class="box-tools pull-right">
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				   </div>
				</div>

						<div class="box-body">
							{!! Form::open(['route' => 'admin.vehiclecollateral.store']) !!}
							<input type="hidden" name="_token" value={{ csrf_token() }}/>

						@include('admin.vehiclecollateral._form')
							<div class="form-group">
							</div>
						</div>

				</div>
			</div>
		</div>

	<script type="text/javascript">
	$(document).ready(function() {
        $('select[id="merk_id"]').on('change', function() {
            var merkID = $(this).val();
            if(merkID) {
                $.ajax({
                    url: '/admin/vehiclecollateral/type/'+merkID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        
                        $('select[id="type_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[id="type_id"]').append('<option value="'+ key +'">'+ value +'</option>');
						});
					}
				});
			}else{
				$('select[id="type_id"]').empty();
			}
		});
    });
	</script>
@stop