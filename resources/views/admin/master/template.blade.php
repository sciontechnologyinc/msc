<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Corinthians High Scool</title>
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <link href="../../plugins/waitme/waitMe.css" rel="stylesheet" />
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="../../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
    <style>
        input[type='checkbox']
            {
               left: 25px!important;
               opacity: 10 !important;
            }
            .dropup, .dropdown {
                position: relative;
                margin-top: 2%;
            }
            td.dataTables_empty {
                display: none !important;
            }
    </style>
</head>

<body class="theme-red">
    <div id="template">
        @include('admin.partial.loader')
        
        @include('admin.partial.navbar')

        @include('admin.partial.leftsidebar')

        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/momentjs/moment.js"></script>
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="../../plugins/node-waves/waves.js"></script>
    <script src="../../plugins/autosize/autosize.js"></script>
    <script src="../../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/forms/basic-form-elements.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="../../js/demo.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="../../js/demo.js"></script>
    <script src="{{ URL::asset('js/csv.js') }}"></script>
</body>

</html>
