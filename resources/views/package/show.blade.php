@extends('admin.layout.blank')

@section('content')
<body >

      <div class="bg-light text-dark back-" style="font-size:25px; margin-left:300px;width: 600px;height:350px;opacity: 0.9;text-align:center;border-radius: 15px;font-family: Nunito;">

        <h1  style= "border-radius:15px;size: 560px;"class="badge-secondary"> package Information </h1>

        <label style="margin-top: 20px;color:red;">PACKAGE ID: </label>
        <label  > {{$package->id}} </label>
        <br>
        <label style="color: red;">package Name: </label>
        <label> {{$package->name}} </label>
        <br>
        <label style="color: red;">package Price: </label>
        <br>
       <label > {{$package->price/100}}$ </label>
       <br>
       <label style="color: red;">package Capacity: </label>
        <br>
       <label > {{$package->capacity}} </label>
       <br>
        <label style="color:red;">package Added to the System at: </label>
        <br>
        <label > {{$package->created_at -> format('l js \of F Y h:i:s A')}} </label>
      </div>
</body>
    @endsection
