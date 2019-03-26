@extends('admin.layout.blank')

@section('content')
<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Create Training Session</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{route('TrainingSession.store')}}" method="POST">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" name="name" class="form-control" id="name" placeholder="Enter Name">
                @if ($errors->has('name')) <label class="alert alert-danger">{{ $errors->first('name') }}</label> @endif
            </div>

            <div class="form-group">
                <label for="start_time">Start time</label>
                <input type="time" name="start_time" class="form-control" id="start_time"
                    placeholder="Enter start time">
                @if ($errors->has('start_time')) <label
                    class="alert alert-danger">{{ $errors->first('start_time') }}</label> @endif
            </div>

            <div class="form-group">
                <label for="finish_time">Finish time</label>
                <input type="time" name="finish_time" class="form-control" id="finish_time"
                    placeholder="Enter finish time">
                @if ($errors->has('finish_time')) <label
                    class="alert alert-danger">{{ $errors->first('finish_time') }}</label> @endif
            </div>

            <div class="form-group">
                <label for="date_of_session">Date of session</label>
                <input type="date" name="date_of_session" class="form-control" id="date_of_session"
                    placeholder="Enter date of session">
                @if ($errors->has('date_of_session')) <label
                    class="alert alert-danger">{{ $errors->first('date_of_session') }}</label> @endif
            </div>

            <div class="form-group">
                <label for="gym_id">Gym</label>
                <select name="gym_id" class="form-control" id="gym_id">
                    @foreach($gyms as $gym)
                    <option value={{$gym->id}}>
                        {{$gym->name}} Gym
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('gym_id')) <label class="alert alert-danger">{{ $errors->first('gym_id') }}</label>
                @endif
            </div>



            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
</div>
<!-- /.card -->
@endsection