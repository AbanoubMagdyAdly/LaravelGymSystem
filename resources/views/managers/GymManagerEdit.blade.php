@extends('admin.layout.blank')

@section('content')

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Gym Manager</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"   action="{{route('GymManager.update',$gym_manager->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="card-body">
                  <div class="form-group">
                        <label for="exampleInputEmail1">Change Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{$gym_manager->email}}">
                        @if ($errors->has('email')) <label  class="alert alert-danger">{{ $errors->first('email') }}</label> @endif
                  </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Change Name</label>
                        <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{$gym_manager->name}}">
                        @if ($errors->has('name')) <label  class="alert alert-danger">{{ $errors->first('name') }}</label> @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Change Avatar Image</label><br>
                        <input type="file"  name="avatar_image" id="image" class='image'>
                            @if ($errors->has('avatar_image')) <label class="alert alert-danger">{{ $errors->first('avatar_image') }}</label> @endif
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    @endsection
