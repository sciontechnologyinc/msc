<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Corinthians High Scool</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link href="css/chs.css" rel="stylesheet">
</head>

<body class="theme-red">
    <div id="template">
            <header>
            <div class="header">

                    <div class="collapse navbar-collapse" id="navbar-collapse">

                            <div class="logout">
                                    <div class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
            
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                    </div>
                              </div>
                              
                        </div>


                <div class="chs-logo-header"><img src="/images/chslogo.png" alt=""></div> 
                <a href="" class="fetcher-header">Monitoring System</a>
                <input type="text" class="form-group" id="rfids">
            </div>
            </header>
           <div class="row col-lg-10 col-lg-offset-1" style="border:1px solid gray; margin-top:1%; padding:1%">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fetcher</th>
                            <th>Status</th>
                            <th>Section</th>
                            <th>Student</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
</div>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="http://www.datejs.com/build/date.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 function studenttable(){
     $.ajax({
         url:'rfids/students',
         method:'GET',
         data:{},
         success: function(data){
             console.log(data);
             for (x=0; x < data.fetchers.length; x++){
                var y = data.fetchers[x];
                $('tbody').append('<tr style="background-color:'+y.color+'!important">'+
                            '<td>'+y.id+'</td>'+
                            '<td>'+y.fetcher+'</td>'+
                            '<td>'+y.status+'</td>'+
                            '<td>'+y.section+'</td>'+
                            '<td>'+y.firstname + ' ' + y.lastname+'</td>'+
                            '<td>'+y.time+'</td>'+
                            '</tr>')
             }
         }
     })
 }

 function updateStatus(fetcher,status){
     $.ajax({
         url:'rfids/update/status/'+fetcher,
         method:'POST',
         data:{
             status:status
         },
         success: function(data){

         }
     })
 }
         $(document).ready( function () {
           
             studenttable();
            $('#table_id').DataTable();
            $('#rfids').change(function(){
                $.post('/rfids/get/'+$('#rfids').val(), function(response)
                    {
                        var name = response.fetchers[0].name;
                        var fetcherstatus = response.fetchers[0].status;
                        var timestat = new Date().toString("hh:mm:tt");
                        var color,status ;
                        if(fetcherstatus == 'OUT')
                        {
                            color = '#eaba2e';
                            fetcherstatus = 'IN';
                        }
                        else
                        {
                            color = 'white';
                            fetcherstatus = 'OUT';
                        }

                        $.ajax({
                                url:'rfids/update/'+name,
                                method:"POST",  
                                data:{
                                    color: color,
                                    time: timestat,
                                    status: fetcherstatus
                                },  
                                success: function( data ) {
                                    updateStatus(name,fetcherstatus);
                                    $('tbody').empty();
                                    studenttable();
                                    $.get('rfids/get/'+name, function(response)
                                        {
                                            var fullDate = new Date();
                                            var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) :(fullDate.getMonth()+1);
                                            var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();

                                            console.log(response.students.length);
                                            for(x=0; x < response.students.length; x++){
                                                var y = response.students[x];
                                                    $.ajax({
                                                url:"rfids/save/logtrail",
                                                method:"POST",
                                                data:{
                                                    fetcher:y.firstname,
                                                        status:y.status,
                                                        section:y.section,
                                                        student:y.firstname,
                                                        time:y.time,
                                                        date:currentDate
                                                    },
                                                    success: function(data){
                                                        $('#rfids').val('');
                                                    }
                                                });
                                                }
                                        },'json');
                                }
                            });
                    },'json');
            });
           
        });
    </script>
</body>

</html>
