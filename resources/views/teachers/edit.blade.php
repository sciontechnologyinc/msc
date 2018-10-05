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
                        </div>
                        <div class="body">
                                {!! Form::open(['id' => 'dataForm', 'method' => 'post', 'url' => 'teacher/update/'.$teacher->id.'/save'  ]) !!}
                           <div class="form-group">
                                {!!Form::label('firstname', 'First Name', array('class' => 'form-control-label'))!!}
                                {!!Form::text('firstname',$teacher->firstname, ['placeholder' => 'First Name', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                           </div>

                           <div class="form-group">
                                {!!Form::label('lastname', 'Surname', array('class' => 'form-control-label'))!!}
                                {!!Form::text('lastname',$teacher->lastname, ['placeholder' => 'Surname', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                           </div>
                           <div class="form-group">
                                {!!Form::label('email', 'Email', array('class' => 'form-control-label'))!!}
                                {!!Form::text('email',$teacher->email, ['placeholder' => 'Email', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                           </div>

                           <div class="form-group"><label class="form-control-label">Gender</label>
                            {!! Form::select('gender', array('male' => 'Male', 'female' => 'Female'), $teacher->gender,array('class' => 'form-control', 'required' => '')) !!}
                           </div>

                           <div class="form-group">
                                <label>Birthday</label>
                                <div class="iconic-input">
                                    <i class="fa fa-calendar"></i>
                                <input type="date" class="form-control" name="birthday" placeholder="Birthday" value="{{$teacher->birthday}}" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                    {!!Form::label('department', 'Department', array('class' => 'form-control-label'))!!}
                                        <select name="department" class="form-control">
                                                <option value="{{ $teacher->department }}">{{ $teacher->department }}</option>
                                        </select>
                            </div>

                            
                           <div class="form-group">
                                {!!Form::label('address', 'Address', array('class' => 'form-control-label'))!!}
                                {!!Form::text('address',$teacher->address, ['placeholder' => 'Address', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                           </div>

                           <div class="form-group">
                                {!!Form::label('contact', 'Contact', array('class' => 'form-control-label'))!!}
                                {!!Form::text('contact',$teacher->contact, ['placeholder' => 'Contact', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                           </div>
                               
                                {!!Form::submit('Update Teacher', ['id' => 'addForm','class' => 'btn btn-primary  col-lg-2 offset-7']) !!}
                        </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@endsection