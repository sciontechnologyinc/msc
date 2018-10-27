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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="css/chs.css" rel="stylesheet">
    <style>
        td.dataTables_empty {
                display: none!important;
            }
            #navbarDropdown {
                font-size: 17px !important;
            }
            .actionButton{
                display: inline-flex !important;
                border: none !important;
            }
            @media (min-width: 768px){
            .modal-dialog {
                width: 780px;
                margin: 30px auto;
            }
            }
    </style>
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
                
            </div>
            </header>
           <div class="row col-lg-10 col-lg-offset-1" style="border:1px solid gray; margin-top:1%; padding:1%">
                Fetcher's ID : <input type="text" class="form-group" id="rfids" autofocus>
                <button type="text" class="btn btn btn-primary" data-toggle="modal" data-target="#myModal">Manage Student</button>
                <input type="text" class="form-group" id="rfidsnumber" hidden>
                <input type="text" class="section" value="{{ Auth::user()->section }}" hidden>
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Fetcher</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Section</th>
                            <th>Student</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody class="studentList">
                        
                    </tbody>
                </table>
                <div class="container">
                        <div class="modal fade" id="myModal" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Manage Students</h4>
                              </div>
                              <div class="modal-body">
                                    <table id="table_id" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Student Name</th>
                                                    <th>Grade</th>
                                                    <th>Section</th>
                                                    <th>Gender</th>
                                                    <th>Attendance</th>
                                                    <th>Contact</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="managestudenttable">
                                                
                                            </tbody>
                                        </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                        
                      </div>
            </div>
</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="http://www.datejs.com/build/date.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 function studenttable(sec){
     $.ajax({
         url:'rfids/students/'+sec,
         method:'post',
         data:{},
         success: function(data){
             console.log(data);
             for (x=0; x < data.fetchers.length; x++){
                var y = data.fetchers[x];
                $('.studentList').append('<tr style="background-color:'+y.color+'!important">'+
                            '<td>'+y.id+'</td>'+
                            '<td>'+y.todayfetcher+'</td>'+
                            '<td>'+y.type+'</td>'+
                            '<td>'+y.status+'</td>'+
                            '<td>'+y.section+'</td>'+
                            '<td>'+y.firstname + ' ' + y.lastname+'</td>'+
                            '<td>'+y.time+'</td>'+
                            '</tr>')
             }
         }
     })
 }

function manageStudent(sec){
    $.ajax({
         url:'rfids/attendance/'+sec,
         method:'post',
         data:{},
         success: function(data){
             console.log(data);
             for (x=0; x < data.fetchers.length; x++){
                var y = data.fetchers[x];
                $('.managestudenttable').append('<tr>'+
                            '<td>'+y.id+'</td>'+
                            '<td>'+y.firstname + ' ' + y.lastname+'</td>'+
                            '<td>'+y.grade+'</td>'+
                            '<td>'+y.section+'</td>'+
                            '<td>'+y.gender+'</td>'+
                            '<td>'+y.attendance+'</td>'+
                            '<td>'+y.contact+'</td>'+
                            '<td class="actionButton">'+
                            '<a class="btn btn-Primary btn-sm mr-1 present" title="Present" data-toggle="tooltip" id='+y.id+'><i style="color:green;font-size:25px" class="fa fa-thumbs-up"></i></a>'+
                            '<a class="btn btn-Danger btn-sm mr-1 absent" title="Absent" id='+y.id+'><i style="color:red;font-size:25px" class="fa fa-thumbs-down"></i></a>'+
                            '<a class="btn btn-Warning btn-sm mr-1 excuse" title="Excuse" id='+y.id+'><i style="color:black;font-size:25px" class="fa fa-hand-point-right"></i></a>'+
                            '</td>'+
                            '</tr>')

                    
             }
             $('.present').click(function(){
                        var presentId = this.id;
                        var name = this.title;
                        if (confirm("Mark Present!")) {
                            attendance(presentId,name);
                        } 
             });
             $('.absent').click(function(){
                        var presentId = this.id;
                        var name = this.title;
                        if (confirm("Mark Absent!")) {
                            attendance(presentId,name);
                        } 
             });
             $('.excuse').click(function(){
                        var presentId = this.id;
                        var name = this.title;
                        if (confirm("Mark Excuse!")) {
                            attendance(presentId,name);
                        } 
             });
         }
     })
}
 function updateStatus(fetcher,status,color,type){
     $.ajax({
         url:'rfids/update/status/'+fetcher,
         method:'POST',
         data:{
             status:status,
         },
         success: function(data){
                $.ajax({
                    url:'rfids/update/todayfetcher/'+fetcher,
                    method:'POST',
                    data:{
                        color:color,
                        status:status,
                        todayfetcher:fetcher,
                        type:type
                    },
                        success: function(data){
                            
                    }
                })
         }
     })
 }

 function attendance(id,name){
            $.ajax({
            url:'rfids/update/attendance/'+id+'/'+name,
            method:'POST',
            data:{},
            success: function(data){
                var a = $('.section').val().split(',');
                for(j=0; j < a.length ; j++){
                    var sec = $('.section').val().split(',')[j];
                var sec = $.trim(sec);
                    $('.studentList').empty();
                    $('.managestudenttable').empty();
                    manageStudent(sec);
                    studenttable(sec);
                }
            }
        })
 }
         $(document).ready( function () {
          

            $('[data-toggle="tooltip"]').tooltip(); 
             $('#rfids').change(function(){
                 console.log('test');
                 $('#rfidsnumber').val('');
                 $('#rfidsnumber').val($('#rfids').val());
             })
            var a = $('.section').val().split(',');
            for(j=0; j < a.length ; j++){
                var sec = $('.section').val().split(',')[j];
               var sec = $.trim(sec);
                manageStudent(sec);
                studenttable(sec);
            }
            
            $('#table_id').DataTable();
           
            $('#rfids').change(function(){
                $.post('/rfids/get/'+$('#rfids').val(), function(response)
                    {
                        var name = response.fetchers[0].name;
                        var fetcherstatus = response.fetchers[0].status;
                        var type = response.fetchers[0].type;
                        var timestat = new Date().toString("hh:mm:tt");
                        var color,status ;
                        console.table(fetcherstatus)
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
                                    status: fetcherstatus,
                                    todayfetcher:name
                                },  
                                success: function( data ) {
                                    $('#rfids').val('');
                                    updateStatus(name,fetcherstatus,color,type);
                                    $('tbody').empty();
                                    $.get('rfids/get/'+name, function(response)
                                        {
                                            var fullDate = new Date();
                                            var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) :(fullDate.getMonth()+1);
                                            var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();

                                            console.log(response.students.length);
                                                var y = response.students[0];
                                                    $.ajax({
                                                url:"rfids/save/logtrail",
                                                method:"POST",
                                                data:{
                                                        fetcher:y.todayfetcher,
                                                        status:y.status,
                                                        rfids:$('#rfidsnumber').val(),
                                                        time:y.time,
                                                        date:currentDate
                                                    },
                                                    success: function(data)
                                                    {
                                                        for(j=0; j < a.length ; j++){
                                                        var sec = $('.section').val().split(',')[j];
                                                            var sec = $.trim(sec);
                                                            studenttable(sec);
                                                            manageStudent(sec);
                                                        }
                                                        $('#rfids').val('');
                                                    }
                                                });
                                        },'json');
                                }
                            });
                    },'json');
            });
           
        });
    </script>
</body>

</html>
