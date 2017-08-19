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
                            <select class="customer-select2 form-control" id="customer_list" style="width: 270px;" onchange="getCustomerList(this.value)">
                                <option value=""></option>
                                @foreach($customer_list as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>

                            <button type="button" class="btn btn-default" onclick="AddCustomer()">
                                <i class="fa fa-plus" aria-hidden="true"></i> Create Customer
                            </button>

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
                            <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                                {!! Form::label('birthdate', "Birthdate") !!}
                                {!! Form::date('birthdate', old('birthdate'), ['class'=>'form-control','id'=>'birthdateLoan', 'readonly' => 'true']) !!}
                                @if ($errors->has('birthdate'))
                                   <span class="help-block">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
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
                        <h3 class="box-title">Customer Collateral - <b>{{ App\CustomerCollateral::Maxno() }}</b></h3>
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
            $(".customer-select2").select2({
                tags: 'true',
                placeholder: 'Search Customer',
                allowClear: true
            });
        });

        /*function getdata(e){
            $.get('/admin/customer/' + e,
                function(data){
                    alert(data);
            });
            alert(e);
        }*/

        $("#customer_list").change(function() {
            var customer_list = $(this).val();
            getCustomerList(customer_list);
        });

        function AddCustomer() {
            $('#createCustomerModal').modal('show');
        }

        function getCustomerList(customer_list, name, address, birthdate, identity_number, gender, phone) {
            $.ajax({
                url: 'http://localhost:8000/api/v1/customer/'+ customer_list,
                type: 'GET',
                success: function (response) {
                    $('#customernoLoan').val(customer_no);
                    $('#nameLoan').val(name);
                    $('#addressLoan').val(address);
                    $('#birthdateLoan').val(birthdate);
                    $('#identity_numberLoan').val(identity_number);
                    $('#phoneLoan').val(phone);
                },
                error: function(response){
                    alert(response);
                }
            })     
        }

    </script>
@stop