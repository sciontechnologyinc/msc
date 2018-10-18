<div id="addfetchermodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Teacher</h4>
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
                 {!!Form::label('address', 'Address', array('class' => 'form-control-label'))!!}
                 {!!Form::text('address',null, ['placeholder' => 'Address', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
            </div>

            <div class="form-group">
                 {!!Form::label('contact', 'Contact', array('class' => 'form-control-label'))!!}
                 {!!Form::number('contact',null, ['placeholder' => 'Contact', 'class' => 'form-control col-lg-12', 'required' => '' ])!!}
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!!Form::submit('Create Fetcher', ['id' => 'addForm','class' => 'btn btn-primary']) !!}
              </div>
                 
         </div>
     {!! Form::close() !!}
        </div>
      
      </div>
  
    </div>