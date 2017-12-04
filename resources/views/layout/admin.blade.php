<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>{{ $page_title or "Aspha Dashboard" }}</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <!-- our style bro -->
    <link rel="stylesheet" type="text/css" href="{{ asset("/assets/css/style.css") }}">
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/assets/adminlte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <!-- Pickdate Style -->
    <link href="{{ asset("/assets/pickadate/themes/default.css")}}" rel="stylesheet" type="text/css">
    <link href="{{ asset("/assets/pickadate/themes/default.date.css")}}" rel="stylesheet">
    <link href="{{ asset("/assets/pickadate/themes/default.time.css")}}" rel="stylesheet">
    <link href="{{ asset("/assets/selectize/css/selectize.css")}}" rel="stylesheet">
    <link href="{{ asset("/assets/selectize/css/selectize.bootstrap3.css")}}" rel="stylesheet"
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css">

    <link href="{{ asset("/assets/adminlte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />



    
    @yield('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
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
        /*profile hrm*/
        .outer-div {
          height: 210px;
          width: 210px;
          background-color: #fff;
          border: 2px dashed #ccc;
          position: relative;
          border-radius: 10px;
        }
        .inner-div {
          height: 200px;
          width: 200px;
          background-color: #ccc;
          position: absolute;
          margin: -100px 0 0 -100px;
          left: 50%;
          top: 50%;
        }
        .outer-div-lg {
          height: 210px;
          background-color: #fff;
          border: 2px dashed #ccc;
          position: relative;
          border-radius: 10px;
        }
        .inner-div-lg {
          height: 200px;
          /*width: 100%;*/
          background-color: #fff;
          position: absolute;
          margin: -100px 0 0 -100px;
          left: 50%;
          top: 50%;
        }

        .btn-upload-profile {
          position: absolute;
          color: white;
          border: 0;
          width: 40px;
          height: 40px;
          margin: -20px 0 0 -20px;
          left: 50%;
          top: 50%;
        }
        .btn-upload-profile:hover {
          background-color: rgba(0, 0, 0, 0.3);
        }
        .btn-delete-profile {
          display: none;
          position: absolute;
          top: -10px;
          right: -10px;
          width: 25px;
          height: 25px;
          border-radius: 50%;
          background-color: #3087BD;
          color: white;
          border: 0;
        }
        .btn-delete-profile:hover {
          background-color: #7F6091;
        }
        /*end profile hrm*/

        .dropzone {
            border: 2px dashed #EB7260;
            box-shadow: 0 0 0 5px #373b44;
            padding: 20px;
            background: #373b44;
            color: #fff;
            text-align: center;
        }

        .dropzone h3 {
            color: white;
            text-align: center;
            line-height: 3em;
            margin-top: 20px;
        }

        .dz-clickable {
            cursor: pointer;
            
        }

        .dz-drag-hover {
            border: 2px solid #EB7260;
        }

        .dz-preview, .dz-processing, .dz-image-preview, .dz-success, .dz-complete {
            background-color: rgba(0, 0, 0, .5);
            padding: 5px;
        }

        .dz-preview {
            width: auto !important;
        }

        .dz-image {
            text-align: center;
            /*border: 1px solid #EB7260;*/
        }

        .dz-details {
            padding: 10px;
        }

        .dz-success-mark, .dz-error-mark,  {
            display: none;
        }
    </style>
</head>
<body class="skin-blue">
<div class="wrapper">

    <!-- Header -->
    @include('layout.partials.header')

    <!-- Sidebar -->
    @include('layout.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{-- <section class="content-header">
            <h1>
                {{ $page_title or "Page Title" }}
                <small>{{ $page_description or null }}</small>
            </h1>
            You can dynamically generate breadcrumbs here
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section> --}}

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Modal-->
    @include('layout.partials.modal')
    <!-- Footer -->
    @include('layout.partials.footer')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- our script bro-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

<script src="{{ asset ("/assets/js/style.js") }}"></script>
<script src="{{ asset ("/assets/pickadate/picker.js")}}"></script>
<script src="{{ asset ("/assets/pickadate/picker.date.js")}}"></script>
<script src="{{ asset ("/assets/pickadate/picker.time.js")}}"></script>
<script src="{{ asset ("/assets/selectize/selectize.min.js")}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<!-- AdminLTE App -->
<script src="{{ asset ("/assets/adminlte/dist/js/app.min.js") }}" type="text/javascript"></script>

<!-- Dropzone -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.js"></script>

@yield('scripts')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>