@extends('layout.admin')

@section('content')
    {!! Form::model($cash ,['route'=>['admin.cash.update', $cash->id],'id'=>'formCash']) !!}
    <div class="row">
        <div class="col-md-12">
            @include('admin.cash._form',['edit'=>true])
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('scripts')
    @include('admin.cash._js')
    <script type="text/javascript">
    	var customer_no = '{{ $cash->customer_no }}';
    	getCustomerList(customer_no);
    </script>
@stop