@extends('layout.admin')

@section('content')

    {{-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset("/assets/dist/dropzone.css") }}"> --}}
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> --}}
    <script type="text/javascript" src="{{ asset("/assets/dist/dropzone.js") }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="/styles/main.css"> --}}


    <style>
        html, body {
            height: 100%;
        }

        #actions {
            margin: 2em 0;
            }


        /* Mimic table appearance */
        div.table {
            display: table;
        }
        div.table .file-row {
            display: table-row;
        }
        div.table .file-row > div {
            display: table-cell;
            vertical-align: top;
            border-top: 1px solid #ddd;
            padding: 8px;
        }
        div.table .file-row:nth-child(odd) {
            background: #f9f9f9;
        }

    /* The total progress gets shown by event listeners */
        #total-progress {
            opacity: 0;
            transition: opacity 0.3s linear;
        }

    /* Hide the progress bar when finished */
        #previews .file-row.dz-success .progress {
            opacity: 0;
            transition: opacity 0.3s linear;
        }

    /* Hide the delete button initially */
        #previews .file-row .delete {
            display: none;
        }

    /* Hide the start and cancel buttons and show the delete button */

        #previews .file-row.dz-success .start,
        #previews .file-row.dz-success .cancel {
            display: none;
        }
        #previews .file-row.dz-success .delete {
            display: block;
        }
    </style>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
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

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Customer - <b>{{ App\Customer::Maxno() }}</b></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>

                        {!! Form::model($customer = new \App\Customer, ['route'=>'admin.customer.store', 'id'=>'formCustomer']) !!}
                            {{-- <form role="form">
                                @include('admin.customer._form',['edit'=>false])
                            </form> --}}
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="js-example-basic-example form-control" id="js-example-basic-example" style="width: 270px;" onchange="getdata(this.value)">
                                            <option value=""></option>
                                            @foreach($customer_list as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>

                                        <button type="button" class="btn btn-default" onclick="AddCustomer()">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Create Customer
                                        </button>

                                        <div class="form-group{{ $errors->has('customer_no') ? 'has-error' : '' }}">
                                            
                                        </div>

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            {!! Form::label('name', "Name") !!}
                                            {!! Form::text('name', old('name'), ['class'=>'form-control','id'=>'name','autofocus']) !!}
                                            @if ($errors->has('name'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('name') }}</strong>
                                              </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                            {!! Form::label('address', "Address") !!}
                                            {!! Form::textarea('address', old('address'), ['class'=>'form-control','id'=>'address']) !!}
                                            @if ($errors->has('address'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('address') }}</strong>
                                              </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                                            {!! Form::label('birthdate', "Birthdate") !!}
                                            {!! Form::date('birthdate', old('birthdate'), ['class'=>'form-control','id'=>'birthdate']) !!}
                                            @if ($errors->has('birthdate'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('birthdate') }}</strong>
                                              </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('identity_number') ? ' has-error' : '' }}">
                                            {!! Form::label('identity_number', "KTP") !!}
                                            {!! Form::text('identity_number', old('identity_number'), ['class'=>'form-control','id'=>'identity_number']) !!}
                                            @if ($errors->has('identity_number'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('identity_number') }}</strong>
                                              </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                            {!! Form::label('gender', "Gender") !!}
                                            {!! Form::select('gender', ['Male'=>'Male','Female'=>'Female'],old('gender'), ['class'=>'form-control','id'=>'gender']) !!}
                                            @if ($errors->has('gender'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('gender') }}</strong>
                                              </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            {!! Form::label('phone', "Phone") !!}
                                            {!! Form::text('phone', old('phone'), ['class'=>'form-control','id'=>'phone']) !!}
                                            @if ($errors->has('phone'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('phone') }}</strong>
                                              </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Customer Collateral - <b>{{ App\CustomerCollateral::Maxno() }}</b></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    {!! Form::model($custcoll = new \App\CustomerCollateral, ['route'=>'admin.loan.custcoll.store','id'=>'formCustColl', 'class'=>'form-horizontal']) !!}
                    <div class="box-body">
                        <form role="form">
                            @include('admin.loan.custcoll._form',['edit'=>false])
                        </form>
                  <!-- /.box-body -->
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}                 
                </div>
                <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>

    @include('admin.loan._modal')
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#js-example-basic-example").select2({
                tags: 'true',
                placeholder: 'Search Customer',
                allowClear: true
            });
        });

        function getdata(e){
            $.get('/admin/customer/' + e,
                function(data){
                    alert(data);
            });
            alert(e);
        }

        $("#customer_list").change(function() {
            var customer_list = $(this).val();
            getCustomerList(customer_list);
        });

        function getCustomerList(customer_list) {
            $.ajax({
                url: '/api/customer'+ customer_list,
                type: 'GET',
                success: function (response) {
                    
                },
                error: function(response){
                    alert(response);
                }
            })     
        }

    </script>
@stop