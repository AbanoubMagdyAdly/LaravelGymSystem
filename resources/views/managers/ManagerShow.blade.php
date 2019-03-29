@extends('admin.layout.blank')

@section('content')
<body >
<img src="{{ asset('storage/avatar_image/'.$manager->avatar_image) }}" style="width:300px;height:200px;border-radius: 15px;">
      <div class="bg-light text-dark back-" style="font-size:25px; margin-left:300px;width: 600px;height:350px;opacity: 0.9;text-align:center;border-radius: 15px;font-family: Nunito;">

        <h1  style= "border-radius:15px;size: 560px;"class="badge-secondary"> Manager Information </h1>

        <label style="margin-top: 20px;color:red;">Manager ID: </label>
        <label  > {{$manager->id}} </label>
        <br>
        <label style="color: red;">Manager Name: </label>
        <label> {{$manager->name}} </label>
        <br>
        <label style="color: red;">Manager Email: </label>
        <br>
       <label > {{$manager->email}} </label>
       <br>
       <label style="color: red;">Manager status ban or not: </label>
        <br>
        @if ($bann ==1)
       <label > is ban  </label>
       <br>
      @endif
      @if ($unban ==1)
       <label > is unban  </label>
       <br>
      @endif
        <label style="color:red;">Manager Added to the System at: </label>
        <br>
        <label > {{$manager->created_at -> format('l js \of F Y h:i:s A')}} </label>
      </div>
</body>
    @endsection
