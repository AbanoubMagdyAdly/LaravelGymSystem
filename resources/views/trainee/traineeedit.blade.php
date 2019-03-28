@extends('admin.layout.blank')

@section('content')

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit training package</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"   action="{{route('TraineesController.update',$trainee->id)}}" method="POST">
                @csrf
                @method("PUT")

                <div class="card-body">
                  <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="name" name="name" class="form-control" id="exampleInputName"  value="{{$trainee->name}}">
                  </div>
                    <div class="form-group">
                        <label for="exampleInputprice">email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputprice" placeholder="Enter email" value="{{$trainee->email}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputcapacity">gender</label>
       

                        <input type="text" name="gender" class="form-control" id="exampleInputcapacity" placeholder="Enter gender" value="{{$trainee->gender}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputcapacity">date_of_birth</label>
       

                        <input type="date" name="date_of_birth" class="form-control" id="exampleInputcapacity" placeholder="Enter date_of_birth" value="{{$trainee->date_of_birth}}">
                    </div>
                           
                           
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    @endsection

