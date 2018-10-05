@extends('admin.master.template')

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    DEPARTMENT'S FORM
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
                            <h2>Department's Info</h2>
                            <ul class="header-dropdown m-r--5">
                                <a class="btn btn-primary" href="{{url('department/add')}}">Add Department</a>
                            </ul>
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
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Department Code</th>
                                            <th>Department</th>
                                            <th>Action</th>
     
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Department Code</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> 
                                        @foreach($departments as $index => $department)
                                        <tr>
                                            <td>{{ $index + 1}}</td>
                                            <td>{{ $department->departmentcode }}</td>
                                            <td>{{ $department->department }}</td>
                                            
                                            <td>
                                            <div class="form-group" style="display:inline-flex">
                                            <a class="btn btn-success btn-sm mr-1" href="department/update/{!! $department->id !!}"><i class="fa fa-edit"></i></a>
                                            {!! Form::open(['id' => 'deleteForm', 'method' => 'post', 'url' => '/department/delete/' . $department->id]) !!}
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'rel' => 'tooltip', 'title' => 'Delete'] )  }}
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