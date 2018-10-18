<div id="fetcherArchived" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Trash</h4>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody> 
                        @foreach($trashfetchers as $index => $trashfetcher)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $trashfetcher->name }}</td>

                            
                            <td>
                            <div class="form-group" style="display:inline-flex">
                            {!! Form::open(['id' => 'deleteForm', 'method' => 'DELETE', 'url' => '/fetcherTrash/' . $trashfetcher->id]) !!}
                            {{  Form::button('<i class="fa fa-window-restore"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm', 'rel' => 'tooltip', 'title' => 'Restore'] )  }}
                            {!! Form::close() !!}
                            </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
      </div>
    </div>
</div>