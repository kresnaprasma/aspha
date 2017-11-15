@extends('layout.admin')

@section('content')
    {!! Form::model($cash ,['route'=>['cash.update', $cash->id],'id'=>'formCash', 'method'=>'PUT']) !!}
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

        window.onbeforeunload = function (e) {
            var cash_code = $('input[name=cash_no]').val();
            var collateral_code = $('input[name=customercollateral_no]').val();

            if(checkload == true) {
                $.ajax({
                    url: '/api/v1/cash/'+cash_code,
                    type: 'DELETE',
                    success:function(response){
                        e = e || window.event;

                        if (e) {
                            e.returnValue = 'Any String';
                        }

                        return 'Any String';
                    }
                });
            }

            if (checkload == true) {
                 $.ajax({
                 url: '/api/v1/customercollateral/'+collateral_code,
                 type: 'DELETE',
                 success:function(response){
                     e = e || window.event;

                     if (e) {
                         e.returnValue = 'Any String';
                        }

                    return 'Any String';
                    }
                });
            }
        }
        createCashNo();
        createCollateralNo();
    </script>
@stop