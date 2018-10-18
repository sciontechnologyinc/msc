@extends('admin.master.template')

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    STUDENT'S FORM
                </h2>
            </div>
  @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

 @if(count($errors) > 0 )
    <div class="alert alert-danger">
        <strong>Whoooppss !!</strong> There were some problem with your input. <br>
        <ul>
          @foreach($errors->all() as $error)
              <li> {{ $error }} </li>
          @endforeach
        </ul>
    </div>
 @endif
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Student's Info</h2>
                            <ul class="header-dropdown m-r--5">
                                <a class="btn btn-primary"  data-toggle="modal" data-target="#addstudentmodal">Add Student</a>
                                <a class="btn btn-warning" data-toggle="modal" data-target="#studentArchived">Archived</a>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>birthday</th>
                                            <th>grade</th>
                                            <th>section</th>
                                            <th>fetcher</th>
                                            <th>Action</th>
     
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>birthday</th>
                                            <th>grade</th>
                                            <th>section</th>
                                            <th>fetcher</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> 
                                        @foreach($students as $index => $student)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $student->firstname }} {{ $student->lastname }}</td>
                                            <td>{{ $student->gender }}</td>
                                            <td>{{ $student->birthday }}</td>
                                            <td>{{ $student->grade }}</td>
                                            <td>{{ $student->section }}</td>
                                            <td>{{ $student->fetcher }}</td>
                                            
                                            <td>
                                            <div class="form-group" style="display:inline-flex">
                                            <a class="btn btn-success btn-sm mr-1" href="student/update/{!! $student->id !!}"><i class="fa fa-edit"></i></a>
                                            {!! Form::open(['id' => 'deleteForm', 'method' => 'post', 'url' => 'student/delete/' . $student->id]) !!}
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'rel' => 'tooltip', 'title' => 'Delete'] )  }}
                                            {!! Form::close() !!}
                                            </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                            @include('students.create');
                            @include('students.trash');
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@endsection