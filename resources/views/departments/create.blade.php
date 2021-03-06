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
                        </div>
                        <div class="body">
                    {!! Form::open(['id' => 'dataForm', 'url' => 'department/save']) !!}
                           <div class="form-group">
                                {!!Form::label('departmentcode', 'Department Code', array('class' => 'form-control-label'))!!}
                                {!!Form::text('departmentcode',null, ['placeholder' => 'Department Code', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                           </div>

                           <div class="form-group">
                                {!!Form::label('department', 'Department', array('class' => 'form-control-label'))!!}
                                {!!Form::text('department',null, ['placeholder' => 'Department', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                           </div>
                                {!!Form::submit('Create Department', ['id' => 'addForm','class' => 'btn btn-primary  col-lg-2 offset-7']) !!}
                               
                        </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@endsection