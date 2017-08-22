@extends('layout.admin')

@section('content')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary"> <!-- First box -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Cash - <b>{{ App\Cash::Maxno() }}</b></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                        {!! Form::model($cash = new \App\Cash, ['route'=>'admin.loan.cash.store','id'=>'formCash', 'class'=>'form-horizontal']) !!}
                    <div class="box-body">
                        <form role="form">
                            @include('admin.loan.cash._form',['edit'=>false])
                        </form>
                    </div>

                <div class="box box-primary"> <!-- Second box -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Customer</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>

                        {!! Form::model($customer = new \App\Customer, ['route'=>'admin.customer.store', 'id'=>'formCustomer']) !!}
                    </div>                        
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="customer_select2 form-control" id="customer_list" style="width: 150px;" onchange="getCustomerList(this.value)">
                                    <option value=""></option>
                                    @foreach($customer_list as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-default" onclick="AddCustomer()">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="form-group{{ $errors->has('customer_no') ? ' has-error' : '' }}">
                                {!! Form::label('customer_no', 'Customer No. :') !!}
                                {!! Form::text('customer_no', old('customer_no'), ['class' => 'form-control', 'id' => 'customernoLoan', 'autofocus', 'readonly' => 'true']) !!}
                                @if ($errors->has('customer_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('customer_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                                
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', "Name") !!}
                                {!! Form::text('name', old('name'), ['class'=>'form-control','id'=>'nameLoan','autofocus', 'readonly' => 'true']) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('identity_number') ? ' has-error' : '' }}">
                                {!! Form::label('identity_number', "KTP") !!}
                                {!! Form::text('identity_number', old('identity_number'), ['class'=>'form-control','id'=>'identity_numberLoan', 'readonly' => 'true']) !!}
                                @if ($errors->has('identity_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('identity_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                {!! Form::label('phone', "Phone") !!}
                                {!! Form::text('phone', old('phone'), ['class'=>'form-control','id'=>'phoneLoan', 'readonly' => 'true']) !!}
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                {!! Form::label('address', "Address") !!}
                                {!! Form::textarea('address', old('address'), ['class'=>'form-control','id'=>'addressLoan', 'readonly' => 'true']) !!}
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                <div class="box box-primary"> <!-- Third box -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Customer Collateral{{--  - <b>{{ App\CustomerCollateral::Maxno() }}</b> --}}</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    {!! Form::model($custcoll = new \App\CustomerCollateral, ['route'=>'admin.loan.custcoll.store','id'=>'formCreateCustColl', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        <form role="form">
                            @include('admin.loan.custcoll._form',['edit'=>false])
                        </form>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    {!! Form::close() !!}
                    </div>
                </div> <!-- Third box end -->

                </div> <!-- Second box end -->
            </div> <!-- First box end-->
        </div> <!-- colspan -->
    </div> <!-- row -->

    @include('admin.loan._modal')
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".customer_select2").select2({
                tags: 'true',
                placeholder: 'Search CRM',
                allowClear: true
            });
        });

        function getCustomerList(customer_list) {
            $.ajax({
                url: 'http://localhost:8000/api/v1/customer/'+ customer_list,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    console.log(response.data.customer_no, 
                        response.data.customer_name, 
                        response.data.customer_identity_number, 
                        response.data.customer_phone, 
                        response.data.customer_address);
                    $('#customernoLoan').val(response.data.customer_no);
                    $('#nameLoan').val(response.data.customer_name);
                    $('#identity_numberLoan').val(response.data.customer_identity_number);
                    $('#phoneLoan').val(response.data.customer_phone);
                    $('#addressLoan').val(response.data.customer_address);
                },
                error: function(response){
                    alert(response);
                }
            })     
        }

        function AddCustomer() {
            $('#createCustomerModal').modal('show');
        }

        $('#addcustomerloan').click(function() {
            $.ajax({
                type: 'post',
                url: 'http://localhost:8000/api/v1/customer',
                dataType: 'json',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('input[name=name]').val(),
                    'customer_no': $('input[name=customer_no]').val(),
                    'identity_number': $('input[name=identity_number]').val(),
                    'phone': $('input[name=phone]').val(),
                    'address': $('input[name=address]').val()
                },
                success: function (response){
                    console.log(response.data.customer_no, 
                        response.data.customer_name, 
                        response.data.customer_identity_number, 
                        response.data.customer_phone, 
                        response.data.customer_address);
                    $('#customernoLoan').val(response.data.customer_no);
                    $('#nameLoan').val(response.data.customer_name);
                    $('#identity_numberLoan').val(response.data.customer_identity_number);
                    $('#phoneLoan').val(response.data.customer_phone);
                    $('#addressLoan').val(response.data.customer_address);
                },
                error: function(response){
                    alert(response);
                }
            })
        })

    </script>
@stop