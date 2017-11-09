@extends('layout.admin')

@section('content')
    {!! Form::model($cash, ['route'=>['admin.approve.show', $cash['id']],'id'=>'formApprove', 'method'=>'GET']) !!}
    <div class="row">
        <div class="col-md-12">
            @include('admin.approve._formshow',['edit'=>true])
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('scripts')
    @include('admin.approve._js')
    <script type="text/javascript">
    	var customer_no = '{{ $cash->Cash->Customer['customer_no'] }}';
        getCustomerList(customer_no);

    </script>
@stop