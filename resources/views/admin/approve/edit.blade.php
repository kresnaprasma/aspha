@extends('layout.admin')

@section('content')
    {!! Form::model($cash ,['route'=>['approve.store', $cash->id],'id'=>'formApprove']) !!}
    <div class="row">
        <div class="col-md-12">
            @include('admin.approve._form',['edit'=>true])
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('scripts')
    @include('admin.approve._js')
    <script type="text/javascript">
    	var customer_no = '{{ $cash->customer_no }}';
        var cash = '{{ $cash->cash_no }}';

    	$('#cashApporve').val(cash);
        getCustomerList(customer_no);

    </script>
@stop