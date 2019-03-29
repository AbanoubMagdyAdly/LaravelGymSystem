@extends('admin.layout.blank')

@section('content')
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Coaches</h3>
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
                        <input type="date" name="date_of_birth" class="form-control" id="exampleInputEmail1" placeholder="Enter date_of_birth">
                        @if ($errors->has('name')) <label class="alert alert-danger">{{ $errors->first('name') }}</label> @endif
                </div>
                    <div class="form-group">
                        <label for="gym_id">Gym</label>
                        <select  name="gym_id" class="form-control" id="gym_id">
                            @foreach($gyms as $gym)
                                <option value="{{$gym->id}}">
                                    {{$gym->name}}
                                    {{--//will be changed to city name and change type to string--}}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('gym_id')) <label class="alert alert-danger">{{ $errors->first('gym_id') }}</label> @endif
                    </div>
                    <div class="form-group">
                        <label for="gym_id">Training Session</label>
                        <select  name="training_session" class="form-control" id="training_session">
                            @foreach($trainingSessions as $session)
                                <option value="{{$session->id}}">
                                    {{$session->name}}
                                    {{--//will be changed to city name and change type to string--}}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('training_session')) <label class="alert alert-danger">{{ $errors->first('training_session') }}</label> @endif
                    </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
            </div>
    @endsection