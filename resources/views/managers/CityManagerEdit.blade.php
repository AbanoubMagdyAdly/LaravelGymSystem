@extends('layouts.app')

@section('content')

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit City Manager</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"   action="{{route('CityManager.update',$city_manager->id)}}" method="POST">
                @csrf
                @method("PUT")

                <div class="card-body">
                  <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{$city_manager->email}}">
                  </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{$city_manager->name}}">
                    </div>
                            {{-- <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div> --}}
                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1">National ID</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
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
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div> --}}
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    @endsection
