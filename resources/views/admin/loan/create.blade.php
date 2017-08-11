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
                        <div class="box-body">
                            <button type="button" class="btn btn-default" onclick="AddCustomer()">
                                <i class="fa fa-plus" aria-hidden="true"></i> Create Customer
                            </button>
                            
                            <select class="js-example-basic-example form-control" id="js-example-basic-example">
                                <option value=""></option>
                                @foreach($customer_list as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>

                        {!! Form::model($customer = new \App\Customer, ['route'=>'admin.customer.store', 'id'=>'formCustomer']) !!}
                            <form role="form">
                                @include('admin.customer._form',['edit'=>false])
                            </form>
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
            $("#js-example-basic-single").select2({
                tags: 'true',
                placeholder: 'Search Customer',
                allowClear: true
            });
        });
    </script>
@stop