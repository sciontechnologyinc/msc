<div id="addfetchermodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Fetcher</h4>
        </div>
        <div class="modal-body">
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
                 {!!Form::text('address',null, ['placeholder' => 'Address', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
            </div>

            <div class="form-group">
                 {!!Form::label('contact', 'Contact', array('class' => 'form-control-label'))!!} <small>(09)123456789</small>
                 {!!Form::number('contact',null, ['placeholder' => 'Contact', 'class' => 'form-control col-lg-12', 'id' => 'txtPhone', 'required' => '' ])!!}
            </div>
            <span id="spnPhoneStatus"></span>

            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!!Form::submit('Create Fetcher', ['id' => 'addForm','class' => 'btn btn-primary']) !!}
              </div>
                 
         </div>
     {!! Form::close() !!}
        </div>
      
      </div>
  
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

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