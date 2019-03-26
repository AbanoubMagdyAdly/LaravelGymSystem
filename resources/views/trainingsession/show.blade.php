@extends('admin.layout.blank')

@section('content')
    <body>
    <div class="bg-light text-dark back-" style="font-size:25px; margin-left:300px;width: 600px;height:350px;opacity: 0.9;text-align:center;border-radius: 15px;font-family: Nunito;">

        <h1  style= "border-radius:15px;size: 560px;"class="badge-secondary">training session Information </h1>

        <label style="margin-top: 20px;color:red;">training session ID: </label>
        <label  > {{$trainingsession->id}} </label>
        <br>
        <label style="color: red;">training session Name: </label>
        <label> {{$trainingsession->name}} </label>
        <br>
        <label style="color: red;">training session start time: </label>
        <label > {{$trainingsession->start_time}} </label>
        <br>
        <label style="color:red;">training session end time: </label>
        <label > {{$trainingsession->finish_time}} </label>
        <br>
        <label style="color:red;">training session Date: </label>
        <label > {{$trainingsession->date_of_session}} </label>
        <br>
        <label style="color:red;">training session gym: </label>
        <label > {{$trainingsession->gym_id}} </label>
    </div>
    </body>
@endsection


