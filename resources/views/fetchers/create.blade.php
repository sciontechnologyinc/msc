@extends('admin.master.template')

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    FETCHER'S FORM
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
                            <h2>Fetcher's Info</h2>
                        </div>
                        <div class="body">
                    {!! Form::open(['id' => 'dataForm', 'url' => 'fetcher/save']) !!}
                           <div class="form-group">
                                {!!Form::label('name', 'Name', array('class' => 'form-control-label'))!!}
                                {!!Form::text('name',null, ['placeholder' => 'Name', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
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
                                    {!!Form::label('rfidno', 'RFID No', array('class' => 'form-control-label'))!!}
                                    {!!Form::number('rfidno',null, ['placeholder' => 'RFID No', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                            </div>

                           <div class="form-group">
                                {!!Form::label('address', 'Address', array('class' => 'form-control-label'))!!}
                                {!!Form::text('address',null, ['placeholder' => 'Address', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                           </div>

                           <div class="form-group">
                                {!!Form::label('contact', 'Contact', array('class' => 'form-control-label'))!!}
                                {!!Form::number('contact',null, ['placeholder' => 'Contact', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                           </div>
                                {!!Form::submit('Create Fetcher', ['id' => 'addForm','class' => 'btn btn-primary  col-lg-2 offset-7']) !!}
                        </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@endsection