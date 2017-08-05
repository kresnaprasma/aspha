@extends('layout.admin')

@section('content')

    {{-- <link rel="stylesheet" href="/styles/main.css"> --}}
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script src="/js/upload.js"></script>

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
                    <h3 class="box-title">Customer Upload</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box box-body">
                    {!! Form::open([ 'route' => [ 'image.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'book-image' ]) !!}
                    <div>
                        <h4>Upload Image</h4>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop