@extends('admin.layout.blank')

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Buy package</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="bg-light text-dark back-" style="font-size:25px; margin-left:300px;width: 600px;height:350px;opacity: 0.9;text-align:center;border-radius: 15px;font-family: Nunito;">

        <h1  style= "border-radius:15px;size: 560px;"class="badge-secondary"> package Information </h1>

        <label style="margin-top: 20px;color:red;">trainee : </label>
        <label  > {{$trainee->name}} </label>
        <br>
        <label style="color: red;">package Name: </label>
        <label> {{$package->name}} </label>
        <br>
        <label style="color: red;">package Price: </label>
       <label > {{$package->price/100}}$ </label>
       <br>
       <label style="color: red;">Gym: </label>
       <label > {{$gym->name}} </label>
       <br>
        <label style="color:red;">city : </label>
        <label > {{$city->name}} </label>
        <form  action="{{route('revenue.store')}}" method="POST">
                <div style="display: none;">
                    @csrf
                <input name="trainee_id" value="{{$trainee->id}}" >
                <input name="city_id" value="{{$city->id}}" >
                <input name="gym_id" value="{{$gym->id}}" >
                <input name="package_id" value="{{$package->id}}" >
                <input name="price" value="{{$package->price}}" >
                </div>
                        <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="pk_test_wivGVUY4vBGCTN6KidhFwTj200umuNEDXx"
                                data-amount="{{$package->price}}"
                                data-name="Stripe.com"
                                data-description="Example charge"
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-locale="auto"
                                data-zip-code="true">
                        </script>
        </form>
 
    </div>
    <!-- /.card -->
@endsection
