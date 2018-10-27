<div id="addteachermodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Teacher</h4>
        </div>
        <div class="modal-body">
            {!! Form::open(['id' => 'dataForm1', 'url' => 'teacher/save']) !!}
            <div class="form-group">
                 {!!Form::label('name', 'First Name', array('class' => 'form-control-label'))!!}
                 {!!Form::text('name',null, ['placeholder' => 'First Name', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
            </div>

            <div class="form-group">
                 {!!Form::label('lastname', 'Last name', array('class' => 'form-control-label'))!!}
                 {!!Form::text('lastname',null, ['placeholder' => 'Last Name', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
            </div>

            <div class="form-group">
                 {!!Form::label('email', 'Email', array('class' => 'form-control-label'))!!}
                 {!!Form::text('email',null, ['placeholder' => 'Email', 'class' => 'form-control col-lg-12'])!!}
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
                     {!!Form::label('Department', 'Department', array('class' => 'form-control-label'))!!}
                     <select name="department" class="form-control">
                             <option value="" disabled {{ old('department') ? '' : 'selected' }}>Choose a Department</option>
                             @foreach($departments as $department)
                                 <option value="{{$department->department}}" {{ old('department') ? 'selected' : '' }}>{{$department->department}} </option>
                             @endforeach
                     </select>
             </div>

             <div class="form-group">
                     <label style="width:100%;">Section </label>
                         @foreach($sections as $section)
                         <label class="checkbox-inline pull-left" style="width:30%; margin-left:0px;background:#d9edf7;margin:0.5%;border-radius:20px;">
                         <input class="section" type="checkbox" name="section[]" value="{{$section->section}}" {{ old('section', $section->section) == 'value' ? 'checked="checked"' : '' }}> {{$section->section}}</label>
                          @endforeach
                     </div>

            <div class="form-group col-lg-12" >
                 {!!Form::label('address', 'Address', array('class' => 'form-control-label'))!!}
                 {!!Form::text('address',null, ['placeholder' => 'Address', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
            </div>

            <div class="form-group col-lg-12">
                 {!!Form::label('contact', 'Contact', array('class' => 'form-control-label'))!!} <small>(09)123456789</small>
                 {!!Form::number('contact',null, ['placeholder' => 'Contact', 'class' => 'form-control col-lg-12', 'id' => 'txtPhone', 'required' => '' ])!!}
                 &nbsp;&nbsp;<span id="spnPhoneStatus"></span>
            </div>
            
            <div class="form-group col-lg-12"><label class="form-control-label">Password</label>
             <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
            </div>

            <div class="form-group col-lg-12"><label class="form-control-label">Confirm Password</label>
             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 {!!Form::submit('Create Teacher', ['id' => 'addForm','class' => 'btn btn-primary']) !!}
              </div>
                 
         </div>
     {!! Form::close() !!}
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