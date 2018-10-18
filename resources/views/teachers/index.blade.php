@extends('admin.master.template')

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    TEACHER'S FORM
                    
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
                            <h2>Teacher's Info</h2>
                           
                            <ul class="header-dropdown m-r--5">
                            <a class="btn btn-primary"  data-toggle="modal" data-target="#addteachermodal">Add Teacher</a>
                            <a class="btn btn-warning" data-toggle="modal" data-target="#teacherArchived">Archived</a>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Birthday</th>
                                            <th>Department</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Action</th>
     
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Birthday</th>
                                            <th>Department</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> 
                                        @foreach($teachers as $index => $teacher)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $teacher->name}} {{ $teacher->lastname }}</td>
                                            <td>{{ $teacher->email }}</td>
                                            <td>{{ $teacher->gender }}</td>
                                            <td>{{ $teacher->birthday }}</td>
                                            <td>{{ $teacher->department }}</td>
                                            <td>{{ $teacher->address }}</td>
                                            <td>{{ $teacher->contact }}</td>
                                            
                                            <td>
                                            <div class="form-group" style="display:inline-flex">
                                            <a class="btn btn-success btn-sm mr-1" href="teacher/update/{!! $teacher->id !!}"><i class="fa fa-edit"></i></a>
                                            {!! Form::open(['id' => 'deleteForm', 'method' => 'post', 'url' => '/teacher/delete/' . $teacher->id]) !!}
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'rel' => 'tooltip', 'title' => 'Delete'] )  }}
                                            {!! Form::close() !!}
                                            </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                                @include('teachers.create')
                                @include('teachers.trash')
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@endsection