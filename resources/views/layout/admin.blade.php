<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>{{ $page_title or "Aspha Dashboard" }}</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

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
    <link href="{{ asset("/assets/selectize/css/selectize.bootstrap3.css")}}" rel="stylesheet">

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
        <section class="content-header">
            <h1>
                {{ $page_title or "Page Title" }}
                <small>{{ $page_description or null }}</small>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

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
<script src="{{ asset ("/assets/js/style.js") }}"></script>

<script src="{{ asset ("/assets/pickadate/picker.js")}}"></script>
<script src="{{ asset ("/assets/pickadate/picker.date.js")}}"></script>
<script src="{{ asset ("/assets/pickadate/picker.time.js")}}"></script>
<script src="{{ asset ("/assets/selectize/selectize.min.js")}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset ("/assets/adminlte/dist/js/app.min.js") }}" type="text/javascript"></script>

@yield('scripts')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>