@extends('admin.layout.blank')

@section('content')

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Coache</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"   action="{{route('Coaches.update',$coache->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="card-body">
                  <div class="form-group">
                        <label for="exampleInputEmail1">Change Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{$coache->email}}">
                        @if ($errors->has('email')) <label  class="alert alert-danger">{{ $errors->first('email') }}</label> @endif
                  </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Change Name</label>
                        <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{$coache->name}}">
                        @if ($errors->has('name')) <label  class="alert alert-danger">{{ $errors->first('name') }}</label> @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Change gender</label>
                        <input type="text" name="gender" class="form-control" id="exampleInputEmail1" placeholder="Enter gender" value="{{$coache->gender}}">
                        @if ($errors->has('name')) <label  class="alert alert-danger">{{ $errors->first('name') }}</label> @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Change date of birth</label>
                        <input type="date" name="date_of_birth" class="form-control" id="exampleInputEmail1" placeholder="Enter date_of_birth" value="{{$coache->date_of_birth}}">
                        @if ($errors->has('name')) <label  class="alert alert-danger">{{ $errors->first('name') }}</label> @endif
                    </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    @endsection
