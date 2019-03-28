@extends('admin.layout.blank')

@section('content')
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create XCoaches</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"   action="{{route('Coaches.store')}}" method="POST" enctype="multipart/form-data">
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
                    <label for="exampleInputEmail1">gender</label>
                        <input type="text" name="gender" class="form-control" id="exampleInputEmail1" placeholder="Enter gender">
                        @if ($errors->has('name')) <label class="alert alert-danger">{{ $errors->first('name') }}</label> @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">date of birth</label>
                        <input type="number" name="date_of_birth" class="form-control" id="exampleInputEmail1" placeholder="Enter date_of_birth">
                        @if ($errors->has('name')) <label class="alert alert-danger">{{ $errors->first('name') }}</label> @endif
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
            </div>
    @endsection