@extends('layout.admin')

@section('content')

	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <section class="content">
    	{!! Form::model($loan, ['route' => ['admin.loan.update', $loan->id], 'class' => 'form-horizontal', 'id' => 'formCreateLoan', 'method'=>'PATCH']) !!}
    	@include('admin.loan._form', ['edit'=>true])
    	{!! Form::close() !!}
    </section>

	<script type="text/javascript" src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
@stop

@section('scripts')
	@include('admin.loan._js')
		<script type="text/javascript">
		    $(document).ready(function() {
		        $('select[name="merk"]').on('change', function() {
		            var merkID = $(this).val();
		            if(merkID) {
		                $.ajax({
		                    url: '/admin/loan/edit/ajax/'+merkID,
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