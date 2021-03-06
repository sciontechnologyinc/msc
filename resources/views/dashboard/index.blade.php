@extends('admin.master.template')

@section('content')
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                                <a href="{{ url('teachers') }}"><div class="text">TEACHERS</div></a>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">{{$t_teachers}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                                <a href="{{ url('students') }}"><div class="text">STUDENTS</div></a>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{$t_students}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                                <a href="{{ url('fetchers') }}"><div class="text">FETCHERS</div></a>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">{{$t_fetchers}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">RFID CARDS</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">{{$t_fetchers}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    List of Fetchers
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                                    <div class="table-responsive" style="padding:10px !important">
                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                <thead>
                                                    <tr>
                                                        <th>Fetcher</th>
                                                        <th>Status</th>
                                                        <th>Rfid No</th>
                                                        <th>Time</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Fetcher</th>
                                                        <th>Status</th>
                                                        <th>Rfid No</th>
                                                        <th>Time</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody> 
                                                        @foreach($logtrails as $index => $logtrail)
                                                        <tr>
                                                            <td>{{ $logtrail->fetcher }}</td>
                                                            <td>{{ $logtrail->status }}</td>
                                                            <td>{{ $logtrail->rfids }}</td>
                                                            <td>{{ $logtrail->time }}</td>
                                                            <td>{{ $logtrail->date }}</td>
                                                        </tr>
                                                </tbody>
                                                    @endforeach
                                            </table>
                                        </div>
                            </div>
                    </div>
                </div>
        </div>
    </section>
@endsection