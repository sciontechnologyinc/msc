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
                            <h2>Trash Lists</h2>
                           
                            <ul class="header-dropdown m-r--5">
                            <a class="btn btn-primary" href="{{url('teacher/add')}}">Add Teacher</a>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
     
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> 
                                        @foreach($teachers as $index => $teacher)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $teacher->name }}</td>
                                            
                                            <td>
                                            <div class="form-group" style="display:inline-flex">
                                            {!! Form::open(['id' => 'deleteForm', 'method' => 'DELETE', 'url' => '/teacherTrash/' . $teacher->id]) !!}
                                            {{ Form::button('<i class="fa fa-window-restore"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm', 'rel' => 'tooltip', 'title' => 'Restore'] )  }}
                                            {!! Form::close() !!}
                                            </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@endsection