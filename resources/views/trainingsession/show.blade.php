@extends('admin.layout.blank')

@section('content')
    <body >

    <div class="bg-light text-dark back-" style="font-size:25px; margin-left:300px;width: 600px;height:350px;opacity: 0.9;text-align:center;border-radius: 15px;font-family: Nunito;">

        <h1  style= "border-radius:15px;size: 560px;"class="badge-secondary"> Gym Information </h1>

        <label style="margin-top: 20px;color:red;">Gym ID: </label>
        <label  > {{$gym->id}} </label>
        <br>
        <label style="color: red;">Gym Name: </label>
        <label> {{$gym->name}} </label>
        <br>
        <label style="color: red;">Gym Email: </label>
        <br>
        <label > {{$gym->email}} </label>
        <br>
        <label style="color:red;">Gym Added to the System at: </label>
        <br>
        <label > {{$gym->created_at}} </label>
    </div>
    </body>
@endsection


