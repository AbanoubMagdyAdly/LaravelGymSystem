@extends('admin.layout.blank')

@section('content')
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Gym Manager</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"   action="{{route('GymManager.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                        @if ($errors->has('email')) <label  class="alert alert-danger">{{ $errors->first('email') }}</label> @endif
                    </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                        <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                        @if ($errors->has('name')) <label class="alert alert-danger">{{ $errors->first('name') }}</label> @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        @if ($errors->has('password')) <label class="alert alert-danger">{{ $errors->first('password') }}</label> @endif
                </div>
                <div class="form-group">
                     <label for="exampleInputPassword1"> Password Confirmation </label>
                    <input type="password"   name="password_confirmation" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password">
                        @if ($errors->has('password_confirmation')) <label class="alert alert-danger">{{ $errors->first('password_confirmation') }}</label> @endif
                </div>
                 <div class="form-group">
                    <label for="image">Select Image to upload</label><br>
                    <input type="file"  name="avatar_image" id="image" class='image'>
                        @if ($errors->has('avatar_image')) <label class="alert alert-danger">{{ $errors->first('avatar_image') }}</label> @endif
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
            </div>
    @endsection
