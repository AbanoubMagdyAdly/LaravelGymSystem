
@extends('admin.layout.blank')

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Gym</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form"   action="{{route('Gym.store')}}" method="POST">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                    @if ($errors->has('name')) <label class="alert alert-danger">{{ $errors->first('name') }}</label> @endif
                </div>
                 <div class="form-group">
                  <label for="image">Upload Photo</label>
                  <div class="label-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-label" id="image">
                      <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <label for="created_at">Created At</label>
                    <input type="date" name="created_at" class="form-control" id="created_at" placeholder="Enter Name">
                    @if ($errors->has('created_at')) <label class="alert alert-danger">{{ $errors->first('created_at') }}</label> @endif
                </div>

                <div class="form-group">
                    <label for="manager_id">Manager</label>
                    <select  name="manager_id" class="form-control" id="manager_id">
                        @foreach($managers as $manager)
                            <option value="{{$manager->id}}">
                                {{$manager->name}}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('manager_id')) <label class="alert alert-danger">{{ $errors->first('manager_id') }}</label> @endif
                </div>
                <div class="form-group">
                    <label for="city_id">City</label>
                    <select  name="city_id" class="form-control" id="city_id">
                        @foreach($cities as $city)
                        <option value="{{$city->id}}">
                            {{$city->name}}
                            {{--//will be changed to city name and change type to string--}}
                        </option>
                            @endforeach
                    </select>
                    @if ($errors->has('city_id')) <label class="alert alert-danger">{{ $errors->first('city_id') }}</label> @endif
                </div>



                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
