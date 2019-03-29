@extends('admin.layout.blank')

@section('content')

    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Session</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form"   action="{{route('TrainingSession.update',$trainingsession->id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="{{$trainingsession->name}}">
                    @if ($errors->has('name')) <label class="alert alert-danger">{{ $errors->first('name') }}</label> @endif

                    <div class="form-group">
                        <label for="created_at">Creted At</label>
                        <input type="date" name="created_at" class="form-control" id="created_at" placeholder="Enter Name" value="{{$trainingsession->created_at}}">
                        @if ($errors->has('created_at')) <label class="alert alert-danger">{{ $errors->first('created_at') }}</label> @endif
                    </div>

                    <div class="form-group">
                        <label for="manager_id">Gym</label>
                        <select  name="manager_id" class="form-control" id="manager_id" >
                            @foreach($gyms as $gym)

                            <option>
                                    {{$gym->name}}
                                </option>
                                @endforeach
                        </select>
                        @if ($errors->has('manager_id')) <label class="alert alert-danger">{{ $errors->first('manager_id') }}</label> @endif
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="city_id">City Id</label>--}}
                        {{--<select  name="city_id" class="form-control" id="city_id">--}}
                            {{--@foreach($trainingsessions as $single_session)--}}

                            {{--<option>--}}
                                    {{--{{$single_session->city_id}}--}}
                                {{--</option>--}}
                            {{--@endforeach--}}

                        {{--</select>--}}
                        {{--@if ($errors->has('city_id')) <label class="alert alert-danger">{{ $errors->first('city_id') }}</label> @endif--}}
                    {{--</div>--}}



                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
