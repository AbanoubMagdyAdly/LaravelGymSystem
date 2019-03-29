@extends('admin.layout.blank')

@section('content')
<body >

      <div class="bg-light text-dark back-" style="font-size:25px; margin-left:300px;width: 600px;height:350px;opacity: 0.9;text-align:center;border-radius: 15px;font-family: Nunito;">

        <h1  style= "border-radius:15px;size: 560px;"class="badge-secondary"> coache Information </h1>

        <label style="margin-top: 20px;color:red;">coache ID: </label>
        <label  > {{$coache->id}} </label>
        <br>
        <label style="color: red;">coache Name: </label>
        <label> {{$coache->name}} </label>
        <br>
        <label style="color: red;">coache Email: </label>
        <br>
       <label > {{$coache->email}} </label>
       <br>
       <label style="color: red;">coache gender: </label>
        <br>
       <label > {{$coache->gender}} </label>
       <br>
       <label style="color: red;">coache date of birth: </label>
        <br>
       <label > {{$coache->date_of_birth}} </label>
     
  
</body>
    @endsection
