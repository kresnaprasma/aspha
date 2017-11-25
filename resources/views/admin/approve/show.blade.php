@extends('layout.admin')

@section('content')
    {!! Form::model($cash, ['route'=>['approve.show', $cash['id']],'id'=>'formApprove', 'method'=>'GET']) !!}
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

        $('#credit_ceiling_requestFix').attr('disabled', 'disabled');
        $('#tenor_requestFix').attr('disabled', 'disabled');
        $('#branchidFix').attr('disabled', 'disabled');
        $('#leasingFix').attr('disabled', 'disabled');
        $('#credittypeidFix').attr('disabled', 'disabled');

        $('#cashfix_noFix').attr('disabled', 'disabled');
        $('#cash_noFix').attr('disabled', 'disabled');
        $('#platSales').attr('disabled', 'disabled');
        $('#tenor_approveFix').attr('disabled', 'disabled');
        $('#paymentFix').attr('disabled', 'disabled');
        $('#plafond_approveFix').attr('disabled', 'disabled');
        $('#approve_dateFix').attr('disabled', 'disabled');
        $('#leasing_noFix').attr('disabled', 'disabled');
    </script>
@stop