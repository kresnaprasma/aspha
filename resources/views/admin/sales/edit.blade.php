@extends('layout.admin')

@section('content')
    {!! Form::model($sales ,['route'=>['sales.update', $sales['id']], 'id'=>'formSales', 'method'=>'PUT']) !!}
    <div class="row">
        <div class="col-md-12">
            @include('admin.sales._form',['edit'=>true])
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('scripts')
    @include('admin.sales._js')
    <script type="text/javascript">
    	var customer_no = '{{ $sales->customer_no }}';
    	getCustomerList(customer_no);
    </script>
@stop