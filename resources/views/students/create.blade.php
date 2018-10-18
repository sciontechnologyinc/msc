<div id="addstudentmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Student</h4>
        </div>
        <div class="modal-body">
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
            <div class="form-group">
             {!!Form::label('contact', 'Contact', array('class' => 'form-control-label'))!!}
             {!!Form::text('contact',null, ['placeholder' => 'Contact', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!!Form::submit('Create Student', ['id' => 'addForm','class' => 'btn btn-primary']) !!}
                </div>
         </div>
             {!! Form::close() !!}
        </div>
      </div>
    </div>
</div>