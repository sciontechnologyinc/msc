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
                     <input type="date" class="form-control" id="dateofbirth" name="birthday" placeholder="Birthday" value="YYYY-MM-DD" required="">
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
                          <select name="section" clas   s="form-control">
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
                {!!Form::label('guardian', 'Guardian 1', array('class' => 'form-control-label'))!!}
                     <select name="guardian" class="form-control">
                             <option value="" disabled {{ old('fetcher') ? '' : 'selected' }}>Choose a fetcher</option>
                             @foreach($fetchers as $fetcher)
                                 <option value="{{$fetcher->name}}" {{ old('fetcher') ? 'selected' : '' }}>{{$fetcher->name}}</option>
                             @endforeach
                    </select>
           </div>
           <div class="form-group">
            {!!Form::label('guardian1', 'Guardian 2', array('class' => 'form-control-label'))!!}
                 <select name="guardian1" class="form-control">
                         <option value="" disabled {{ old('fetcher') ? '' : 'selected' }}>Choose a fetcher</option>
                         @foreach($fetchers as $fetcher)
                             <option value="{{$fetcher->name}}" {{ old('fetcher') ? 'selected' : '' }}>{{$fetcher->name}}</option>
                         @endforeach
                </select>
            </div>
            <div class="form-group">
                {!!Form::label('guardian2', 'Guardian 3', array('class' => 'form-control-label'))!!}
                     <select name="guardian2" class="form-control">
                             <option value="" disabled {{ old('fetcher') ? '' : 'selected' }}>Choose a fetcher</option>
                             @foreach($fetchers as $fetcher)
                                 <option value="{{$fetcher->name}}" {{ old('fetcher') ? 'selected' : '' }}>{{$fetcher->name}}</option>
                             @endforeach
                    </select>
            </div>
            <div class="form-group">
             {!!Form::label('contact', 'Contact', array('class' => 'form-control-label'))!!} <small>(09)123456789</small>
             {!!Form::text('contact',null, ['placeholder' => 'Contact', 'class' => 'form-control col-lg-12', 'id' => 'txtPhone', 'required' => '' ])!!}
             &nbsp;&nbsp;<span id="spnPhoneStatus"></span>
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
<script src="../../plugins/jquery/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#txtPhone').blur(function(e) {
        if (validatePhone('txtPhone')) {
            $('#spnPhoneStatus').html('Valid');
            $('#spnPhoneStatus').css('color', 'green');
        }
        else {
            $('#spnPhoneStatus').html('Invalid');
            $('#spnPhoneStatus').css('color', 'red');
        }
    });

});



function validatePhone(txtPhone) {
    var a = document.getElementById(txtPhone).value;
    var filter = /^\(?(\d{2})\)?[-\. ]?(\d{9})$/;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}
</script>