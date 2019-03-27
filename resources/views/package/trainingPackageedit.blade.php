@extends('admin.layout.blank')

@section('content')

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit training package</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"   action="{{route('TrainingPackagesController.update',$package->id)}}" method="POST">
                @csrf
                @method("PUT")

                <div class="card-body">
                  <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="name" name="name" class="form-control" id="exampleInputName"  value="{{$package->name}}">
                  </div>
                    <div class="form-group">
                        <label for="exampleInputprice">price</label>
                        <input type="number" name="price" class="form-control" id="exampleInputprice" placeholder="Enter price" value="{{$package->price/100}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputcapacity">capcity</label>
                        <input type="number" name="capacity" class="form-control" id="exampleInputcapacity" placeholder="Enter capacity" value="{{$package->capacity}}">
                    </div>
                           
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    @endsection
