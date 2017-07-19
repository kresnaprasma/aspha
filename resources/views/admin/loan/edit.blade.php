@extends('layout.admin')

@section('content')

	<script type="text/javascript" src="{{ asset('assets/js/dropzone.js') }}"></script>
	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>  <!-- js for the add files area /-->

    <div class="row">
    	<div class="col-md-12">
    		<div class="box box-primary">
    			<div class="box-header with-border">
    				<h3 class="box-title">Cash Loan<small>» Edit Loan</small></h3>
    				<div class="box-tools pull-right">
    					<button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
    				</div>
    			</div>
    			<div class="box-body">
    				{!! Form::model($loan, ['method' => 'PATCH', 'route' => ['admin.loan.update', $loan->id]]) !!}
    				<input type="hidden" name="_token" value={{ csrf_token() }} />

    				{{-- @include('admin.loan._form') --}}

    			</div>
    		</div>
    	</div>
    </div>

		<script type="text/javascript" src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>

		<script type="text/javascript">
		    $(document).ready(function() {
		        $('select[name="merk"]').on('change', function() {
		            var merkID = $(this).val();
		            if(merkID) {
		                $.ajax({
		                    url: '/admin/loan/ajax/'+merkID,
		                    type: "GET",
		                    dataType: "json",
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

@stop