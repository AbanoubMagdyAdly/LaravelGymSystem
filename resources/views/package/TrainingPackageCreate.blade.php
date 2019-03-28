@extends('admin.layout.blank')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create package Manager</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"   action="{{route('TrainingPackagesController.store')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                        <label for="exampleInputName">package name</label>
                        <input type="name" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                  </div>

                            <div class="form-group">
                              <label for="exampleInputPrice">Price</label>
                              <input type="number"  name="price" class="form-control" id="exampleInputPrice" placeholder="Price">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputcapacity">Capacity</label>
                              <input type="number"  name="capacity" class="form-control" id="exampleInputcapacity" placeholder="capacity">
                            </div>
        
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
   
            <!-- /.card -->
    @endsection