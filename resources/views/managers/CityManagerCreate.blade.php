@extends('admin.layout.blank')

@section('content')
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create City Manager</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"   action="{{route('CityManager.store')}}" method="POST">
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
                    {{-- <div class="form-group">
                         <label for="exampleInputEmail1">National ID</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div> --}}
                  {{-- <div class="form-group">
                    <label for="exampleInputFile">Upload Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div> --}}



                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    @endsection
