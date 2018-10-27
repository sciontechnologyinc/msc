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
                            <ul class="header-dropdown m-r--5">
                                <a class="btn btn-primary"  data-toggle="modal" data-target="#addfetchermodal">Add Fetcher</a>
                                <a class="btn btn-warning" data-toggle="modal" data-target="#fetcherArchived">Archived</a>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Birthday</th>
                                            <th>RFID No.</th>
                                            <th>Type</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Birthday</th>
                                            <th>RFID No.</th>
                                            <th>Type</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> 
                                        @foreach($fetchers as $index => $fetcher)
                                        <tr>
                                            <td>{{ $fetcher->name }}</td>
                                            <td>{{ $fetcher->gender }}</td>
                                            <td>{{ $fetcher->birthday }}</td>
                                            <td>{{ $fetcher->rfidno }}</td>
                                            <td>{{ $fetcher->type }}</td>
                                            <td>{{ $fetcher->address }}</td>
                                            <td>{{ $fetcher->contact }}</td>
                                            <td>
                                            <div class="form-group" style="display:inline-flex">
                                            <a class="btn btn-success btn-sm mr-1" href="fetcher/update/{!! $fetcher->id !!}"><i class="fa fa-edit"></i></a>
                                            {!! Form::open(['id' => 'deleteForm', 'method' => 'post', 'url' => '/fetcher/delete/' . $fetcher->id]) !!}
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'rel' => 'tooltip', 'title' => 'Delete'] )  }}
                                            {!! Form::close() !!}
                                            </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                                @include('fetchers.create')
                                @include('fetchers.trash')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection