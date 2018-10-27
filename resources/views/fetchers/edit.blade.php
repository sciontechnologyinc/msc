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
                                {!! Form::open(['id' => 'dataForm', 'method' => 'post', 'url' => 'fetcher/update/'.$fetcher->id.'/save']) !!}
                                <div class="form-group">
                                        {!!Form::label('firstname', 'First Name', array('class' => 'form-control-label'))!!}
                                        {!!Form::text('name',$fetcher->name, ['placeholder' => 'Name', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                                   </div>
        
                                   <div class="form-group"><label class="form-control-label">Gender</label>
                                    {!! Form::select('gender', array('male' => 'Male', 'female' => 'Female'), $fetcher->gender,array('class' => 'form-control', 'required' => '')) !!}
                                   </div>
        
                                    <div class="form-group">
                                        <label>Birthday</label>
                                        <div class="iconic-input">
                                            <i class="fa fa-calendar"></i>
                                        <input type="date" class="form-control" name="birthday" placeholder="Birthday" value="{{$fetcher->birthday}}" required="">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                            {!!Form::label('rfidno', 'RFID No', array('class' => 'form-control-label'))!!}
                                            {!!Form::number('rfidno',$fetcher->rfidno, ['placeholder' => 'RFID No', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                                    </div>
                                    <div class="form-group">
                                        {!!Form::label('Type', 'Type', array('class' => 'form-control-label'))!!}
                                             <select name="type" class="form-control">
                                                     <option value="" disabled>Fetcher Type</option>
                                                     <option value="schoolservice">School Service</option>
                                                     <option value="parent">Parent</option>
                                                     <option value="guardian">Guardian</option>
                                            </select>
                                    </div>
                                   <div class="form-group">
                                        {!!Form::label('address', 'Address', array('class' => 'form-control-label'))!!}
                                        {!!Form::text('address',$fetcher->address, ['placeholder' => 'Address', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                                   </div>
        
                                   <div class="form-group">
                                        {!!Form::label('contact', 'Contact', array('class' => 'form-control-label'))!!}
                                        {!!Form::number('contact',$fetcher->contact, ['placeholder' => 'Contact', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
                                   </div>
                               
                                {!!Form::submit('Update Fetcher', ['id' => 'addForm','class' => 'btn btn-primary  col-lg-2 offset-7']) !!}
                        </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@endsection