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
                        </div>
                        <div class="body">
                            {!! Form::open(['id' => 'dataForm', 'url' => 'student/save']) !!}
                           <div class="form-group">
                                {!!Form::label('firstname', 'First Name', array('class' => 'form-control-label'))!!}
                                {!!Form::text('firstname',null, ['placeholder' => 'First Name', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                           </div>

                           <div class="form-group">
                                {!!Form::label('lastname', 'Last name', array('class' => 'form-control-label'))!!}
                                {!!Form::text('lastname',null, ['placeholder' => 'Last Name', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                           </div>

                           <div class="form-group">
                                {!!Form::label('email', 'Email', array('class' => 'form-control-label'))!!}
                                {!!Form::text('email',null, ['placeholder' => 'Email', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                           </div>

                           <div class="form-group"><label class="form-control-label">Gender</label>
                            {!! Form::select('gender', array('male' => 'Male', 'female' => 'Female'), null,array('class' => 'form-control', 'required' => '')) !!}
                           </div>

                           <div class="form-group">
                                <label>Birthday</label>
                                <div class="iconic-input">
                                    <i class="fa fa-calendar"></i>
                                    <input type="date" class="form-control" name="birthday" placeholder="Birthday" value="2018-08-15" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                    {!!Form::label('grade', 'Grade', array('class' => 'form-control-label'))!!}
                                         <select name="grade" class="form-control">
                                                 <option value="" disabled {{ old('grade') ? '' : 'selected' }}>Choose a grade</option>
                                                 @foreach($grades as $grade)
                                                     <option value="{{$grade->grade}}" {{ old('grade') ? 'selected' : '' }}>{{$grade->grade}} </option>
                                                 @endforeach
                                        </select>
                            </div>

                            <div class="form-group">
                                    {!!Form::label('section', 'Section', array('class' => 'form-control-label'))!!}
                                         <select name="section" class="form-control">
                                                 <option value="" disabled {{ old('section') ? '' : 'selected' }}>Choose a Section</option>
                                                 @foreach($sections as $section)
                                                     <option value="{{$section->section}}" {{ old('section') ? 'selected' : '' }}>{{$section->section}} </option>
                                                 @endforeach
                                        </select>
                            </div>

                            <div class="form-group">
                                    {!!Form::label('schoolyear', 'School Year', array('class' => 'form-control-label'))!!}
                                    {!!Form::text('schoolyear',null, ['placeholder' => 'School Year', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                            </div>

                           <div class="form-group">
                                {!!Form::label('contact', 'Contact', array('class' => 'form-control-label'))!!}
                                {!!Form::text('contact',null, ['placeholder' => 'Contact', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                           </div>

                           <div class="form-group">
                                {!!Form::label('fetcher', 'Fetcher', array('class' => 'form-control-label'))!!}
                                     <select name="fetcher" class="form-control">
                                             <option value="" disabled {{ old('fetcher') ? '' : 'selected' }}>Choose a fetcher</option>
                                             @foreach($fetchers as $fetcher)
                                                 <option value="{{$fetcher->name}}" {{ old('fetcher') ? 'selected' : '' }}>{{$fetcher->name}}</option>
                                             @endforeach
                                    </select>
                             </div>


                           <div class="form-group">
                                {!!Form::label('guardian', 'Guardian', array('class' => 'form-control-label'))!!}
                                {!!Form::text('guardian',null, ['placeholder' => 'Guardian', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                           </div>
                                {!!Form::submit('Create Student', ['id' => 'addForm','class' => 'btn btn-primary  col-lg-2 offset-7']) !!}
                        </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@endsection